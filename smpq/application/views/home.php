<div class="loader">
    <div class="loader-container w-fit h-fit relative">
        <iframe src="https://cdn.lottielab.com/l/D8jKNqtxs6trrU.html" width="400" height="250" frameborder="0"></iframe>

    </div>
</div>
<!-- <div class="pilketos-pop-up w-32 hover:cursor-pointer h-48 bg-[url('../images/pilketos-pop-up.png')] bg-contain bg-center bg-no-repeat rounded-full fixed bottom-5 right-5 z-80" onclick="window.location.href='pilketos';"></div> -->
<div class="p-5 pt-2 pb-0">
    

<section class="hero  relative w-full bg-secondary rounded-3xl overflow-hidden">
    <div class="absolute w-full flex justify-center items-start pt-2  top-0 left-0 h-8 z-70 bg-gradient-to-b from-black/25 to-black/0">
        <div class="slider-indicator-container w-full flex   bg-gray-200/10 rounded-full">
            <div
                class="slider-indicator animate-pulse  h-1 bg-gradient-to-r from-white/0 to-white flex justify-end items-center rounded-full relative">
                <div class="absolute w-7 aspect-square -top-3 -right-3">
                    <img src="<?= base_url(); ?>public/assets/images/progres-star.svg" class="w-full h-full object-contain animate-pulse">
                </div>
            </div>
        </div>
    </div>
<!-- dan peduli terhadap lingkungan dalam suasana aman dan ramah -->

    <div
        class=" identity absolute top-0 left-0 bottom-0 right-0 z-20 text-white flex flex-col  pb-20 pt-10 md:justify-between   overflow-hidden items-start bg-gradient-to-b md:bg-gradient-to-r from-secondary to-transparent">
        <img src="<?= base_url(); ?>public/assets/images/hero-img.webp" alt="siswi smp quran Almuanawiyah"
            class="absolute w-full bottom-0 lg:top-0 object-contain md:w-6/12 right-0 z-50 hero-img">
        <div class="flex justify-center items-center mb-2  pt-5 mx-auto md:mx-0 logo p-5 md:pl-20">
            <img src="<?= base_url(); ?>public/assets/images/logo-white.png" class=" w-16 mr-10 md:w-20 logo" alt="">
            <img src="<?= base_url(); ?>public/assets/images/akreditasi.webp" class="w-12  h-12 object-contain md:h-12 md:w-12 mr-10"
                alt="">
            <img src="<?= base_url(); ?>public/assets/images/logo-adiwiyata.png" class="w-12  h-12 object-contain md:h-12 md:w-12 bg-green-100 rounded-xl"
                alt="">

        </div>
        <div class="pl-5 md:pl-20 w-full text-center md:text-start">
            <h1 class=" text-3xl sm:text-4xl lg:text-7xl font-semibold relative z-50 drop-shadow-lg ">
                SMP
                Quran <br><span class="text-3xl sm:text-6xl lg:text-7xl font-Boldonse inline-block mt-3">Al-Muanawiyah</span></h1>
            <p class="text-xl">Terakreditasi A</p>


        </div>
    </div>

    <div class="mySlides fade relative first-slide">
        <picture data-desktop="1735200011-desktop.webp" data-mobile="1735200011-mobile.webp">
            <source media="(min-width:768px)">
            <!-- <source media="(min-width:768px)" srcset=""> -->
            <img src="" alt="" class="w-full md:h-[500px] md:object-cover" id="first-slide">
        </picture>
    </div>

    <?php foreach ($banners as $banner): ?>
        <div class="mySlides fade relative">
            <picture data-desktop="<?= $banner['desktop']; ?>" data-mobile="<?= $banner['mobile']; ?>">
                <source media="(min-width:768px)">
                <!-- <source media="(min-width:768px)" srcset=""> -->
                <img src="" alt="" class="w-full md:h-[500px] md:object-cover">
            </picture>
        </div>
    <?php endforeach; ?>
    <div class="navigasi hero absolute right-5 md:right-10 h-full top-0 flex justify-center  flex-col items-center z-60">
        <a
            class="prev block relative h-10 w-10 rounded-full border border-white/75   text-white text font-bold text-base select-none bg-white/15 hover:bg-white hover:cursor-pointer hover:text-black flex justify-center items-center transition-all  ">❮</a>
        <a
            class="next -translate-y-2 block relative h-10 w-10 rounded-full border border-white/75  text-white text font-bold text-base select-none  bg-white/15 hover:bg-white hover:cursor-pointer hover:text-black flex justify-center items-center transition-all ">❯</a>
    </div>
    <div class="absolute bottom-3 left-3 bg-white width-32 aspect-square z-90"></div>
