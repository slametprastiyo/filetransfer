<section class="mt-20">

    <h1 class="text-blue-500">Admin / Berita</h1>
    <button class="px-3 py-1 border border-primary" id="tambah-berita-btn">+</button>


    <div class="admin berita-container h-fit w-full p-5 ">
        <table class="bg-white shadow-xl w-full">
            <tr class="text-left">
                <th class="p-5">No</th>
                <th class="p-5">Image</th>
                <th class="p-5">Title</th>
                <th class="p-5">Tanggal</th>
            </tr>
            <?php $i = 0; ?>
            <?php foreach ($news as $n): ?>
                <?php if ($i % 2 == 0): ?>
                    <tr data-id="<?= $n['id'] ;?>" data-name="<?= $n['title'] ;?>" data-image="<?= $n['hd'] ;?>" class="berita-row bg-gray-100 text-xs relative">
                    <?php else: ?>
                    <tr data-id="<?= $n['id'] ;?>" data-name="<?= $n['title'] ;?>" data-image="<?= $n['hd'] ;?>" class="berita-row text-xs relative">
                    <?php endif; ?>
                    <td class="px-5 py-2"><?= $i + 1; ?></td>
                    <td class="px-5 py-2">
                        <img src="<?= base_url(); ?>public/assets/images/<?= htmlspecialchars($n['hd']); ?>" alt=""
                            class="w-14 h-14 object-contain ">
                    </td>
                    <td class="px-5 py-2">
                        <?= htmlspecialchars($n['title']); ?>
                    </td>
                    <td class="px-5 py-2">
                        <?= htmlspecialchars($n['created_at']); ?>
                    </td>
                    <td>
                        <div class="menu absolute hidden right-2 top-2 border flex bg-white rounded-xl py-2 px-5">
                            <i
                                class="delete fa-solid fa-trash text-red-500 hover:scale-125 transition-transform w-fit my-2"></i>
                            <i class="edit ml-5 fa-solid fa-pen hover:scale-125 transition-transform w-fit my-2"></i>
                        </div>

                    </td>
                </tr>
                <input type="hidden" id="isi-<?= $n['id'] ;?>" value="<?= $n['isi'] ;?>">
                <?php $i += 1; ?>
            <?php endforeach; ?>
        </table>

    </div>

    <form action="<?= base_url("admin/news_upload"); ?>" id="tambah-berita" method="POST"
        class="hidden md:w-3/4 h-full p-5 fixed top-10 bg-white shadow-lg rounded-lg w-full h-full top-0 overflow-y-scroll pb-10"
        enctype="multipart/form-data">

        <div
            class="close-btn absolute right-2 top- text-red-500 w-6 rounded-full aspect-square flex justify-center items-center hover:cursor-pointer scale-125">
            x</div>
        <h2 class="font-bold mb-5 text-center">Tulis Berita</h2>
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" required id="judul" name="judul"
                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
            <textarea id="isi" required name="isi"
                class="mt-1 p-2 block min-h-40 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>
        <img src="" alt="" class="preview max-w-80 mx-auto hidden">

        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
            <input type="file" id="file" required name="userfile" accept=".jpg, .png, .jpeg"
                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
        </div>
    </form>
    <form action="<?= base_url("admin/news_update"); ?>" id="edit-berita" method="POST"
        class="hidden md:w-3/4 h-full p-5 fixed top-10 bg-white shadow-lg rounded-lg w-full h-full top-0 overflow-y-scroll pb-10"
        enctype="multipart/form-data">

        <div
            class="close-btn absolute right-2 top- text-red-500 w-6 rounded-full aspect-square flex justify-center items-center hover:cursor-pointer scale-125">
            x</div>
        <h2 class="font-bold mb-5 text-center">Edit Post</h2>
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" required id="edit-judul" name="judul"
                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
            <textarea id="edit-isi" required name="isi"
                class="mt-1 p-2 block min-h-40 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>
        <img src="" alt="" class="preview max-w-80 mx-auto hidden">

        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">Upload Gambar</label>

            <input type="file" id="edit-file" name="userfile" accept=".jpg, .png, .jpeg"
                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <input type="hidden" name="id" value="" class="input-id">
        </div>
        <div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
        </div>
    </form>
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
if ($this->session->flashdata("success-update")) {
    echo '<script>Swal.fire("Success", "Data telah diupdate", "success")</script>';
}
; ?>