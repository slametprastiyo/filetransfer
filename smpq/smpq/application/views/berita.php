<header
    class="h-[300px] flex justify-center items-center bg-[url('../images/profil-hero-bg.jpg')] bg-no-repeat bg-cover  pt-12">
    <h1 class="uppercase text-white font-bold text-5xl">Berita</h1>
</header>
<div class="berita-container flex flex-col lg:flex-row  bg-gray-100 pb-20">
    <section class="pt-10 px-5 ">
        <!-- <div class="berita-container h-fit w-full grid gap-1 lg:grid-cols-2"> -->
        <div class="berita-container h-fit w-full grid gap-3 gap-y-4 grid-cols-1 md:grid-cols-2">

            <?php if ($results != null): ?>
                <?php foreach ($results as $n): ?>
                    <div class="berita-card w-full rounded-t-xl  wow animate__animated animate__fadeInUp"
                        data-id="<?= $n['id']; ?>" data-hd="<?= $n['hd']; ?>" data-thumb="<?= $n['thumb']; ?>">
                        <div class="image relative w-full aspect-video rounded-t-3xl bg-white ">
                            <img src="phpp" alt="" class="gambar-berita w-full h-full object-cover rounded-3xl thumb">
                            <img src="phpp" alt="" class="gambar-berita w-full h-full object-cover hd rounded-3xl">
                            <div
                                class="tag-berita capitalize absolute -top-3 right-5 text-xs bg-primaryLight p-2 rounded-full shadow-md">
                                kegiatan</div>
                            <div class="overlay w-full h-full bg-black absolute top-0 left-0 flex justify-center items-center">
                                <img src="<?= base_url() ?>public/assets/images/loader.svg" class="w-5 h-5 rounded-xl" alt="">
                            </div>

                        </div>
                        <div class="detail-berita p-2  bg-white shadow-lg rounded-b-3xl ">
                            <div class="detail-berita-head flex opacity-50 text-xxs">
                                <div class="tanggal  inline-block"><?= $n['created_at']; ?></div>
                                <div class="view  inline-block ml-2">
                                    <i class="fa-regular fa-eye"></i>
                                    <span><?= $n['view']; ?></span>
                                </div>
                            </div>

                            <h2 class="judul-berita font-semibold text-gray-800 capitalize text-sm sm:text-base">
                                <?= $n['title']; ?>
                            </h2>
                            <div class="berita-card-footer text-xxs md:text-xs flex justify-end">
                                <div
                                    class="baca bg-gray-100 my-2 opacity-50 rounded-full transition-colors duration-200 ease-out px-2 py-1 hover:bg-primary hover:opacity-100">
                                    <a href="<?= base_url(); ?>berita/baca/<?= $n['id']; ?>" class="">
                                        <span>baca selengkapnya</span>
                                        <img src="<?= base_url(); ?>public/assets/images/arrow-read.svg"
                                            class="w-4 ml-1 -rotate-90 inline-block" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="pagination-container w-full flex justify-center text-">
            <?= $links; ?>
        </div>
    </section>
    <aside class="  md:w-4/12 min-w-72 mx-5 pt-10 px-2 md:pl-0 md:pr-5">
        <div class="populer sticky top-0 bg-white rounded-xl w-full min-h-80 shadow-lg overflow-hidden "> 
            <h2 class="bg-gradient-to-r from-purple-500 to-primary px-5 py-2 font-medium text-lg text-white">Populer
            </h2>
            <ul class=" text-gray-600">
                <?php foreach ($popular_news as $pn): ?>
                    <li class="py-2 px-3">
                        <a href="<?= base_url(); ?>berita/baca/<?= $pn['id']; ?>?ref=berita"
                            class="w-full inline-block text-wrap text-justify">
                            <div class="h-full w-20 bg-primary"></div>
                            <?= $pn['title']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </aside>
</div>

<script src="<?= base_url(); ?>public/assets/js/berita-script.js" type="module"></script>