</section>
</div>

<section class="highlight my-1 px-5 w-full">
    <div class="w-full flex flex-row py-2 relative items-center">
        
        <div class="marquee-container relative flex-auto w-full bg-secondary text-white shadow-sky-700/20 shadow-lg  overflow-hidden p-1 border-r-4 border-secondary">
            <div class="highlight-title-container flex-none bg-secondary absolute left-0 z-20 pl-1">
                <div class="highlight-title  bg-white  text-secondary h-6 px-2 md:px-5 text-xs md:text-sm uppercase flex justify-center items-center relative">highlights</div>
            </div>
            
            <div class="marquee-content w-fit flex z-10 relative left-[100%]">
            <?php foreach ($recentNews as $key => $n): ?>

            <a href="<?= base_url() ?>berita/baca/<?= $n['id'] ;?>" class="inline-block no-wrap mx-2 w-fit" >
                <?= $n['title']; ?>.
            </a>
            <?php endforeach; ?>
            </div>
            
        </div>
    </div>
    
</section>
<!-- <section class="ppdb py-20 w-full h-screen flex justify-center items-center overflow-x-hidden relative">
    <img src="" alt="brosur penerimaan peserta didik baru" data-src="ppdb.png" class="block object-contain mx-auto w-full h-full max-w-2xl my-5 relative z-10">
    <div
            class="z-40 enrol w-32 h-10 mx-auto  absolute flex justify-center items-center hover:cursor-pointer scale-110 bottom-0 mx-auto">
            <div class="w-full h-full bg-primary/10 absolute rounded-full  animate-ping"></div>
            <div class="w-full h-full bg-primary absolute rounded-full border-2 border-white "></div>
            <span class="absolute text-white">Pendaftaran</span>
        </div>
</section> -->





