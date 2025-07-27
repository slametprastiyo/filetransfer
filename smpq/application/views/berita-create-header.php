<!DOCTYPE html>
<html lang="id" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP Quran Al-Muanawiyah</title>
    <meta name="description"
        content="Website resmi SMP Quran Al-Muanawiyah. Menerima Peserta Didik Baru tahun ajaran 2025/2026">


    <meta http-equiv="Content-Language" content="id">

    <meta property="og:title" content="SMP Quran Al-Muanawiyah">
    <meta property="og:description"
        content="Website resmi SMP Quran Al-Muanawiyah. SMP Tahfidz. Berlokasi di Dusun Sambisari RT/RW 02/02 Desa Ceweng Kecamatan Diwek Kabupaten Jombang Jawa Timur">
    <meta property="og:image" content="<?= base_url(); ?>public/assets/images/hero-img.webp">
    <meta property="og:url" content="<?= base_url(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <style>
        .loader {
            position: fixed;
            z-index: 9999;
            background: #F19F15;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("http://localhost/smpq/public/assets/images/logo-white.svg");
            background-size: 120px 120px;
            background-repeat: no-repeat;
            background-position: center;
            animation-name: pse;
            animation-iteration-count: infinite;
            animation-duration: 1s;
        }

        @keyframes pse{
            0%{
                transform: scale(1);
            }
            10%{
                transform: scale(1.15);

            }
            100%{
                transform: scale(1);
            }
        }


        .loader.loader-hidden {
            visibility: hidden;
            transform: scale(0);
        }

        body.overflow-y-h {
            overflow: hidden;
        }
    </style>
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/swiper-bundle.min.css">
    <script src="<?= base_url(); ?>public/assets/js/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/animate.min.css">
    <script src="<?= base_url(); ?>public/assets/js/wow.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="<?= base_url(); ?>public/assets/js/sweetalert2@11.js"></script>


    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/output.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/style.css">
    <link rel="icon" href="favicon.png" type="image/png">

</head>


<!-- <body
    class="font-Poppins overflow-y-h text-black relative max-w-[3000px] relative "> -->

<body
    class="font-Quicksand bg-gray-200 overflow-y-h text-black relative max-w-[3000px] relative">
<!-- <body
    class="font-Quicksand overflow-y-h text-black relative max-w-[3000px] relative  bg-gray-300 bg-[url('../images/bg-logo.png')] bg-repeat bg-[length:100px_100px] md:bg-[length:200px_200px]"> -->


    <div class="hidden pengumuman fixed w-full h-screen bg-black/50 z-[999] flex justify-center items-center">
        <img src="" alt="pengumuman" data-img="ppdb.webp" class="w-full h-full object-contain">
        <div
            class="close-btn fixed right-2 top-2 bg-white z-50  text-black w-6 rounded-full aspect-square flex justify-center items-center hover:cursor-pointer scale-125">
            x</div>
    </div>
    <div
        class="hidden full-view w-full h-screen bg-black z-70 bg-opacity-[0.75] fixed overflow-y-scroll backdrop-blur-xl text-white flex justify-center items-center flex-col p-3">
        <img src="" alt="" class="w-full h-full object-contain">
        <p class="detail text-white mt-3 text-xs">

        </p>
        <div
            class="close-btn fixed right-2 top-2 bg-white text-black w-6 rounded-full aspect-square flex justify-center items-center hover:cursor-pointer scale-125">
            x</div>
    </div>
    <!-- <divp-[[]] -->
    <header class="fixed main-header bottom-2 flex justify-center z-80 items-center w-full">
        
        <nav
            class="navigasi-baru transition-all bg-white font-light rounded-xl text-secondary font-semibold text-xs px-3 pt-1 flex drop-shadow-lg items-center border border-white/30">
           
            <ul class="flex w-full items-center justify-center">
                <li class="mx-3">
                    <a href="<?= base_url(); ?>admin"
                        class="flex relative w-10  inline-block flex-col items-center justify-between  rounded-xl hover:rounded-2xl  transition-all  hover:scale-110 ">
                        <img src="<?= base_url(); ?>public/assets/images/icons/home-icon.webp"
                            class="w-8 aspect-square object-contain menu-icon mb-1" alt="">
                        <span class="   navigasi-name  text-center whitespace-break-spaces">Dashboard</span>
                    </a>
                </li>
                <li class="mx-3">
                    <div 
                        id="save-news-btn" class="flex relative w-10  inline-block flex-col items-center justify-between  rounded-xl hover:rounded-2xl  transition-all  hover:scale-110 ">
                        <img src="<?= base_url(); ?>public/assets/images/icons/save-icon.png"
                            class="w-8 aspect-square object-contain menu-icon mb-1" alt="">
                        <span class="   navigasi-name  text-center whitespace-break-spaces">Simpan</span>
    </div>
                </li>
              
               
            </ul>
        </nav>
       
        <div
            class=" ml-2 scale-0 relative transition-all hover:cursor-pointer rounded-xl  scroll-to-top h-12 w-5 md:w-10  aspect-square text-white bg-white/80 z-40  flex justify-center items-center shadow-lg border border-secondary/30 -translate-x-16">
            <img src="<?= base_url(); ?>public/assets/images/up-arrow.svg"
                class="w-1/2 h-full object-contain opacity-60" alt="">
        </div>
    </header>

    <section class="search-result w-full bg-white h-screen fixed  left-0 top-0 z-70 hidden">
        <div class="search-result-container absolute top-0 left-0 w-full h-5/6 bg-white p-5 pr-0 pb-20 text-secondary">
            <div
                class="close-btn absolute right-5 top-5 bg-red-600  hover:bg-secondary rounded-full w-6 aspect-square flex justify-center items-center text-white  hover:text-white select-none z-60">
                x</div>
            <p class=" font-semi-bold text-xl mb-10">Hasil Pencarian</p>
            <div class="result overflow-y-scroll h-full break-all pr-5">

                <div class="result-berita-container hidden  mb-10">
                    <div class="text-secondary/50 text-lg mb-5">Berita</div>
                    <div class="result-berita  text-sm font-semibold ">
                    </div>
                </div>
                <div class="result-galeri-container hidden ">
                    <div class="text-secondary/50 text-lg mb-5">galeri</div>
                    <div class="result-galeri text-sm font-semibold ">
                    </div>
                </div>
            </div>
        </div>
        <div
            class="search-not-found w-full h-4/6 absolute top-20 left-0 flex justify-center items-center hidden bg-white">
            <img src="<?= base_url(); ?>public/assets/images/search-not-found.png" alt=""
                class="w-30 aspect-square mx-auto object-contain">
        </div>
        <div
            class="search-loading w-full h-4/6 absolute top-20 left-0 flex justify-center items-center hidden bg-white">
            <img src="<?= base_url(); ?>public/assets/images/search-loading.svg" alt="" class="w-10 aspect-square">
        </div>
        </div>
    </section>