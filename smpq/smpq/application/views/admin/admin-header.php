<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/output.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/animate.min.css">
    <script src="<?= base_url(); ?>public/assets/js/wow.min.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/style.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="<?= base_url(); ?>public/assets/js/sweetalert2@11.js"></script>

    <link rel="icon" href="favicon.png" type="image/png">


</head>
<body>


<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB SMP Quran Al-Muanawiyah 2025/2026</title>
    <meta name="description"
        content="Website resmi SMP Quran Al-Muanawiyah. Menerima Peserta Didik Baru tahun ajaran 2025/2026">
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/output.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=67204a2d00990500133ed0ec&product=inline-share-buttons&source=platform" async="async"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/style.css">
</head>

<body class="font-Poppins text-black relative max-w-[3000px] relative admin-body bg-gray-200">
    <!-- <div class="notif down expand flex">
        <div class="notif-icon  text-green-500">
        <i class="fa-regular fa-circle-check"></i>
        </div>
        <div class="pesan  text-white flex  items-center justify-center mr-5">
            <p>hello</p>
        </div>
    </div> -->
    <div
        class="hidden hover:cursor-pointer rounded hover:bg-white/70 scroll-to-top w-12 rotate-45 bottom-8 right-8 aspect-square text-white bg-white/5 z-50 fixed flex justify-center items-center shadow-lg">
        <img src="<?= base_url(); ?>public/assets/images/up-arrow.svg"
            class="w-1/2 self-center aspect-square -rotate-45" alt="">
    </div>
    <div
        class="hidden visi-misi w-full h-screen bg-black z-50 bg-opacity-[0.75] fixed overflow-y-scroll backdrop-blur-xl flex justify-center">
        <div class="w-10/12 md:w-3/5 lg:w-6/12  xl:3/12 absolute ">
            <img src="<?= base_url() ?>public/assets/images/visi-misi-bg-transparent.webp" class="w-full" alt="">
            <div
                class="close-btn absolute right-2 top-2 bg-white text-black w-6 rounded-full aspect-square flex justify-center items-center hover:cursor-pointer scale-125">
                x</div>
        </div>
    </div>
    <div
        class="hidden galery-full-view w-full h-screen bg-black z-50 bg-opacity-[0.75] fixed overflow-y-scroll backdrop-blur-xl text-white flex justify-center items-center flex-col">
        <img src="<?= base_url() ?>public/assets/images/1.jpg" alt="">
        <p class="detail text-white mt-3 text-xs font-serif font-thin">Lorem, ipsum dolor sit amet consectetur
            adipisicing elit. Eum, labore!</p>
        <div
            class="close-btn fixed right-2 top-2 bg-white text-black w-6 rounded-full aspect-square flex justify-center items-center hover:cursor-pointer scale-125">
            x</div>
    </div>
    <!-- <divp-[[]] -->
    <header class="top-0 w-full z-40 text-white fixed">
        <div class="bg-black w-full px-10 flex justify-between items-center relative header-container">
            <div class="logo-smp">
                <a href="<?= base_url() ;?>">
                    <img src="<?= base_url() ?>public/assets/images/logo.png" alt="" class="w-14">
                </a>
            </div>
            <button type="button" class="md:hidden hamburger absolute right-5">
                <span
                    class="w-[20px] h-[3px] bg-primary block my-1 relative transition-all duration-300 ease-in-out origin-top-left"></span>
                <span
                    class="w-[20px] h-[3px] bg-primary block my-1 relative transition-all duration-300 ease-in-out origin-top-left"></span>
                <span
                    class="w-[20px] h-[3px] bg-primary block my-1 relative transition-all duration-300 ease-in-out origin-bottom-left"></span>
            </button>
            <div class="nav-container flex md:items-center">

                <nav
                    class="hidden md:block absolute bg-white md:bg-transparent md:text-white  text-black top-3/4 right-10 rounded-lg md:static shadow-lg md:shadow-none z-50">
                    <ul class="static md:flex justify-between items-center">
                        <li class=" ">
                            <a href="<?= base_url("") ;?>"
                                class="rounded-lg block px-3 py-2  hover:bg-gray-100 md:hover:bg-transparent">Halaman Utama</a>
                        </li>
                    
                        <li class=" ">
                        <a href="<?= base_url("auth/logout") ;?>"
                                class="block px-3 py-2  hover:bg-gray-100 md:hover:bg-transparent">Logout</a>
                        </li>
                    </ul>
                </nav>
             
            </div>
        </div>

    </header>