<section class="px-5 flex flex-col md:flex-row  pb-5 " id="berita">
    <div class="w-full md:w-8/12 min-h-screen">
        <?php if ($recentNews != null): ?>
            <?php foreach ($recentNews as $key => $n): ?>
                <?php if ($key == 0): ?>
                    <div class="featured-main bg-secondary w-full  relative bg-center bg-cover hover:cursor-pointer flex flex-col md:flex-row text-white aspect-video md:aspect-auto rounded-3xl overflow-hidden" data-id="<?= $n['id'] ;?> " data-img="<?= $n['hd']; ?>">
                        <img src="<?=  base_url() ?>public/assets/images/<?= $n['thumb'];?>" class="featured-main-img w-full md:w-9/12 left-0 h-full absolute object-center object-cover" data-img="<?= $n['hd']; ?>">

                        <!-- <div class=" w-full md:w-7/12 bg-center bg-cover bg-no-repeat" data-img="<?= $n['hd']; ?>"> </div> -->
                        <div class="details w-full p-3 pr-5  absolute md:relative font-Poppins flex flex-col md:flex-row justify-end bg-gradient-to-t md:bg-gradient-to-l from-secondary via-secondary/90 to-transparent bottom-0 py-3 md:py-24">
                            <div class="md:w-1/2 w-full">
                              <h3 class="font-bold text-2xl mb-1 uppercase"><?= $n['title'] ;?></h3>
                            <p class="mb-5 opacity-75"><?= $n['created_at'] ;?></p>
                            <p class="featured-main-excerpt text-sm font-light">
                                <?php 
                                    echo str_replace('|', '', $n['isi']);

                                 ?>

                            </p>
                            <div class="relative mt-3 text-sm opacity-75 left-0 capitalize bottom-0 rounded-full">baca selengkapnya</div>      
                            </div>
                          
                        </div>
                        <span class="label-kategori border border-white/75 absolute left-3 top-3 rounded-full p-2 py-1 text-xs capitalize bg-primary/75"><?= $n['category'] ;?></span>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="berita-container w-full gap-2 mt-5  rounded-2xl grid grid-cols-2 md:grid-cols-3 mb-10">
            <?php if ($recentNews != null): ?>
                <?php foreach ($recentNews as $key => $n): ?>
                    <?php if ($key == 0) {
                        continue;
                    }; ?>
                    <div class="berita-card hover:cursor-pointer w-full rounded-2xl overflow-hidden  bg-white/50  flex flex-col"
                        data-id="<?= $n['id']; ?>" data-hd="<?= $n['hd']; ?>" data-thumb="<?= $n['thumb']; ?>">
                        <div class="image  relative  p-1">
                            <img class="gambar-berita w-full aspect-video object-cover object-center hd rounded-xl blur-lg"
                                src="<?= base_url(); ?>public/assets/images/<?= $n['thumb']; ?>">
                                <span class="label-kategori border border-white/75 absolute left-2 top-2 rounded-lg p-2 py-1 text-xs capitalize bg-primary/75 text-white"><?= $n['category'] ;?></span>
                        </div>
                        <div class="detail-berita p-5 w-full ">


                            <h2
                                class="judul-berita font-Montserrat font-medium text-gray-900 capitalize text-xs sm:text-sm break-words">
                                <?= $n['title']; ?>
                            </h2>
                            <div class="detail-berita-head flex opacity-80 text-xxs md:text-xs mb-2">
                                <div class="tanggal  inline-block"><?= $n['created_at']; ?></div>
                                <div class="view  inline-block ml-2">
                                    <i class="fa-regular fa-eye"></i>
                                    <span><?= $n['view']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            


        </div>
        <div class="load-more text-center w-fit mx-auto hover:cursor-pointer text-black relative z-10 bg-white py-2 px-4 font-quicksand-medium transition-all duration-200 hover:bg-black hover:text-white rounded-full mt-10 wow animate__animated animate__fadeInUp mb-10 h-fit"
                data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
                <a href="<?= base_url(); ?>berita">Muat Lebih Banyak ...</a>
            </div>
    </div>
    <div class="w-full md:w-4/12 min-h-screen md:pl-5">
        <div class=" rounded-3xl  w-fullp-5 relative mr-2 md:mr-0 ml-3">
                <div class="w-full flex flex-row relative z-40">
                    <div class="featured-menu bg-secondary text-white relative rounded-t-xl  p-2 px-5 text-center latest active font-bold  opacity-100 transition-all hover:cursor-pointer"
                        data-featured="latest">
                        <i class="fa-solid fa-clock"></i>
                        <span>
                            Terkini
                        </span>
                    </div>

                    <div class="featured-menu bg-secondary/30 relative rounded-t-xl  p-2 px-5 text-center opacity-75 popular top-2 transition-all hover:cursor-pointer"
                        data-featured="popular">
                        <i class="fa-solid fa-clock"></i>
                        <span>
                            Populer
                        </span>
                    </div>
                </div>
                <div class="featured-container relative z-50 bg-white min-h-72 py-5 pl-10 rounded-b-xl transition-all rounded-b-xl bg-white font-Montserrat capitalize text-base  latest-container"
                    data-featured="latest">
                    <?php if ($recentNews != null): ?>
                        <?php foreach ($recentNews as $key => $n): ?>
                            <a href="<?= base_url() ?>berita/baca/<?= $n['id']; ?>" class="">
                                
                                <p class="my-3 hover:color-secondary hover:font-bold capitalize">
                                    <?= $n['title']; ?>
                                </p>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="featured-container relative z-50 bg-white min-h-72 py-5 pl-10 rounded-b-xl transition-all rounded-b-xl bg-white font-Montserrat uppercase text-base popular-container hidden"
                    data-featured="popular">
                    <?php if ($popularNews != null): ?>
                        <?php foreach ($popularNews as $key => $n): ?>
                            <a href="<?= base_url() ?>berita/baca/<?= $n['id']; ?>" class="">
                                
                                <p class="my-3 hover:color-secondary hover:font-bold capitalize">
                                    <?= $n['title']; ?>
                                </p>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="absolute w-14 -left-6 top-20 z-60 flex justify-center items-center">
                <img src="<?= base_url(); ?>public/assets/images/binder-ring.png" class="w-full select-none">
                    
                </div>
            </div>
            <div class="ppdb w-full mt-3 p-1">
            <a href="<?= base_url(); ?>ppdb">
                <img src="<?= base_url(); ?>public/assets/images/poster-ppdb.jpeg" alt=""
                    class="rounded-xl shadow-custom">
            </a>
        </div>
    </div>
