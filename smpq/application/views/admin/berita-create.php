<section class="bg-gray-100">
    <form action="<?= base_url("admin/news_upload"); ?>" method="POST" class="p-10  bg-white w-full min-h-screen overflow-x-hidden relative"
        enctype="multipart/form-data">
        <div class="form-group p-2 ">
            <input type="text" class="form-control inline-block w-full  text-xl font-bold uppercase outline-none" name="judul"
                id="judul" placeholder="Judul" autofocus>
        </div>
        <div class="flex flex-col md:flex-row">
            <div class="form-group hero-img w-full  p-2 relative">
                <img src="<?= base_url("public/assets/images/"); ?>img-mockup.png" alt="" class="img-preview w-full rounded-lg shadow-custom aspect-video object-contain" id="img-preview">
                <div class="absolute top-10 left-5 bg-secondary text-white py-1 px-2 rounded-lg hover:cursor-pointer text-sm"
                    id="select-image">Pilih Gambar Sampul</div>
            </div>
            <div class="detail">
                <div class="form-group p-2 ">
                <label for="browser">Kategori :</label>
                <input list="categories" required="required" autocomplete="off" name="category" id="category" class="border block border-secondary px-2 rounded-lg w-full">
                <datalist id="categories">
                    <?php foreach($categories as $cat) :?>
                        <option class="capitalize" value="<?= $cat['name'] ;?>">
                        <?php endforeach;?>
                </datalist>
            </div>
            <div class="form-group p-2 ">
                <label for="tags">Tagar : <abbr title="pisahkan dengan , (koma)" class="inline-block w-3 text-center aspect-square rounded-full bg-secondary text-white text-xs">?</abbr></label>
                <textarea class="form-control inline-block w-full text-base  outline-none mt-2 border  border-secondary text-sm p-2 rounded-lg"
                    id="tags" name="tagar"></textarea>
                <div class="tagar-populer">
                    <small>Tagar populer :</small>
                    <?php foreach($tags as $tag) :?>
                    <div class="tagar p-1 border border-primary text-xs inline-block hover:cursor-pointer rounded-lg"><?= $tag['name'] ;?></div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="form-group p-2 ">
                <label for="tags">Tautan :</label>
                <textarea class="form-control inline-block w-full text-base  outline-none mt-2 border  border-secondary text-sm p-2 rounded-lg"
                    id="tautan" name="link"></textarea>
            </div>
             <div class="form-group p-2">
                <label for="additional_images">Gambar Tambahan</label>
                <div class="additional-images-preview grid grid-cols-2 gap-2 mb-10 bg-white rounded-lg p-5" id="additionalPreviewContainer" ></div>
            <input type="file" name="additional_images[]" multiple id="additionalImageInput">
        </div>
            </div>
        </div>
        <input type="file" id="image" name="userfile" accept=".jpg, .png, .jpeg, .webp" class="absolute left-96 scale-0">
        <div class="form-group p-2 ">
            <textarea class="form-control inline-block w-full text-base  outline-none mt-2 min-h-32 text-sm font-serif border border-secondary rounded-lg p-2"
                id="isi" placeholder="isi" name="isi"></textarea>
        </div>
       
        <hr>
        <!-- <div class="form-group p-2 ">
            <label for="" class="opacity-50">Opsional</label>
            <div class="rounded-full overflow-hidden flex items-center my-3 text-xs border border-secondary w-fit pr-3 hover:cursor-pointer">
                <div class="w-6 aspect-square bg-secondary text-white flex justify-center items-center ">+</div>
                <div class="ml-3">Tambahkan Foto Dokumentasi</div>
            </div>
        </div> -->

        <button type="submit" class="hidden" id="submit-news"></button>
    </form>
</section>


<script>



</script>
<script src="<?= base_url(); ?>public/assets/js/berita-create.js" type="module"></script>