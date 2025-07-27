<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil SMP Quran Al-Muanawiyah</title>
    <meta name="description"
        content="Website resmi SMP Quran Al-Muanawiyah. Menerima Peserta Didik Baru tahun ajaran 2025/2026">
     
     

        

    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/output.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/profil.css">
    <script src="<?= base_url(); ?>public/assets/js/wow.min.js"></script>
    <link rel="icon" href="favicon.png" type="image/png">

</head>

<body class="font-Poppins text-black relative max-w-[3000px] relative ">
 
   
    <!-- <divp-[[]] -->
    <header class="fixed w-full z-40 text-white bg-black/0 transition-all duration-200">
        <div class="w-full h-12 bg-white text-black text-xs font-sans px-5 py-2 flex justify-between">
            <div class="left-head inline-flex items-center gap-3">
                <div class="inline-flex items-center gap-1"><span><img
                            src="<?= base_url() ?>public/assets/images/phone.svg" class="w-3" alt=""></span>+62
                    878-5443-6833</div>
                <div class="inline-flex items-center gap-3 relative h-6 w-12 justify-center items-center cursor-pointer enrol">
                    <div class="w-full h-full bg-green-500/70 absolute rounded-lg  animate-ping"></div>
                    <div class="w-full h-full bg-green-500 absolute rounded-lg border-b border-black "></div>
                    <span class="absolute text-white">Enrol</span>
                </div>
            </div>
            <div class="inline-flex items-center gap-3 max-h-10 text-xl">
                <a href="https://www.instagram.com/smpqalmuanawiyah/" target="_blank" class="h-full flex items-center">
            <i class="w-5 fa-brands fa-instagram mr-2"></i>

                </a>
                <a href="https://api.whatsapp.com/send?phone=6285645754384" target="_blank" class="h-full flex items-center">
                <i class="w-5 fa-brands fa-whatsapp mr-2"></i>

                <a href="https://www.youtube.com/@smpqalmuanawiyah" target="_blank" class="h-full flex items-center">
            <i class="w-5 fa-brands fa-youtube mr-2"></i>

                </a>
            </div>
        </div>
        <div class="bg-secondary  w-full px-10 md:px-20 flex justify-between items-center relative header-container font-Poppins transition-all duration-200 ease-in-out">
            <div class="logo-smp py-2">
                <a href="<?= base_url(); ?>">
                    <img src="<?= base_url() ?>public/assets/images/logo-white.svg" alt="" class="w-10">
                </a>
            </div>
            <button type="button" class="md:hidden hamburger absolute right-5">
                <span
                    class="w-[20px] h-[3px] bg-white block my-1 relative transition-all duration-300 ease-in-out origin-top-left"></span>
                <span
                    class="w-[20px] h-[3px] bg-white block my-1 relative transition-all duration-300 ease-in-out origin-top-left"></span>
                <span
                    class="w-[20px] h-[3px] bg-white block my-1 relative transition-all duration-300 ease-in-out origin-bottom-left"></span>
            </button>
            <div class="nav-container flex md:items-center">

                <nav
                    class="hidden md:block absolute bg-white md:bg-transparent md:text-white  text-black top-3/4 right-10 rounded-lg md:static shadow-lg md:shadow-none z-50 font-bold">
                    <ul class="static md:flex justify-between items-center">
                        <li class=" ">
                            <a href="<?= base_url() ;?>#ekstra"
                                class="rounded-lg block px-3 py-2  hover:bg-gray-100 md:hover:bg-transparent internal-link">Ekstrakurikuler</a>
                        </li>

                        <li>
                            <div class="relative inline-block text-left menu mx-3 py-2 dropdown-parent">
                                <div>
                                    <button id=""
                                        class=" inline-flex justify-center w-full font-bold rounded-md py-2">
                                        Profil
                                    </button>
                                </div>
                                <div id=""
                                    class="dropdown-menu hidden z-50  origin-top-right absolute right-0  min-w-fit rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <div class="py-1 " role="menu" aria-orientation="vertical" aria-labelledby="">
                                        <a href="#"
                                            class="whitespace-nowrap internal-link visi-misi-btn block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 "
                                            role="menuitem">Visi & Misi</a>
                                    </div>
                                    <div class="py-1 " role="menu" aria-orientation="vertical" aria-labelledby="">
                                        <a href="#"
                                            class="whitespace-nowrap internal-link visi-misi-btn block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 "
                                            role="menuitem">Struktur Organisasi</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class=" ">
                            <a href="<?= base_url('berita') ;?>"
                                class="block px-3 py-2  hover:bg-gray-100 md:hover:bg-transparent internal-link">Berita</a>
                        </li>
                        <li class=" ">
                            <a href="<?= base_url() ;?>#galeri"
                                class="block px-3 py-2  hover:bg-gray-100 md:hover:bg-transparent internal-link">Galeri</a>
                        </li>
                    </ul>
                </nav>
                <?php if(isset($_SESSION['logged_in']) && $_SESSION['user']['role'] == 1) :?>
                <div class="hidden mx-5 md:block opacity-50">|</div>
                <nav
                    class="admin-nav hidden md:block absolute bg-white md:bg-transparent md:text-white  text-black top-3/4 right-10 rounded-lg md:static shadow-lg md:shadow-none z-50 font-bold">
                    <ul class="static md:flex justify-between">

                        <li class=" ">
                            <a href="<?= base_url("admin"); ?>"
                                class="rounded-lg block px-3 py-2  hover:bg-gray-100 md:hover:bg-transparent">Admin</a>
                        </li>
                    </ul>
                </nav>
                <?php endif ;?>
            </div>
        </div>

    </header>