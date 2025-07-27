<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Wajah Pengguna</title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        /* CSS dari style.css (disesuaikan) */
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
            max-width: 400px;
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

        hr {
            border: 0;
            height: 1px;
            background-color: #cbd5e0;
            margin: 15px 0;
        }

        select, input[type="file"] {
            padding: 10px;
            border: 1px solid #a0aec0;
            border-radius: 6px;
            background-color: #edf2f7;
            cursor: pointer;
            font-size: 0.95em;
            width: 100%; /* Pastikan select juga 100% lebar */
            box-sizing: border-box; /* Penting untuk padding */
        }

        button {
            background-color: #48bb78;
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
            background-color: #38a169;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #startButton {
            background-color: #007bff;
        }
        #startButton:hover {
            background-color: #0056b3;
        }

        #enrollButton {
            background-color: #ffc107;
            color: #333;
        }
        #enrollButton:hover {
            background-color: #e0a800;
        }

        #recognizeWebcamButton {
            background-color: #17a2b8;
        }
        #recognizeWebcamButton:hover {
            background-color: #138496;
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
        <h1>Manajemen Wajah Pengguna</h1>

        <div class="section">
            <h2>Pendaftaran & Pengenalan Wajah</h2>
            <p>Pilih pengguna, lalu gunakan kamera untuk mendaftarkan atau mengenali wajah.</p>
            <div class="recognition-area">
                <video id="webcamVideo" autoplay muted playsinline class="recognition-canvas"></video>
                <canvas id="recognitionCanvas" class="recognition-canvas-overlay"></canvas>
                
                <div class="controls">
                    <label for="userSelect" style="text-align: left; width: 100%; font-weight: bold; margin-bottom: 5px;">Pilih Pengguna:</label>
                    <select id="userSelect">
                        <option value="">-- Pilih Pengguna --</option>
                        <?php foreach ($users as $user): ?>
                            <option value="<?php echo $user->id; ?>" data-username="<?php echo $user->username; ?>"><?php echo $user->fullname; ?> (<?php echo $user->username; ?>)</option>
                        <?php endforeach; ?>
                    </select>
                    <button id="startButton">Mulai Kamera</button>
                    <button id="enrollButton">Daftarkan/Update Wajah</button>
                    <button id="recognizeWebcamButton">Kenali Wajah</button>
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
        // CSRF Token untuk CodeIgniter - Dihapus karena CSRF Protection FALSE
        // const CSRF_TOKEN_NAME = '<?php echo $this->security->get_csrf_token_name(); ?>';
        // const CSRF_HASH = '<?php echo $this->security->get_csrf_hash(); ?>';

        const BASE_URL = '<?php echo base_url(); ?>';
        const MODEL_URL = BASE_URL + 'vendor/face-api/models'; // Path ke folder models
        const webcamVideo = document.getElementById('webcamVideo');
        const recognitionCanvas = document.getElementById('recognitionCanvas');
        const userSelect = document.getElementById('userSelect');
        const startButton = document.getElementById('startButton');
        const enrollButton = document.getElementById('enrollButton');
        const recognizeWebcamButton = document.getElementById('recognizeWebcamButton');
        const resultsDiv = document.getElementById('results');

        let faceMatcher = null;
        let canvasContext = recognitionCanvas.getContext('2d');
        let stream = null;
        let allUserFaces = []; // Akan menyimpan semua face descriptors dari database

        // --- Fungsi untuk Memuat Model dan Face Descriptors dari Database ---
        async function loadModelsAndUserFaces() {
            resultsDiv.textContent = 'Memuat model dan data wajah pengguna...';
            try {
                // Memuat model face-api.js
                await faceapi.nets.tinyFaceDetector.loadFromUri(MODEL_URL);
                await faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL);
                await faceapi.nets.faceRecognitionNet.loadFromUri(MODEL_URL);

                // Mengambil semua face descriptors dari database via AJAX
                const response = await fetch(BASE_URL + 'admin/get_all_face_descriptors');
                const result = await response.json();

                if (result.status === 'success') {
                    allUserFaces = result.data;
                    console.log("Data wajah dari DB:", allUserFaces);

                    const labeledDescriptors = allUserFaces
                        .filter(user => user.face) // Hanya ambil yang memiliki data wajah
                        .map(user => {
                            // Pastikan descriptor_json di-parse kembali ke array numerik
                            const descriptorArray = JSON.parse(user.face);
                            return new faceapi.LabeledFaceDescriptors(
                                user.fullname + ' (' + user.username + ')', // Label untuk FaceMatcher
                                [new Float32Array(descriptorArray)]
                            );
                        });

                    if (labeledDescriptors.length > 0) {
                        faceMatcher = new faceapi.FaceMatcher(labeledDescriptors, 0.6); // Threshold 0.6
                        resultsDiv.textContent = 'Model dan data wajah siap. Mulai kamera.';
                        Swal.fire('Siap!', 'Model dan data wajah berhasil dimuat.', 'success');
                    } else {
                        faceMatcher = null; // Tidak ada wajah terdaftar
                        resultsDiv.textContent = 'Model siap. Belum ada wajah terdaftar di database. Silakan daftarkan wajah.';
                        Swal.fire('Siap!', 'Model berhasil dimuat. Belum ada wajah terdaftar.', 'info');
                    }
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
                console.warn("Canvas dimensions are zero. Video might not be loaded yet.");
                return;
            }

            canvasContext.clearRect(0, 0, recognitionCanvas.width, recognitionCanvas.height);
            canvasContext.drawImage(webcamVideo, 0, 0, recognitionCanvas.width, recognitionCanvas.height);
        }

        // --- Fungsi untuk Memulai Webcam ---
        async function startWebcam() {
            if (stream) { // Jika kamera sudah berjalan, hentikan dulu
                stream.getTracks().forEach(track => track.stop());
                webcamVideo.srcObject = null;
                stream = null;
                canvasContext.clearRect(0, 0, recognitionCanvas.width, recognitionCanvas.height); // Bersihkan canvas
                resultsDiv.textContent = 'Kamera dihentikan.';
                startButton.textContent = 'Mulai Kamera';
                return;
            }

            resultsDiv.textContent = 'Memulai kamera...';
            try {
                stream = await navigator.mediaDevices.getUserMedia({ video: true });
                webcamVideo.srcObject = stream;

                await new Promise(resolve => webcamVideo.onloadedmetadata = resolve);

                recognitionCanvas.width = webcamVideo.videoWidth;
                recognitionCanvas.height = webcamVideo.videoHeight;

                recognitionCanvas.style.position = 'absolute';
                recognitionCanvas.style.top = webcamVideo.offsetTop + 'px';
                recognitionCanvas.style.left = webcamVideo.offsetLeft + 'px';
                recognitionCanvas.style.width = webcamVideo.offsetWidth + 'px';
                recognitionCanvas.style.height = webcamVideo.offsetHeight + 'px';
                recognitionCanvas.style.transform = 'scaleX(-1)'; // Membalik canvas agar sesuai dengan video yang sudah dibalik

                webcamVideo.play();
                webcamVideo.addEventListener('play', () => {
                    resultsDiv.textContent = 'Kamera aktif. Deteksi wajah dimulai...';
                    startButton.textContent = 'Hentikan Kamera';
                    setInterval(detectFacesFromVideo, 100);
                });

                Swal.fire('Kamera Aktif!', 'Kamera berhasil dimulai. Lihat wajah Anda!', 'success');

            } catch (error) {
                console.error("Error saat memulai kamera:", error);
                resultsDiv.textContent = 'Gagal memulai kamera: ' + error.message;
                Swal.fire('Error!', 'Gagal memulai kamera. Pastikan Anda memberikan izin akses.', 'error');
            }
        }

        // --- Fungsi untuk Deteksi Wajah dari Video Stream (Visualisasi Saja) ---
        async function detectFacesFromVideo() {
            if (webcamVideo.paused || webcamVideo.ended) {
                return;
            }

            drawVideoToCanvas(); // Gambar frame video ke canvas

            // Hanya lakukan deteksi wajah dan landmarks jika model sudah dimuat
            if (faceapi.nets.tinyFaceDetector.isLoaded && faceapi.nets.faceLandmark68Net.isLoaded) {
                const detections = await faceapi.detectAllFaces(webcamVideo, new faceapi.TinyFaceDetectorOptions())
                    .withFaceLandmarks();

                const resizedDetections = faceapi.resizeResults(detections, {
                    width: recognitionCanvas.width,
                    height: recognitionCanvas.height
                });

                faceapi.draw.drawDetections(recognitionCanvas, resizedDetections);
                faceapi.draw.drawFaceLandmarks(recognitionCanvas, resizedDetections);
            }
        }

        // --- Fungsi untuk Mendaftarkan/Update Wajah ---
        async function enrollFace() {
            if (!stream) {
                Swal.fire('Peringatan', 'Mohon mulai kamera terlebih dahulu untuk mendaftarkan wajah.', 'warning');
                return;
            }
            if (userSelect.value === "") {
                Swal.fire('Peringatan', 'Mohon pilih pengguna terlebih dahulu dari dropdown.', 'warning');
                return;
            }
            if (!faceapi.nets.tinyFaceDetector.isLoaded || !faceapi.nets.faceLandmark68Net.isLoaded || !faceapi.nets.faceRecognitionNet.isLoaded) {
                 Swal.fire('Mohon Tunggu', 'Model belum dimuat. Silakan tunggu.', 'info');
                 return;
            }

            resultsDiv.textContent = 'Mendeteksi wajah untuk pendaftaran...';

            Swal.fire({
                title: 'Mendaftarkan Wajah...',
                html: 'Pastikan wajah Anda terlihat jelas.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            try {
                const detections = await faceapi.detectSingleFace(webcamVideo, new faceapi.TinyFaceDetectorOptions())
                    .withFaceLandmarks()
                    .withFaceDescriptor();

                if (!detections) {
                    Swal.close();
                    Swal.fire('Gagal!', 'Tidak ada wajah terdeteksi. Pastikan wajah Anda terlihat jelas di kamera.', 'error');
                    resultsDiv.textContent = 'Pendaftaran gagal: Wajah tidak terdeteksi.';
                    return;
                }

                const selectedUserId = userSelect.value;
                const faceDescriptorArray = Array.from(detections.descriptor); // Konversi Float32Array ke array biasa
                const faceDescriptorJson = JSON.stringify(faceDescriptorArray); // Konversi array ke string JSON

                // Kirim data ke backend untuk disimpan
                const postData = {};
                // postData[CSRF_TOKEN_NAME] = CSRF_HASH; // Baris ini Dihapus
                postData['user_id'] = selectedUserId;
                postData['face_descriptor'] = faceDescriptorJson;

                const response = await fetch(BASE_URL + 'admin/save_user_face', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(postData)
                });

                const result = await response.json();
                Swal.close(); // Tutup loading alert

                if (result.status === 'success') {
                    Swal.fire('Berhasil!', result.message, 'success');
                    resultsDiv.textContent = result.message;
                    // Muat ulang data wajah dari DB setelah update
                    await loadModelsAndUserFaces();
                } else {
                    Swal.fire('Gagal!', result.message, 'error');
                    resultsDiv.textContent = result.message;
                }

            } catch (error) {
                Swal.close();
                console.error("Error saat mendaftarkan wajah:", error);
                resultsDiv.textContent = 'Terjadi kesalahan: ' + error.message;
                Swal.fire('Error!', 'Terjadi kesalahan saat mendaftarkan wajah: ' + error.message, 'error');
            }
        }

        // --- Fungsi untuk Mengenali Wajah dari Webcam ---
        async function recognizeFaceFromWebcam() {
            if (!stream) {
                Swal.fire('Peringatan', 'Mohon mulai kamera terlebih dahulu untuk mengenali wajah.', 'warning');
                return;
            }
            if (!faceapi.nets.tinyFaceDetector.isLoaded || !faceapi.nets.faceLandmark68Net.isLoaded || !faceapi.nets.faceRecognitionNet.isLoaded) {
                 Swal.fire('Mohon Tunggu', 'Model belum dimuat. Silakan tunggu.', 'info');
                 return;
            }
            if (!faceMatcher || allUserFaces.filter(u => u.face).length === 0) { // Periksa juga apakah ada wajah terdaftar
                Swal.fire('Informasi', 'Belum ada wajah terdaftar di database. Silakan daftarkan wajah terlebih dahulu.', 'info');
                return;
            }

            resultsDiv.textContent = 'Mencocokkan wajah dari kamera...';

            Swal.fire({
                title: 'Mengenali Wajah...',
                html: 'Mohon tunggu sebentar.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            try {
                const detections = await faceapi.detectSingleFace(webcamVideo, new faceapi.TinyFaceDetectorOptions())
                    .withFaceLandmarks()
                    .withFaceDescriptor();

                if (!detections) {
                    Swal.close();
                    Swal.fire('Gagal!', 'Tidak ada wajah terdeteksi di kamera. Pastikan wajah Anda terlihat jelas.', 'error');
                    resultsDiv.textContent = 'Pengenalan gagal: Wajah tidak terdeteksi.';
                    return;
                }

                const bestMatch = faceMatcher.findBestMatch(detections.descriptor);

                Swal.close();

                if (bestMatch.distance < 0.6) { // Threshold 0.6
                    Swal.fire('Cocok!', `Wajah dikenali sebagai ${bestMatch.label}!`, 'success');
                    resultsDiv.innerHTML = `Wajah dikenali: <strong>${bestMatch.label}</strong> (Kemiripan: ${(1 - bestMatch.distance).toFixed(2) * 100}%)`;
                } else {
                    Swal.fire('Tidak Cocok', 'Wajah tidak cocok dengan yang dikenal.', 'warning');
                    resultsDiv.innerHTML = `Wajah tidak dikenali: <strong>${bestMatch.label}</strong> (Kemiripan: ${(1 - bestMatch.distance).toFixed(2) * 100}%)`;
                }
            } catch (error) {
                Swal.close();
                console.error("Error recognizing face from webcam:", error);
                resultsDiv.textContent = 'Gagal mengenali dari kamera: ' + error.message;
                Swal.fire('Error!', 'Terjadi kesalahan saat mengenali wajah dari kamera: ' + error.message, 'error');
            }
        }

        // --- Event Listeners ---
        startButton.addEventListener('click', startWebcam);
        enrollButton.addEventListener('click', enrollFace);
        recognizeWebcamButton.addEventListener('click', recognizeFaceFromWebcam);

        // --- Jalankan Inisialisasi Saat Halaman Dimuat ---
        loadModelsAndUserFaces();
    </script>
</body>
</html>
