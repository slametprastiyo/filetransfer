<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilketos</title>
    <link rel="stylesheet" href="<?= base_url();?>public/assets/css/output.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body class="bg-red-400">
    <section class="hero w-full h-screen bg-no-repeat bg-center bg-cover bg-[url('../images/pilketos-hero-bg.png')] ">
        <div class="bg-gradient-to-t from-blue-950 to-blue-700 w-full h-full opacity-75"></div>
        <div class="w-full flex justify-center absolute top-0 h-full overflow-hidden">
            <img src="<?= base_url() ;?>public/assets/images/pilketos-hero-title.svg" class="w-96 object-contain absolute top-6" alt="">
            <img src="<?= base_url() ;?>public/assets/images/ellipse.png" class="w-full object-contain absolute -bottom-1" alt="">
            <img src="<?= base_url() ;?>public/assets/images/hero-img.png" class="w-5/12 object-contain absolute bottom-0" alt="">
        </div>

    </section>
    <section class="hero w-full h-screen bg-white">
    </section>
</body>
</html>