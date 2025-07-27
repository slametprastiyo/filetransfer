<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengenalan Wajah dan Redirect Via Server</title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        /* CSS yang sama dengan manajemen wajah untuk konsistensi */
        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            background-color: #e2e8f0;
            margin: 20px;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 800px;
            box-sizing: border-box;
        }

        h1, h2 {
            color: #2d3748;
            text-align: center;
            margin-bottom: 25px;
        }

        .section {
            margin-bottom: 30px;
            border: 1px solid #cbd5e0;
            padding: 25px;
            border-radius: 10px;
            background-color: #f7fafc;
        }

        .recognition-area {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .recognition-canvas, .recognition-canvas-overlay {
            width: 100%;
            max-width: 300px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            display: block;
            margin: 0 auto;
        }

        #webcamVideo {
            border: 4px solid #4299e1;
            transform: scaleX(-1);
        }

        #recognitionCanvas {
            position: absolute;
            top: 0;
            left: 0;
            border: 4px solid transparent;
            transform: scaleX(-1);
        }

        .controls {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
            max-width: 300px;
            margin-top: 20px;
        }

        button {
            background-color: #007bff; /* Biru untuk mulai/stop kamera */
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .results-box {
            margin-top: 25px;
            padding: 18px;
            background-color: #e6fffa;
            border: 1px solid #81e6d9;
            border-radius: 8px;
            text-align: center;
            font-size: 1.2em;
            color: #2d3748;
            min-height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
        }

        .results-box strong {
            color: #3182ce;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
                margin: 10px;
            }
            h1 {
                font-size: 1.8em;
            }
            h2 {
                font-size: 1.4em;
            }
            button {
                padding: 10px 20px;
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pengenalan Wajah</h1>

        <div class="section">
            <p>Pastikan pencahayaan cukup</p>
            <div class="recognition-area">
                <video id="webcamVideo" autoplay muted playsinline class="recognition-canvas"></video>
                <canvas id="recognitionCanvas" class="recognition-canvas-overlay"></canvas>
                
                <div class="controls">
                    <button id="startButton">Mulai Kamera</button>
                </div>
            </div>
            <div id="results" class="results-box">
                Memuat model...
            </div>
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Face-api.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>
    <script>
        Swal.fire({
                            
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
        const BASE_URL = '<?php echo base_url(); ?>';
        // Ganti dengan URL dashboard yang sebenarnya
        const DASHBOARD_URL = BASE_URL + 'kehadiran_gtk/process'; // Contoh: BASE_URL + 'dashboard' atau 'admin/home'
        // Endpoint untuk request login/redirect ke server
        const LOGIN_BY_FACE_ENDPOINT = BASE_URL + 'auth/login_by_face'; // Anda perlu membuat endpoint ini di CodeIgniter

        const MODEL_URL = BASE_URL + 'vendor/face-api/models'; // Path ke folder models
        const webcamVideo = document.getElementById('webcamVideo');
        const recognitionCanvas = document.getElementById('recognitionCanvas');
        const startButton = document.getElementById('startButton');
        const resultsDiv = document.getElementById('results');

        let faceMatcher = null;
        let canvasContext = recognitionCanvas.getContext('2d');
        let stream = null;
        let allUserFaces = []; // Akan menyimpan semua face descriptors dari database
        let recognitionIntervalId = null; // Untuk menyimpan ID interval pengenalan

        // Flag untuk mencegah proses pengenalan ganda atau redirect berulang terlalu cepat
        let isProcessingRecognition = false;

        // --- Fungsi untuk Memuat Model dan Face Descriptors dari Database ---
        async function loadModelsAndUserFaces() {
            resultsDiv.textContent = 'Memuat model dan data wajah pengguna...';
            try {
                // Memuat model face-api.js
                await faceapi.nets.tinyFaceDetector.loadFromUri(MODEL_URL);
                await faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL);
                await faceapi.nets.faceRecognitionNet.loadFromUri(MODEL_URL);

                // Mengambil semua face descriptors dari database via AJAX
                const response = await fetch(BASE_URL + 'kehadiran_gtk/get_all_face_descriptors');
                const result = await response.json();

                if (result.status === 'success') {
                    allUserFaces = result.data;
                    console.log("Data wajah dari DB:", allUserFaces);

                    const labeledDescriptors = allUserFaces
                        .filter(user => user.face) // Hanya ambil yang memiliki data wajah
                        .map(user => {
                            const descriptorArray = JSON.parse(user.face);
                            return new faceapi.LabeledFaceDescriptors(
                                user.id.toString(), // Menggunakan ID pengguna sebagai label
                                [new Float32Array(descriptorArray)]
                            );
                        });

                    if (labeledDescriptors.length > 0) {
                        faceMatcher = new faceapi.FaceMatcher(labeledDescriptors, 0.5); // Threshold 0.8
                        resultsDiv.textContent = 'Model dan data wajah siap. Kamera akan dimulai secara otomatis.';
                        // Modifikasi Swal.fire untuk menutup otomatis
                        Swal.close();
                    } else {
                        faceMatcher = null; // Tidak ada wajah terdaftar
                        // resultsDiv.textContent = 'Model siap. Belum ada wajah terdaftar di database. Silakan hubungi admin untuk pendaftaran wajah.';
                        // Swal.fire('Siap!', 'Model berhasil dimuat. Belum ada wajah terdaftar.', 'info');
                    }
                    
                    // Panggil startWebcam() secara otomatis setelah model dan data dimuat
                    startWebcam();

                } else {
                    throw new Error(result.message || 'Gagal mengambil data wajah dari database.');
                }

            } catch (error) {
                console.error("Error saat memuat model atau data wajah:", error);
                resultsDiv.textContent = 'Gagal memuat: ' + error.message;
                Swal.fire('Error!', 'Gagal memuat model atau data wajah: ' + error.message, 'error');
            }
        }

        // --- Fungsi untuk Menggambar Video ke Canvas ---
        function drawVideoToCanvas() {
            recognitionCanvas.width = webcamVideo.videoWidth;
            recognitionCanvas.height = webcamVideo.videoHeight;

            if (recognitionCanvas.width === 0 || recognitionCanvas.height === 0) {
                return;
            }

            canvasContext.clearRect(0, 0, recognitionCanvas.width, recognitionCanvas.height);
            canvasContext.drawImage(webcamVideo, 0, 0, recognitionCanvas.width, recognitionCanvas.height);
        }

        // --- Fungsi untuk Memulai/Menghentikan Webcam ---
        async function startWebcam() {
            if (stream) { // Jika kamera sudah berjalan, hentikan dulu
                stream.getTracks().forEach(track => track.stop());
                webcamVideo.srcObject = null;
                stream = null;
                canvasContext.clearRect(0, 0, recognitionCanvas.width, recognitionCanvas.height); // Bersihkan canvas
                resultsDiv.textContent = 'Kamera dihentikan.';
                startButton.textContent = 'Mulai Kamera';
                if (recognitionIntervalId) { // Hentikan interval jika sedang berjalan
                    clearInterval(recognitionIntervalId);
                    recognitionIntervalId = null;
                }
                isProcessingRecognition = false; // Reset flag
                return;
            }

            resultsDiv.textContent = 'Memulai kamera...';
            try {
                stream = await navigator.mediaDevices.getUserMedia({ video: true });
                webcamVideo.srcObject = stream;

                await new Promise(resolve => webcamVideo.onloadedmetadata = resolve);

                recognitionCanvas.width = webcamVideo.videoWidth;
                recognitionCanvas.height = webcamVideo.videoHeight;

                // Set posisi dan ukuran canvas overlay agar sesuai dengan video
                recognitionCanvas.style.position = 'absolute';
                recognitionCanvas.style.top = webcamVideo.offsetTop + 'px';
                recognitionCanvas.style.left = webcamVideo.offsetLeft + 'px';
                recognitionCanvas.style.width = webcamVideo.offsetWidth + 'px';
                recognitionCanvas.style.height = webcamVideo.offsetHeight + 'px';
                recognitionCanvas.style.transform = 'scaleX(-1)'; // Membalik canvas agar sesuai dengan video yang sudah dibalik

                webcamVideo.play();
                webcamVideo.addEventListener('play', () => {
                    resultsDiv.textContent = 'Kamera aktif. Sistem siap mengenali wajah Anda.';
                    startButton.textContent = 'Hentikan Kamera'; // Tombol menjadi "Hentikan Kamera"
                    // Mulai deteksi wajah secara berkala
                    recognitionIntervalId = setInterval(processFaceRecognition, 1000); // Simpan ID interval
                });

            } catch (error) {
                console.error("Error saat memulai kamera:", error);
                resultsDiv.textContent = 'Gagal memulai kamera: ' + error.message;
                Swal.fire('Error!', 'Gagal memulai kamera. Pastikan Anda memberikan izin akses.', 'error');
            }
        }

        // --- Fungsi Utama untuk Deteksi dan Pengenalan Wajah Otomatis ---
        async function processFaceRecognition() {
            if (webcamVideo.paused || webcamVideo.ended) {
                return;
            }

            drawVideoToCanvas(); // Gambar frame video ke canvas

            // Hanya lakukan deteksi wajah dan landmarks jika model sudah dimuat
            if (!faceapi.nets.tinyFaceDetector.isLoaded || !faceapi.nets.faceLandmark68Net.isLoaded || !faceapi.nets.faceRecognitionNet.isLoaded) {
                return;
            }
            if (!faceMatcher || allUserFaces.filter(u => u.face).length === 0) {
                return;
            }
            
            // Periksa apakah sedang dalam proses pengenalan. Jika ya, lewati.
            if (isProcessingRecognition) {
                return;
            }

            try {
                const detections = await faceapi.detectSingleFace(webcamVideo, new faceapi.TinyFaceDetectorOptions())
                    .withFaceLandmarks()
                    .withFaceDescriptor();

                const resizedDetections = faceapi.resizeResults(detections, {
                    width: recognitionCanvas.width,
                    height: recognitionCanvas.height
                });

                // Gambar deteksi wajah (kotak dan landmark)
                faceapi.draw.drawDetections(recognitionCanvas, resizedDetections);
                faceapi.draw.drawFaceLandmarks(recognitionCanvas, resizedDetections);

                if (detections) {
                    isProcessingRecognition = true; // Set flag untuk mencegah deteksi ganda/redirect berulang
                    
                    const bestMatch = faceMatcher.findBestMatch(detections.descriptor);

                    if (bestMatch.distance < 0.5) { // Wajah dikenali
                        const recognizedUserId = bestMatch.label; // Label adalah ID pengguna
                        const recognizedUser = allUserFaces.find(u => u.id.toString() === recognizedUserId);
                        const userFullName = recognizedUser ? recognizedUser.fullname : 'Pengguna Tidak Dikenal';

                        // Swal.fire({
                        //     title: 'Wajah Dikenali!',
                        //     html: `Selamat datang, <strong>${userFullName}</strong>!<br>Memproses login...`,
                        //     icon: 'info', // Ganti icon menjadi info atau question
                        //     allowOutsideClick: false,
                        //     timer: 5000, // Beri waktu lebih untuk proses server
                        //     timerProgressBar: true,
                        //     didOpen: () => {
                        //         Swal.showLoading();
                        //     }
                        // });

                        
                        // --- Kirim data user ke server untuk proses login/redirect ---
                        try {
                            const response = await fetch(LOGIN_BY_FACE_ENDPOINT, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({ user_id: recognizedUserId })
                            });

                            const serverResult = await response.json();
                            Swal.close(); // Tutup loading alert

                            if (serverResult.status === 'success') {
                                // Swal.fire('Berhasil!', serverResult.message || `Login berhasil untuk ${userFullName}. Mengarahkan ke dashboard...`, 'success');
                                // resultsDiv.innerHTML = `Login berhasil untuk <strong>${userFullName}</strong>. Mengarahkan ke dashboard...`;
                                
                                // Hentikan interval pengenalan setelah wajah dikenali
                                if (recognitionIntervalId) {
                                    clearInterval(recognitionIntervalId);
                                    recognitionIntervalId = null;
                                }
                                // Hentikan stream kamera juga
                                if (stream) {
                                    stream.getTracks().forEach(track => track.stop());
                                    webcamVideo.srcObject = null;
                                    stream = null;
                                }
                                startButton.textContent = 'Mulai Kamera'; // Reset tombol

                                // Redirect ke halaman dashboard setelah sukses dari server
                                setTimeout(() => {
                                    window.location.href = DASHBOARD_URL +"?id="+recognizedUserId;
                                }, 1000); // Beri sedikit waktu untuk user melihat pesan sukses

                            } else {
                                Swal.fire('Gagal Login!', serverResult.message || 'Terjadi kesalahan saat login.', 'error');
                                resultsDiv.innerHTML = serverResult.message || 'Login gagal. Silakan coba lagi.';
                                isProcessingRecognition = false; // Izinkan percobaan lagi
                            }

                        } catch (serverError) {
                            Swal.close();
                            console.error("Error saat mengirim data login ke server:", serverError);
                            resultsDiv.textContent = 'Terjadi kesalahan komunikasi dengan server: ' + serverError.message;
                            Swal.fire('Error Server!', 'Gagal terhubung ke server untuk login: ' + serverError.message, 'error');
                            isProcessingRecognition = false; // Izinkan percobaan lagi
                        }

                    } else { // Wajah tidak dikenali
                        resultsDiv.innerHTML = `Wajah terdeteksi, tetapi tidak dikenali. Kemiripan: <strong>${(1 - bestMatch.distance).toFixed(2) * 100}%</strong>. Mohon posisikan wajah dengan jelas.`;
                        // Reset isProcessingRecognition agar bisa mencoba lagi
                        isProcessingRecognition = false; 
                    }
                } else {
                    resultsDiv.textContent = 'Menunggu deteksi wajah...';
                    isProcessingRecognition = false; // Reset jika tidak ada deteksi
                }
            } catch (error) {
                // console.error("Error saat pengenalan wajah otomatis:", error);
                // resultsDiv.textContent = 'Terjadi kesalahan: ' + error.message;
                isProcessingRecognition = false; // Pastikan flag direset jika ada error
            }
        }

        // --- Event Listeners ---
        startButton.addEventListener('click', startWebcam);

        // --- Jalankan Inisialisasi Saat Halaman Dimuat ---
        loadModelsAndUserFaces();
    </script>
</body>
</html>
