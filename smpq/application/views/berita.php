<header
    class="h-[300px] flex justify-center items-center bg-[url('../images/profil-hero-bg.jpg')] bg-no-repeat bg-cover  pt-12">
    <h1 class="uppercase text-white font-bold text-5xl">Berita</h1>
</header>
<div class="berita-container flex flex-col lg:flex-row  bg-gray-100 pb-20">
    <section class="pt-10 px-5 ">
        <!-- <div class="berita-container h-fit w-full grid gap-1 lg:grid-cols-2"> -->
        <div class="berita-container h-fit w-full grid gap-3 gap-y-4 grid-cols-2 md:grid-cols-4">

            <?php if ($results != null): ?>
                <?php foreach ($results as $n): ?>
                    <div class="berita-card w-full rounded-t-xl"
                        data-id="<?= $n['id']; ?>" data-hd="<?= $n['hd']; ?>" data-thumb="<?= $n['thumb']; ?>">
                        <div class="image relative w-full aspect-video rounded-t-3xl bg-white overflow-hidden">
                            <img src="<?= base_url(); ?>public/assets/images/<?= $n['thumb']; ?>" alt="" class="gambar-berita w-full h-full object-cover rounded-3xl thumb animate-pulse blur-lg">

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
</div>

<script src="<?= base_url(); ?>public/assets/js/berita-script.js" type="module"></script>