</section>







<section class="sambutan min-h-screen  flex flex-col md:flex-row items-center px-5 md:px-10 py-10  bg-secondary">
    <div class="w-full md:w-5/12 h-full  order-2">
        <img src="<?= base_url() ?>public/assets/images/ks-3-thumb.png" alt="kepala SMP Quran Al-Muanawiyah"
                class="kepala-sekolah w-full h-full object-contain object-center rounded-xl blur-lg" data-hd="ks-3.png">
    </div>
    <div class="w-full md:w-7/12 h-full  order-1 flex flex-col justify-center text-white pr-10 mb-10 md:mb-0">
        <div class="identitas-kepala-sekolah text-left md:text-right mb-5">
            <p class="nama-kepala-sekolah font-bold text-2xl md:text-4xl font-Montserrat">Lia Amirotus Zakiyah, S.Pd</p>
            <p class="font-semibold text-xl">Kepala SMPQ Al-Muanawiyah</p>
        </div>
        <div class="w-full h-72 overflow-y-scroll mt-5 pl-5 md:pl-20 pr-5 mr-0 md:mr-5 text-right teks-container">
            <p class="mb-2 indent-4 text-justify opacity-80">
                    Puji syukur kita panjatkan kehadirat Allah SWT atas segala rahmat dan hidayah-Nya, sehingga kita
                    semua
                    dapat beraktivitas dengan baik dan dalam keadaan sehat walafiat.
                </p>
                <p class="mb-2 indent-4 text-justify opacity-80">
                    SMP Qur'an Al-Muanawiyah terus berinovasi dalam metode pengajaran, meningkatkan kualitas tenaga
                    pendidik, serta memperkaya fasilitas belajar guna merealisasikan visi kami yaitu terwujudnya peserta
                    didik yang berjiwa qur'ani dan unggul dalam IPTEK.
                </p>
                <p class="mb-2 indent-4 text-justify opacity-80">
                    Kami sangat mengapresiasi dukungan dari orang tua santri dan seluruh stakeholder pendidikan yang
                    telah turut serta membangun lingkungan pendidikan yang kondusif dan harmonis. Kebersamaan dan
                    kolaborasi
                    ini merupakan kunci kesuksesan dalam mencetak generasi penerus bangsa yang handal.
                </p>
                <p class="mb-2 indent-4 text-justify opacity-80">
                    Akhir kata, mari kita bersama-sama melangkah maju untuk mewujudkan cita-cita pendidikan yang luhur.
                    Semoga Allah SWT senantiasa meridhai setiap langkah kita. <br>
                    Wassalamu'alaikum warahmatullahi wabarakatuh.
                </p>
        </div>

    </div>

