<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilketos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/output.css">
    <script src="<?= base_url(); ?>public/assets/js/sweetalert2@11.js"></script>
    <script src='https://cdn.plot.ly/plotly-3.0.1.min.js'></script>
    <style>
        .plot-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <section class="result w-full bg-white bg-blue-500">
        <div id="myDiv" class="border-2 min-h-screen"></div>
    </section>
    <script>
        let data = [{
            values: [9, 13, 8],
            labels: ['Kandidat 1', 'Kandidat 2', 'Kandidat 3'],
            type: 'pie',
            textinfo: 'value+percent',
            marker: {
                colors: ['#1e3a8a', '#1d4ed8', '#3b82f6'] // Array of custom colors
            }
        }];

        let layout = {
            height: 400,
            width: 500
        };

        Plotly.newPlot('myDiv', data, layout);
    </script>
</body>

</html>