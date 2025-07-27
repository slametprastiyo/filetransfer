<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Lokasi anda saat ini: </p>
    <h1 class="lokasi"></h1>
    <script>
        navigator.geolocation.getCurrentPosition((position) => {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            const url = 'https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=' + lat + '&longitude=' + lon + '&localityLanguage=en';
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // console.log(data.city);
                    const lokasi = document.querySelector('.lokasi');
                    lokasi.innerHTML = data.city;
                })
        })
        
    </script>
</body>
</html> -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geolocation App</title>
    <!-- Tailwind CSS CDN for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?= base_url(); ?>public/assets/js/sweetalert2@11.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/assets/css/output.css">
    <style>
        body {
            font-family: "Inter", sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f4f8; /* Light background */
            color: #333;
            padding: 1rem;
        }
        .container {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            text-align: center;
            max-width: 90%;
            width: 500px;
        }
        .error-message {
            color: #ef4444; /* Red for errors */
            background-color: #fee2e2; /* Light red background */
            padding: 0.75rem;
            border-radius: 0.5rem;
            margin-top: 1rem;
            border: 1px solid #f87171;
            display: none; /* Hidden by default */
        }

    </style>
</head>
<body>
    <div class="container">
        <h1 class="lokasi text-4xl font-bold text-blue-600 mb-4">Mencari lokasi...</h1>
        <p class="keterangan"></p>
        <div id="errorMessage" class="error-message text-sm"></div>
        <button class="try-again bg-secondary py-1 px-2 rounded-lg text-white mt-20">Coba Lagi</button>
        <input type="hidden" name="" id="uid" value="<?= $id; ?>">
    </div>

    <script>
        const uid = document.getElementById("uid");
        const baseurl = "http://localhost/smpq/"; 
        // Get references to the DOM elements
        const lokasiElement = document.querySelector('.lokasi');
        const keteranganElement = document.querySelector(".keterangan");
        const errorMessageElement = document.getElementById('errorMessage');
        const tryAgainBtn = document.querySelector("button.try-again");

        tryAgainBtn.addEventListener("click",()=>{
            window.location.replace(baseurl + "kehadiran_gtk/process?id=" + uid.value);
        })
        /**
         * Displays an error message in the UI.
         * @param {string} message - The error message to display.
         */
        function displayError(message) {
            lokasiElement.textContent = 'Terjadi kesalahan.'; // Clear location text
            errorMessageElement.textContent = `Error: ${message}`;
            errorMessageElement.style.display = 'block'; // Show the error message div
            console.error('Geolocation Error:', message); // Log error to console for debugging
        }

        /**
         * Callback function for successful geolocation.
         * @param {GeolocationPosition} position - The geolocation position object.
         */
        function successCallback(position) {
            Swal.close();
            let lat = position.coords.latitude;
            let lon = position.coords.longitude;
            lat = lat.toFixed(4);
            lon = lon.toFixed(4);
            const minLat = -7.5884;
            const maxLat = -7.5865;
            const minLon = 112.2368;
            const maxLon = 112.2391;

            // Hide any previous error messages
            errorMessageElement.style.display = 'none';

            // Display the raw latitude and longitude
            lokasiElement.textContent = ``;

            // cek apakah user berada di lokasi yang ditentukan
            if(lat >= minLat && lat <= maxLat && lon >= minLon && lon <= maxLon || 0 == 0){
                localStorage.setItem("gtk_id", uid.value);
                window.location.replace(baseurl + "kehadiran_gtk/dashboard");
            }else{
                const errorMessage = "Anda tidak berada di area sekolah";
                displayError(errorMessage);
            tryAgainBtn.classList.remove("hidden");
            }


        }

        /**
         * Callback function for geolocation errors.
         * @param {GeolocationPositionError} error - The geolocation error object.
         */
        function errorCallback(error) {

            let errorMessage = '';
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    errorMessage = 'Akses lokasi ditolak oleh pengguna.';
                    break;
                case error.POSITION_UNAVAILABLE:
                    errorMessage = 'Informasi lokasi tidak tersedia.';
                    break;
                case error.TIMEOUT:
                    errorMessage = 'Waktu permintaan lokasi habis.';
                    break;
                case error.UNKNOWN_ERROR:
                    errorMessage = 'Terjadi kesalahan yang tidak diketahui.';
                    break;
                default:
                    errorMessage = 'Terjadi kesalahan saat mendapatkan lokasi.';
            }
            displayError(errorMessage); // Display the specific geolocation error
            Swal.close();
            tryAgainBtn.classList.remove("hidden");
        }


        // Request current position using Geolocation API
        // The third argument is an options object (optional)
        // The second argument is the error callback function
        Swal.fire({
              title: 'Harap tunggu. Sedang mendeteksi lokasi ...',
              allowOutsideClick: false,
              didOpen: () => {
              Swal.showLoading();
              },
             });
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback, {

            enableHighAccuracy: true, // Request a more precise location
            timeout: 5000,           // Maximum time (in milliseconds) to wait for a location
            maximumAge: 0            // Don't use a cached position
        });

    </script>
</body>
</html>


<!-- kiri atas -->
<!-- -7.586582815136898, 112.23689121962524 -->

<!-- kanan atas -->
<!-- -7.586565905703164, 112.23908611305052 -->

<!-- kiri bawah -->
<!-- -7.588341392615397, 112.23691965088723 -->

<!-- kanan bawah -->
<!-- -7.588454121695711, 112.2391316030697 -->


<!-- Lat: -7.587683, Lon: 112.237842 -->