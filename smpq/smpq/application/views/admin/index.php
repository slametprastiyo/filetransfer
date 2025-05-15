<section class="pt-10 mb-20 admin-home px-5 bg-white">
    <div class="menu-container grid grid-cols-2 gap-3 md:grid-cols-3 lg:grid-cols-4">
        <div class="menu capitalize py-2 px-5 bg-white shadow-lg relative rounded-xl">
            <div class="title  w-fit py-1 font-semibold text-lg rounded-full text-primary">Banner</div>
            <img src="<?= base_url() ;?>public/assets/images/mockup-banner.png" class="w-full my-2" alt="">
            <ul class="">
                <li>
                    <a href="<?= base_url(); ?>admin/banner" class="bg-primary text-white text-sm p-2 rounded-xl inline-block mb-2">lihat semua</a>
                </li>
            </ul>
            <a href="">
                <div class="tambah-banner pd-5 bg-primary text-white hover:scale-110 transition-all hover:bg-blue-500 duration-200 ease-out w-5 h-5 rounded-full absolute right-1 top-1 flex justify-center items-center">+</div>
            </a>
        </div>
        <div class="menu capitalize py-2 px-5 bg-white shadow-lg relative rounded-xl">
            <div class="title  w-fit py-1 font-semibold text-lg rounded-full text-primary">Galeri</div>
            <img src="<?= base_url() ;?>public/assets/images/mockup-galeri-primary.png" class="w-full my-2" alt="">

            <ul class="">
                <li>
                    <a href="<?= base_url(); ?>admin/galeri" class="bg-primary text-white text-sm p-2 rounded-xl inline-block mb-2">lihat semua</a>
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
                    <a href="<?= base_url(); ?>admin/news" class="bg-primary text-white text-sm p-2 rounded-xl inline-block mb-2">lihat semua</a>
                </li>
            </ul>
            <a href="">
                <div class="tambah-banner pd-5 bg-primary text-white hover:scale-110 transition-all hover:bg-blue-500 duration-200 ease-out w-5 h-5 rounded-full absolute right-1 top-1 flex justify-center items-center">+</div>
            </a>
        </div>
     
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