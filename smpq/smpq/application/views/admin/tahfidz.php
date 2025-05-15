<section class="p-5 bg-white">
    <div class="breadcrumbs mb-5">
        <a href="<?= base_url("admin"); ?>">Admin</a>
        <span>></span>
        <span>Galeri</span>
    </div>
    <button class="px-3 py-1 bg-white rounded-xl" id="tambah-galeri-btn">+</button>
    <div class="galery-container admin px-5 md:px-40 mx-auto z-10 relative mb-5">


        <div class="rounded-lg galery-element relative overflow-hidden" data-id="" data-hd="" data-thumb=""
            data-caption="">
            <div class="menu h-fit absolute top-1/2 left-2 transition-all duration-300 opacity-0">
                <button
                    class="block  delete w-8 h-8 bg-[url('../images/trash.png')] bg-center bg-no-repeat bg-cover rounded-lg"></button>
            </div>
            <img src="" class="rounded-md hd w-full h-full object-cover object-center hidden">
            <img src="" class="rounded-md thumb w-full h-full object-cover object-center hidden">
            <div class="overlay w-full h-full bg-black absolute top-0 left-0 flex justify-center items-center">
                <img src="<?= base_url() ?>public/assets/images/loader.svg" class="w-5 h-5 rounded-lg" alt="">
            </div>
        </div>

    </div>
</section>

<form action="<?= base_url("admin/galeri_upload"); ?>" id="tambah-galeri" method="POST"
    class="hidden p-5 absolute top-10 bg-white shadow-lg rounded-lg z-50" enctype="multipart/form-data">

    <div
        class="close-btn absolute right-2 top- text-red-500 w-6 rounded-full aspect-square flex justify-center items-center hover:cursor-pointer scale-125">
        x</div>
    <h2 class="font-bold mb-5 text-center">Upolad Foto</h2>
    <img src="" alt="" class="preview hidden max-w-80 block mx-auto">
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nama / keterangan</label>
        <input type="text" id="name" name="name"
            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-4">
        <label for="file" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
        <input type="file" id="file" name="userfile"
            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
        <button type="submit"
            class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
    </div>
</form>

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


<script src="<?= base_url(); ?>public/assets/js/admin-script.js"></script>