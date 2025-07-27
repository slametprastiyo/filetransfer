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

<body
    class="font-Poppins text-black relative max-w-[3000px] relative  bg-gray-100 bg-[url('../images/wa-bg-teal.webp')] bg-repeat bg-[length:400px_800px]">
 
    <div
        class="hidden hover:cursor-pointer rounded hover:bg-white/70 scroll-to-top w-12 rotate-45 bottom-8 right-8 aspect-square text-white bg-white/20 z-40 fixed flex justify-center items-center shadow-lg">
        <img src="<?= base_url(); ?>public/assets/images/up-arrow.svg"
            class="w-1/2 self-center aspect-square -rotate-45" alt="">
    </div>
   
    <div
        class="hidden galery-full-view w-full h-screen bg-black z-50 bg-opacity-[0.75] fixed overflow-y-scroll backdrop-blur-xl text-white flex justify-center items-center flex-col p-3">
        <img src="" alt="" class="w-full h-full object-contain">
        <p class="detail text-white mt-3 text-xs">

        </p>
        <div
            class="close-btn fixed right-2 top-2 bg-white text-black w-6 rounded-full aspect-square flex justify-center items-center hover:cursor-pointer scale-125">
            x</div>
    </div>
    <!-- <divp-[[]] -->
    <header class="fixed w-full z-40 text-white bg-black/0 transition-all duration-200">
        <div
            class="w-full h-10 bg-white text-secondary text-xxs sm:text-xs font-sans px-5 md:px-20 flex justify-between">
            <div class="left-head inline-flex items-center gap-3">
                <div class="inline-flex items-center gap-1"><span><img
                            src="<?= base_url() ?>public/assets/images/phone.svg" class="w-3 opacity-70"
                            alt=""></span>+62
                    878-5443-6833</div>
                <div
                    class="inline-flex items-center gap-3 relative h-6 w-12 justify-center items-center cursor-pointer enrol">
                    <div class="w-full h-full bg-green-500 absolute rounded-lg border-b border-black "></div>
                    <span class="absolute text-white">Enrol</span>
                </div>
                <div class="megaphone text-lg hidden hover:cursor-pointer">
                    <i class="fa-solid fa-bullhorn"></i>
                </div>
            </div>
            <div class="inline-flex items-center gap-3 max-h-10 text-sm md:text-base">
                <a href="https://www.instagram.com/smpqalmuanawiyah/" target="_blank" class="h-full flex items-center">
                    <i class="fa-brands fa-instagram "></i>

                </a>
                <a href="https://api.whatsapp.com/send?phone=6285645754384" target="_blank"
                    class="h-full flex items-center">
                    <i class="fa-brands fa-whatsapp "></i>

                    <a href="https://www.youtube.com/@smpqalmuanawiyah" target="_blank"
                        class="h-full flex items-center">
                        <i class="fa-brands fa-youtube "></i>

                    </a>
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['user']['role'] == 1): ?>
                        <a href="<?= base_url('auth/logout'); ?>" class="h-full flex items-center opacity-25">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('admin'); ?>" class="h-full flex items-center opacity-25">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </a>
                    <?php endif; ?>

            </div>
        </div>
        <div
            class="main-header bg-gradient-to-b from-secondary to-transparent  w-full px-10 md:px-20 flex justify-between items-center relative header-container font-Poppins transition-all duration-200 ease-in-out z-50">
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
                    class="hidden md:block absolute bg-white md:bg-transparent md:text-white  text-black top-3/4 right-10 rounded-lg md:static shadow-lg md:shadow-none z-50 font-normal">
                    <ul class="static md:flex justify-between items-center">
                        <li class="px-2  hover:bg-gray-100 md:hover:bg-transparent rounded-lg">
                            <a href="#ekstra"
                                class="rounded-lg block px-3 md:px-0 md:ml-3 py-2  internal-link">Ekstrakurikuler</a>
                        </li>

                        <li class="px-2 w-full  hover:bg-gray-100 md:hover:bg-transparent rounded-lg dropdown-parent">
                            <div class="relative inline-block text-left menu ml-3 py-2  w-full">
                                <div>
                                    <button id="" class=" inline-flex inline-block w-full font-normal rounded-md py-2">
                                        Profil
                                    </button>
                                </div>
                                <div id=""
                                    class="dropdown-menu hidden z-50  origin-top-right absolute right-36 top-0 md:top-10 md:right-0  min-w-fit rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <div class="py-1 " role="menu" aria-orientation="vertical" aria-labelledby="">
                                        <a href="<?= base_url('profil#visi-misi'); ?>"
                                            class="whitespace-nowrap internal-link visi-misi-btn block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 "
                                            role="menuitem">Visi & Misi</a>
                                    </div>
                                    <div class="py-1 " role="menu" aria-orientation="vertical" aria-labelledby="">
                                        <a href="<?= base_url('profil#struktur-organisasi'); ?>"
                                            class="whitespace-nowrap internal-link visi-misi-btn block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 "
                                            role="menuitem">Struktur Organisasi</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="px-2">
                            <a href="#berita"
                                class="block pl-3 py-2  hover:bg-gray-100 md:hover:bg-transparent internal-link">Berita</a>
                        </li>
                        <li class="px-2">
                            <a href="#galeri"
                                class="block pl-3 py-2  hover:bg-gray-100 md:hover:bg-transparent internal-link">Galeri</a>
                        </li>
                    </ul>
                </nav>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['user']['role'] == 1): ?>
                    <div class="hidden mx-5 md:block opacity-50">|</div>
                    <nav
                        class="admin-nav hidden md:block absolute bg-white md:bg-transparent md:text-white  text-black top-3/4 right-10 rounded-lg md:static shadow-lg md:shadow-none z-50 font-normal">
                        <ul class="static md:flex justify-between">

                            <li class="px-2">
                                <a href="<?= base_url("admin"); ?>"
                                    class="rounded-lg block pl-3 py-2  hover:bg-gray-100 md:hover:bg-transparent">Admin</a>
                            </li>
                        </ul>
                    </nav>
                <?php endif; ?>
            </div>
        </div>

    </header>