</section>
<section class="program relative  px-5 md:px-20   my-20 mt-32 rounded-xl pb-10" id="program">
    <div class="text-center z-10 relative text-black block w-full mx-auto wow animate__animated animate__fadeInUp"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <h2
            class=" bg-gray-100 font-semibold uppercase text-2xl md:text-5xl inline-block w-fit relative -top-6 text-secondary py-2 px-5 rounded-full font-Boldonse">
            Program Unggulan</h2>
    </div>
    <div class=" text-gray-800  mb-10 my-10 max-w-3xl mx-auto">
        Program unggulan di SMP Quran Al-Muanawiyah dirancang untuk mendukung pengembangan kompetensi akademik,
        kompetensi non akademik, dan karakter siswa untuk secara menyeluruh, sejalan dengan slogan <span
            class="font-semibold text-primary">“The School of Holding Quran"</span>
    </div>

    <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <div
            class="program-item font-semibold flex flex-col bg-white text-secondary rounded-xl p-5  md:p-10 py-10 mb-10">
            <i class="fa-solid fa-book text-7xl text-secondary inline-block w-full text-center "></i>
            <h3 class="text-xl md:text-2xl break-words xl:break-normal my-5 font-bold text-center">INTRAKURIKULER 2
                KURIKULUM</h3>
            <p>Meliputi <span class="font-bold">Kurikulum Nasional</span> dan <span class="font-bold">Kurikulum
                    Kepesantrenan</span></p>
            <a href="#intrakurikuler"
                class="flex  mt-10 justify-center animate-bounce  items-center w-fit mx-auto block aspect-square bg-secondary rounded-full p-2">
                <i class="fa-solid fa-angles-down  text-primary text-xl"></i>
            </a>
        </div>
        <div
            class="program-item font-semibold flex flex-col bg-white text-secondary rounded-xl p-5 md:p-10 py-10 mb-10">
            <i class="fa-solid fa-book-quran text-7xl text-secondary inline-block w-full text-center "></i>
            <h3 class="text-xl md:text-2xl break-words xl:break-normal my-5 font-bold text-center">PROGRAM TAHFIDZ</h3>
            <p class="text-justify opacity-70">Diberikan Program Tahfidz (dalam Kurikulum Kepesantrenan) berupa
                Percepatan untuk menambah target hafalan. Dan Perbaikan untuk penyetaraan.</p>
            <a href="#tahfidz"
                class="flex mt-10 justify-center animate-bounce items-center w-fit mx-auto block aspect-square bg-secondary rounded-full p-2">
                <i class="fa-solid fa-angles-down  text-primary text-xl"></i>
            </a>
        </div>
        <div
            class="program-item font-semibold flex flex-col bg-white text-secondary rounded-xl p-5 md:p-10 py-10 mb-10">
            <i class="fa-solid fa-campground text-7xl text-secondary inline-block w-full text-center "></i>
            <h3 class="text-xl md:text-2xl break-words xl:break-normal my-5 font-bold text-center">EKSTRAKURIKULER &
                OUTDOOR ACTIVITY</h3>
            <p class="text-justify opacity-70">Program Ekstrakurikuler yang beragam untuk meningkatkan potensi peserta
                didik dan outdoor activity yang menarik</p>
            <a href="#ekstra"
                class="flex mt-10 justify-center animate-bounce items-center w-fit mx-auto block aspect-square bg-secondary rounded-full p-2">
                <i class="fa-solid fa-angles-down  text-primary text-xl"></i>
            </a>
        </div>
    </div>
</section>


<section id="ekstra" class="ekstra min-h-screen my-32 ">
    <div class="text-center z-10 relative text-black block w-full mx-auto wow animate__animated animate__fadeInUp mt-20"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <h2
            class=" bg-gray-100 font-semibold uppercase text-2xl md:text-5xl inline-block w-fit relative text-secondary py-2 px-5 rounded-full mb-20 font-Boldonse">
            ekstrakurikuler</h2>
            <div class="w-full flex flex-col items-center px-5 md:px-32">
                <div class="w-full md:w-1/2 mb-10 text-left md:text-center">
                    Program ekstrakurikuler di SMP Quran Al-Muanawiyah diantaranya yaitu pramuka sebagai ekstrakurikuler wajib, dan ekstrakurikuler pilihan yaitu klub matematika, klub sains, social studies, multimedia, desain grafis, banjari, klub seni dan kaligrafi. Hal ini bertujuan untuk mewadahi minat dan bakat para peserta didik yang juga beragam.
                </div>
                <div class="w-full md:w-7/12">
                    <img src="<?= base_url() ;?>public/assets/images/ekstra.webp" loading="lazy" >
                </div>
            </div>
    </div>
        
</section>


