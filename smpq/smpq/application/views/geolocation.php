<!DOCTYPE html>
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
</html>