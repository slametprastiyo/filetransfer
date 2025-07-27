<div class="restrict fixed top-0 bottom-0 left-0 right-0  bg-black/25 z-50 hidden  flex justify-center items-center">
    <img src="<?= base_url() ?>public/assets/images/loader.svg" class="w-5 h-5 rounded-lg">
</div>


<section class="p-5 mt-20">

<div class="breadcrumbs mb-5">
    <a href="<?= base_url("admin") ;?>">Admin</a>
    <span>></span>
    <span>Banner</span>
</div>
    <button class="px-3 py-1 bg-white rounded-xl" id="tambah-banner-btn">+</button>
    <div class="banner-container w-full md:max-w-xl mx-auto px-8 relative">
        <?php foreach ($banners as $banner): ?>
            <div
                class=" banner-card relative transition-transform duration-100 rounded-2xl py-2 my-1 bg-cover bg-center w-full bg-white shadow-md p-2 h-52" data-id="<?= $banner['id'] ;?>" data-name="<?= $banner['name'] ;?>" id="<?= $banner['id'] ;?>">
                <div class=" banner-img h-full flex">
                    <div class="banner-mobile-img  w-4/12 flex justify-center">
                        <img src="<?= base_url(); ?>public/assets/images/<?= $banner['mobile']; ?>" alt=""
                            class="rounded-lg h-full">
                    </div>
                    <div class="banner-desktop-img  w-8/12 flex justify-center">
                        <img src="<?= base_url(); ?>public/assets/images/<?= $banner['desktop']; ?>" alt=""
                            class="rounded-lg h-full">
                    </div>
                </div>
                <div
                    class=" left-menu absolute w-7 h-full -left-7 top-0 flex flex-col justify-center text-center items-center">
                    <i class="delete fa-solid fa-trash text-red-500 hover:scale-125 transition-transform w-fit my-2"></i>
                </div>
                <div
                    class=" right-menu absolute h-fit -right-28 top-0  text-center ">
                    <div class=" flex relative left-0">
                        <div class="down w-12 h-12 my-2 hover:h-14 rounded-full transition-all bg-[url('../images/arrow-down.png')] bg-center bg-no-repeat bg-cover mr-2"></div>
                        <div class="bottom w-12 h-12 my-2 hover:h-14 rounded-full transition-all bg-[url('../images/arrow-to-bottom.png')] bg-center bg-no-repeat bg-cover"></div>
                    </div>

                    <div class=" flex relative left-0">
                        <div class="top w-12 h-12 my-2 hover:h-14 rounded-full transition-all bg-[url('../images/arrow-to-top.png')] bg-center bg-no-repeat bg-cover mr-2"></div>
                        <div class="up w-12 h-12 my-2 hover:h-14 rounded-full transition-all bg-[url('../images/arrow-up.png')] bg-center bg-no-repeat bg-cover"></div>   
                    </div>
                    
                    
                    
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>


    <form action="<?= base_url("admin/banner_upload"); ?>" id="tambah-banner" method="POST"
        class="hidden p-5 absolute top-0 w-full min-h-full left-0 bg-white shadow-lg rounded-lg" enctype="multipart/form-data">

        <div
            class="close-btn absolute right-2 top- text-red-500 w-6 rounded-full aspect-square flex justify-center items-center hover:cursor-pointer scale-125">
            x</div>
        <h2 class="font-bold mb-5 text-center">Tambah Banner</h2>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama / keterangan</label>
            <input type="text" id="name" name="name"
                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="preview flex">
            <img src="" alt="" class="banner-mobile-preview hidden w-1/2 h-80 object-contain  block mx-auto mt-5">
            <img src="" alt="" class="banner-desktop-preview hidden w-1/2 h-80 object-contain block mx-auto mt-5">
        </div>
        
        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">Ukuran Mobile <i
                    class="fa-solid fa-mobile-screen"></i> </label>
            <input type="file" id="banner-mobile" name="banner-mobile" required
                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        
        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">Ukuran Desktop <i
                    class="fa-solid fa-desktop"></i></label>
            <input type="file" id="banner-desktop" name="banner-desktop" required
                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
        </div>
    </form>

</section>
<!-- <div class="z-90 w-32 aspect-square test bg-blue-400"></div> -->
<section>
    <img src="<?= base_url(); ?>public/assets/images/tes/1731663716.webp" class="w-full" alt="">
</section>
<?php
if ($this->session->flashdata("error")) {
    echo '<script>Swal.fire("Error", "' . $this->session->flashdata("error") . '", "error")</script>';
}
; ?>

<?php
if ($this->session->flashdata("success")) {
    echo '<script>Swal.fire("Success", "Data telah ditambahkan", "success")</script>';
}
; ?>