<!-- <div class="pencapaian-program-tahfidz p-5 md:p-10 mb-20 mx-auto">
    <div
        class="pencapaian-program-tahfidz-container mx-auto relative rounded-xl overflow-hidden md:max-w-4xl lg:max-w-6xl wow animate__animated animate__fadeInUp">
        <div
            class="w-full h-full absolute  top-0 left-0   bg-[url('../images/pencapaian-program-tahfidz.png')] bg-no-repeat bg-center bg-cover">
        </div>
        <div
            class="absolute w-full h-full top-0 left-0  bg-gradient-to-t md:bg-gradient-to-l from-black/90 to-secondary/80">
        </div>
        <div
            class="absolute w-full h-full top-0 left-0  bg-[url('../images/confetti.webp')] bg-repeat-y bg-top bg-cover">
        </div>

        <div
            class="w-full  flex flex-col md:flex-row   relative top-0 left-0 rounded-xl pb-5 wow animate__animated animate__fadeInUp">
            <div class="pencapaian-program-tahfidz-teks order-1 w-full md:w-4/6 text-white p-5 md:flex md:items-center">
                <h2 class="text-5xl sm:text-7xl lg:text-8xl  text-left ">
                    <span class="font-medium text-2xl md:text-5xl ">PENCAPAIAN</span>
                    <br>PROGRAM<br>TAHFIDZ
                </h2>

            </div>
            <div
                class="pencapaian-program-tahfidz-gambar order-2 w-full md:w-2/6 md:pr-5 flex justify-center items-center py-10 flex flex-col text-white wow animate__animated animate__fadeInUp">
                <div
                    class="img w-full aspect-square bg-[url('../images/fancy-frame.webp')] bg-no-repeat bg-center bg-contain flex justify-center items-center drop-shadow-xl">
                    <img src="<?= base_url(); ?>public/assets/images/mockup-pencapaian-tahfidz.jpg"
                        class="object-cover w-9.5/12 aspect-square bg-yellow-400">
                </div>
                <div
                    class="pencapaian-program-tahfidz-detail border border-white rounded-full w-fit px-5 my-5 hover:bg-white hover:text-secondary transition-all font-normal ">
                    <a href="<?= base_url(); ?>tahfidz">
                        Lihat Selengkapnya
                        <i class="fa-solid fa-arrow-right ml-5 opacity-75"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- <section
    class="galery px-1 mx-2 md:mx-10 md:px-10  bg-white/50 border-t-2 border-primary rounded-xl shadow-lg mb-20 pb-5"
    id="galeri">
    <div class="text-center capitalize z-10 relative text-black block w-full mx-auto wow animate__animated animate__fadeInUp"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <h2
            class=" bg-gray-100 font-semibold text-xl bg-secondary inline-block w-fit relative -top-6 text-white py-2 px-5 rounded-full">
            Galeri</h2>
    </div>
    <div class="galery-container md:p-5 rounded-xl w-full max-w-7xl mx-auto z-10 relative mb-5 wow animate__animated animate__fadeInUp grid-flow-dense"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <?php foreach ($galeries as $g): ?>

            <div class="<?php echo $g['dimension']; ?> rounded-md galery-element relative overflow-hidden w-full h-full wow animate__animated animate__fadeInUp"
                data-id="<?= $g['id']; ?>" data-hd="<?= $g['hd']; ?>" data-thumb="<?= $g['thumb']; ?>"
                data-caption="<?= $g['caption']; ?>" data-dimension="<?php echo $g['dimension']; ?>">
                <div class="menu h-fit absolute top-1/2 left-2 transition-all duration-300 opacity-0">
                    <button
                        class="block  delete w-8 h-8 bg-[url('../images/trash.png')] bg-center bg-no-repeat bg-cover rounded-lg"></button>
                </div>
                <img src="" class=" hd w-full h-full object-cover object-center hidden">
                <img src="" class=" thumb w-full h-full object-cover object-center hidden">
                <div class="overlay w-full h-full bg-black absolute top-0 left-0 flex justify-center items-center">
                    <img src="<?= base_url() ?>public/assets/images/loader.svg" class="w-5 h-5 rounded-lg" alt="">
                </div>
            </div>

        <?php endforeach; ?>

    </div>
    <div class="load-more galeri text-center w-fit mx-auto hover:cursor-pointer text-black relative z-10 bg-gray-100 py-2 px-4 font-quicksand-medium transition-all duration-200 hover:bg-black hover:text-white rounded-full mt-10 wow animate__animated animate__fadeInUp mb-10"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">Tampilkan
        lebih banyak ...</div>
</section> -->

