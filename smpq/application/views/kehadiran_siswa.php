<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Scanner</title>
    <!-- Tailwind CSS CDN for basic styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?= base_url(); ?>public/assets/js/sweetalert2@11.js"></script>
    <style>
        /* Custom styles for the video feed to ensure it fills the container and looks good */
        video {
            width: 100%;
            height: auto; /* Maintain aspect ratio */
            max-width: 500px; /* Limit max width for desktop */
            border-radius: 0.75rem; /* rounded-xl */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow-lg */
            background-color: #000; /* Black background for video area */
        }
        /* Hide the canvas if not needed for visual debugging */
        canvas {
            display: none; /* Hide the canvas element by default */
        }
        .button-primary {
            @apply bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out;
        }
        .button-secondary {
            @apply bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out;
        }
        .button-disabled {
            @apply bg-gray-400 text-gray-700 cursor-not-allowed;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex flex-col items-center justify-center p-4 font-sans text-gray-800">
    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-lg w-full text-center">
        <h1 class="text-3xl font-extrabold text-indigo-700 mb-6">QR Code Scanner</h1>

        <!-- Video element to display the camera feed -->
        <video id="qr-video" class="mb-6"></video>

        <!-- Control button -->
        <div class="flex justify-center space-x-4 mb-6">
            <button id="toggleScanButton" class="button-primary">Start Scan</button>
        </div>

        <!-- Element to display the scan result -->
        <div class="bg-blue-50 border border-blue-200 text-blue-800 p-4 rounded-lg mb-6 text-left">
            <p class="font-semibold mb-2">Info :</p>
            <p id="result" class="break-words text-gray-700"></p>
        </div>

        <!-- Status message area -->
        <div id="status" class="text-sm text-gray-600 mt-4">
        </div>
    </div>

    <!-- Nimiq QR Scanner library -->
    <script type="module">
        const baseURL = "http://localhost/smpq/"
        import QrScanner from 'https://cdn.jsdelivr.net/npm/qr-scanner@1.4.2/qr-scanner.min.js';

        // Get references to the HTML elements
        const video = document.getElementById('qr-video');
        const resultElement = document.getElementById('result');
        const statusElement = document.getElementById('status');
        const toggleScanButton = document.getElementById('toggleScanButton');

        let qrScanner = null; // Initialize qrScanner as null
        let isScanning = false;

        // Function to initialize the QR scanner instance (without starting it)
        function initializeScanner() {
            if (qrScanner) {
                // If scanner already exists, stop it before re-initializing
                qrScanner.stop();
                qrScanner.destroy(); // Clean up previous instance
            }

            qrScanner = new QrScanner(
                video,
                result => {
                    // This callback is executed when a QR code is successfully scanned
                    // resultElement.textContent = result.data;
                    // statusElement.textContent = 'QR code scanned successfully! Scan stopped.';
                    // console.log('QR code scanned:', result.data);
                    stopScan();


Swal.fire({
  title: 'Harap Tunggu...',
  text: 'Memproses Data',
  icon: 'info',
  allowOutsideClick: false,  // Optional: prevents dismissing by clicking outside
  showConfirmButton: false,   // Optional: hides the "OK" button
  didOpen: () => {
    Swal.showLoading(); // 👈 Shows the loading spinner!
  }
});
const xhr = new XMLHttpRequest();
  xhr.open("GET", baseURL + "kehadiran_siswa/process?nis="+result.data);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        // console.log(xhr.responseText);return;
        if(xhr.responseText == 1){
            console.log("data has been recorded");
                Swal.close();
                Swal.fire({
  title: 'Success',
  text: 'Kehadiran telah tercatat',
  icon: 'success',
  timer: 3000,           // Time in milliseconds
  showConfirmButton: false,
  didClose: () => {
                startScan();

  }
});
        }else{
            // console.log("gagal");
                Swal.close();
            Swal.fire({
  title: 'Gagal',
  text: 'Mohon coba lagi',
  icon: 'error',
  timer: 3000,           // Time in milliseconds
  showConfirmButton: false,
  didClose: () => {
                startScan();

  }
});
        }
    }
  };
  xhr.send();


                },
                {
                    highlightScanRegion: true,
                    highlightCodeOutline: true,
                    preferredCamera: 'environment',
                    maxScansPerSecond: 10,
                    // onDecodeError: error => console.error('QR code scan error:', error),
                }
            );
        }

        // Function to start the QR scanner
        async function startScan() {
            if (isScanning) return; // Prevent multiple starts

            // Ensure the scanner is initialized before starting
            if (!qrScanner) {
                initializeScanner();
            }

            try {
                await qrScanner.start();
                isScanning = true;
                toggleScanButton.textContent = 'Stop Scan';
                toggleScanButton.classList.remove('button-primary');
                toggleScanButton.classList.add('button-secondary');
                statusElement.textContent = 'Camera started. Point to a QR code.';
                resultElement.textContent = 'No QR code detected yet.'; // Clear previous result
                console.log('QR Scanner started successfully.');
            } catch (error) {
                console.error('Failed to start QR scanner:', error);
                isScanning = false; // Reset scanning state on error
                toggleScanButton.textContent = 'Start Scan';
                toggleScanButton.classList.remove('button-secondary');
                toggleScanButton.classList.add('button-primary');

                if (error.name === 'NotAllowedError') {
                    statusElement.textContent = 'Camera access denied. Please grant camera permissions.';
                } else if (error.name === 'NotFoundError') {
                    statusElement.textContent = 'No camera found on this device.';
                } else {
                    statusElement.textContent = `Error: ${error.message || 'Could not start camera.'}`;
                }
                resultElement.textContent = 'Error: Could not access camera.';
            }
        }

        // Function to stop the QR scanner
        function stopScan() {
            if (!isScanning) return; // Prevent multiple stops

            if (qrScanner) {
                qrScanner.stop();
                isScanning = false;
                toggleScanButton.textContent = 'Start Scan';
                toggleScanButton.classList.remove('button-secondary');
                toggleScanButton.classList.add('button-primary');
                statusElement.textContent = 'Scan stopped. Click "Start Scan" to resume.';
                console.log('QR Scanner stopped.');
            }
        }

        // Event listener for the single toggle button
        toggleScanButton.addEventListener('click', () => {
            if (isScanning) {
                stopScan();
            } else {
                startScan();
            }
        });

        // Initialize scanner instance when the window loads, but don't start it automatically
        window.addEventListener('load', initializeScanner);

        // Clean up the scanner when the page is unloaded to release camera resources
        window.addEventListener('beforeunload', () => {
            if (qrScanner) {
                qrScanner.stop();
                qrScanner.destroy(); // Ensure all resources are released
                console.log('QR Scanner stopped and destroyed due to page unload.');
            }
        });
    </script>
</body>
</html>
