<section class="pt-5 mb-20 admin-home px-5 bg-gray-200 min-h-screen">
    <div class="menu-container grid grid-cols-2 gap-3 md:grid-cols-4 lg:grid-cols-6">
        <div class="menu capitalize py-2 px-5 bg-white shadow-lg relative rounded-xl">
            <div class="title  w-fit py-1 font-semibold text-lg rounded-full text-primary">Banner</div>
            <img src="<?= base_url() ;?>public/assets/images/mockup-banner.png" class="w-full my-2" alt="">
            <ul class="">
                <li>
                    <a href="<?= base_url(); ?>admin/banner" class="bg-secondary text-white text-xs p-2 rounded-xl inline-block mb-2">lihat semua</a>
                </li>
            </ul>
            <a href="">
                <div class="tambah-banner pd-5 bg-primary text-white hover:scale-110 transition-all hover:bg-blue-500 duration-200 ease-out w-5 h-5 rounded-full absolute right-1 top-1 flex justify-center items-center">+</div>
            </a>
        </div>
        <div class="menu capitalize py-2 px-5 bg-white shadow-lg relative rounded-xl">
            <div class="title  w-fit py-1 font-semibold text-lg rounded-full text-primary">Galeri</div>
            <img src="<?= base_url() ;?>public/assets/images/mockup-galeri.png" class="w-full my-2" alt="">

            <ul class="">
                <li>
                    <a href="<?= base_url(); ?>admin/galeri" class="bg-secondary text-white text-xs p-2 rounded-xl inline-block mb-2">lihat semua</a>
                </li>
            </ul>
            <a href="">
                <div class="tambah-banner pd-5 bg-primary text-white hover:scale-110 transition-all hover:bg-blue-500 duration-200 ease-out w-5 h-5 rounded-full absolute right-1 top-1 flex justify-center items-center">+</div>
            </a>
        </div>
        <div class="menu capitalize py-2 px-5 bg-white shadow-lg relative rounded-xl">
            <div class="title  w-fit py-1 font-semibold text-lg rounded-full text-primary">Berita</div>
            <img src="<?= base_url() ;?>public/assets/images/mockup-berita.png" class="w-full my-2" alt="">

            <ul class="">
                <li>
                    <a href="<?= base_url(); ?>admin/news" class="bg-secondary text-white text-xs p-2 rounded-xl inline-block mb-2">lihat semua</a>
                </li>
            </ul>
            <a href="">
                <div class="tambah-banner pd-5 bg-primary text-white hover:scale-110 transition-all hover:bg-blue-500 duration-200 ease-out w-5 h-5 rounded-full absolute right-1 top-1 flex justify-center items-center">+</div>
            </a>
        </div>
        <div class="menu capitalize py-2 px-5 bg-white shadow-lg relative rounded-xl">
            <div class="title  w-fit py-1 font-semibold text-lg rounded-full text-primary">Presensi GTK</div>
            <img src="<?= base_url() ;?>public/assets/images/mockup-berita.png" class="w-full my-2" alt="">

            <ul class="">
                <li>
                    <a href="<?= base_url(); ?>admin/rekap_kehadiran_gtk" class="bg-secondary text-white text-xs p-2 rounded-xl inline-block mb-2">lihat semua</a>
                </li>
            </ul>
        </div>
     
    </div>
    <div class="menu-container grid grid-cols-4 gap-2 md:grid-cols-8 lg:grid-cols-12 mt-10">
        <a href="<?= base_url() ;?>admin/user_management" class="w-full bg-blue-200 border border-blue-500 rounded-xl uppercase p-2 hover:cursor-pointer flex justify-center items-center shadow-sm">
            User Management
        </a>
        <a href="<?= base_url() ;?>admin/manage_user_face" class="w-full bg-blue-200 border border-blue-500 rounded-xl uppercase p-2 hover:cursor-pointer flex justify-center items-center shadow-sm">
            User Face Management
        </a>
        <a href="<?= base_url() ;?>admin/user_role" class="w-full bg-blue-200 border border-blue-500 rounded-xl uppercase p-2 hover:cursor-pointer flex justify-center items-center shadow-sm">
            User Role
        </a>
        <a href="<?= base_url() ;?>admin/controller" class="w-full bg-blue-200 border border-blue-500 rounded-xl uppercase p-2 hover:cursor-pointer flex justify-center items-center shadow-sm">
            Controller
        </a>
        <a href="<?= base_url() ;?>pilketos/result" class="w-full bg-blue-200 border border-blue-500 rounded-xl uppercase p-2 hover:cursor-pointer flex justify-center items-center shadow-sm">
            pilketos
        </a>
    </div>

</section>
<!-- <ul>
        <li>
            <a href="<?= base_url(); ?>admin/banner">banner</a>
        </li>
        <li>
            <a href="<?= base_url(); ?>admin/news">news</a>
        </li>
        <li>
            <a href="<?= base_url(); ?>admin/galeri">galeri</a>
        </li>
    </ul> -->

    <script src="<?= base_url(); ?>public/assets/js/admin-script.js"></script>