<section id="tahfidz" class="tahfidz min-h-screen my-32  flex justify-evenly items-center flex-col">
    <div class="text-center z-10 relative text-black block w-full mx-auto wow animate__animated animate__fadeInUp"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <h2
            class=" bg-gray-100 font-semibold uppercase text-3xl md:text-5xl inline-block w-fit relative text-secondary py-2 px-5 rounded-full font-Boldonse leading-10">
            pencapaian program tahfidz</h2>
    </div>
    <div class="w-full grid grid-cols-2 md:grid-cols-5 gap-y-5 px-2 md:px-32 my-10">
        <div class="w-full flex justify-center items-center">
            <div class="w-44 rounded-3xl bg-gradient-to-t from-white/20 to-white/0 shadow-xl shadow-sky-700/15 flex flex-col select-none">
                <div class=" bg-white/80 border-b border-sky-700/10 rounded-3xl flex flex-col justify-evenly items-center mt-2 mx-2 py-2">
                    <img class="bg-secondary-300 rounded-full w-6/12 aspect-square object-cover object-center mb-3" src="<?= base_url();?>public/assets/images/mockup-pencapaian-tahfidz.jpeg">
                    <div class=" w-full capitalize text-center text-sm text-secondary px-3">nazila apriana zahira zulfa</div>
                </div>
                <div class=" w-full text-secondary text-xl font-semibold flex justify-center items-center py-3 opacity-75">
                    30 Juz
                </div>
            </div>
        </div>
        <div class="w-full flex justify-center items-center">
            <div class="w-44 rounded-3xl bg-gradient-to-t from-white/20 to-white/0 shadow-xl shadow-sky-700/15 flex flex-col select-none">
                <div class=" bg-white/80 border-b border-sky-700/10 rounded-3xl flex flex-col justify-evenly items-center mt-2 mx-2 py-2">
                    <img class="bg-secondary-300 rounded-full w-6/12 aspect-square object-cover object-center mb-3" src="<?= base_url();?>public/assets/images/mockup-pencapaian-tahfidz.jpeg">
                    <div class=" w-full capitalize text-center text-sm text-secondary px-3">nazila apriana zahira zulfa</div>
                </div>
                <div class=" w-full text-secondary text-xl font-semibold flex justify-center items-center py-3 opacity-75">
                    30 Juz
                </div>
            </div>
        </div>
        <div class="w-full flex justify-center items-center">
            <div class="w-44 rounded-3xl bg-gradient-to-t from-white/20 to-white/0 shadow-xl shadow-sky-700/15 flex flex-col select-none">
                <div class=" bg-white/80 border-b border-sky-700/10 rounded-3xl flex flex-col justify-evenly items-center mt-2 mx-2 py-2">
                    <img class="bg-secondary-300 rounded-full w-6/12 aspect-square object-cover object-center mb-3" src="<?= base_url();?>public/assets/images/mockup-pencapaian-tahfidz.jpeg">
                    <div class=" w-full capitalize text-center text-sm text-secondary px-3">nazila apriana zahira zulfa</div>
                </div>
                <div class=" w-full text-secondary text-xl font-semibold flex justify-center items-center py-3 opacity-75">
                    30 Juz
                </div>
            </div>
        </div>
        <div class="w-full flex justify-center items-center">
            <div class="w-44 rounded-3xl bg-gradient-to-t from-white/20 to-white/0 shadow-xl shadow-sky-700/15 flex flex-col select-none">
                <div class=" bg-white/80 border-b border-sky-700/10 rounded-3xl flex flex-col justify-evenly items-center mt-2 mx-2 py-2">
                    <img class="bg-secondary-300 rounded-full w-6/12 aspect-square object-cover object-center mb-3" src="<?= base_url();?>public/assets/images/mockup-pencapaian-tahfidz.jpeg">
                    <div class=" w-full capitalize text-center text-sm text-secondary px-3">nazila apriana zahira zulfa</div>
                </div>
                <div class=" w-full text-secondary text-xl font-semibold flex justify-center items-center py-3 opacity-75">
                    30 Juz
                </div>
            </div>
        </div>

        <div class="w-full h-full flex justify-center items-center">
            <div class="w-full h-full rounded-3xl shadow-xl shadow-sky-700/15 flex flex-col select-none">
                <div class="w-full h-full hover:cursor-pointer hover:scale-110 bg-white/80 text-secondary hover:font-bold opacity-75 rounded-3xl flex flex-col justify-evenly items-center py-3 transition-all duration-300 capitalize text-xs sm:text-sm md:text-base">
                    lihat selengkapnya
                </div>
            </div>
        </div>
    </div>
        
</section>

</div>
</section>
<script src="<?= base_url(); ?>public/assets/js/home.js" type="module"></script>