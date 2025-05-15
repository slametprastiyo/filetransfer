<div class="baca-berita-outer-container flex flex-col lg:flex-row  bg-gray-100 pb-20">
    <section id="baca-berita" class="baca-berita p-1 md:p-5  " data-thumb="<?= $berita['thumb']; ?>" data-hd="<?= $berita['hd']; ?>" data-id="<?= $berita['id']; ?>">
        <div class="baca-berita-container bg-white  px-2 md:px-5 py-3 lg:px-10 lg:py-5 rounded-lg shadow-lg">
            <div class="header w-full mb-5">
                <h1 class="font-bold text-2xl capitalize"><?= $berita['title']; ?></h1>
                <span class="text-sm opacity-50 mb-5"><?= $berita['created_at']; ?></span>
                <div class="view  inline-block ml-2 text-sm opacity-50">
                    <i class="fa-regular fa-eye"></i>
                    <span><?= $berita['view']; ?></span>
                </div>
                <ul class="sharer">
                    <li>
                        <a href="https://api.whatsapp.com/send?text=*<?= $berita['title']; ?>*%0ahttps://smpqalmuanawiyah.sch.id/berita/baca/<?= $berita['id']; ?>" target="_blank" class="inline-block bg-green-400 px-2 py-1 rounded-full">
                            <i class="fa-brands fa-whatsapp text-white"></i>
                        </a>
                    </li>
                </ul>


            </div>
            <div class="main clearfix">
                <img id="baca-berita-img" src="<?= base_url(); ?>public/assets/images/<?= $berita['hd']; ?>" alt="" class="relative w-full object-cover object-center hd top-0 object-cover object-center  mb-5 rounded-2xl">
                <?= $berita['isi']; ?>
            </div>
            <hr class="mt-10 mb-5">
            <div class="footer text-sm">
                <div class="tags">
                    <h3 class="inline-block">Tagar :</h3>
                    <?php foreach($tags as $tag) :?>
                        <?php if($tag != "") :?>
                    <span class="inline-block border rounded-lg bg-orange-100 border-primary px-1 tag-link hover:cursor-pointer"><?= $tag ;?></span>
                    <?php endif ;?>
                    <?php endforeach ;?>
                </div>
            </div>
        </div>

    </section>


</div>

<script src="<?= base_url(); ?>public/assets/js/baca-berita-script.js" type="module"></script>