<div class="loader">
    <div class="loader-container w-fit h-fit relative">
        <iframe src="https://cdn.lottielab.com/l/D8jKNqtxs6trrU.html" width="400" height="250" frameborder="0"></iframe>

    </div>
</div>
<div class="pilketos-pop-up w-32 hover:cursor-pointer h-48 bg-[url('../images/pilketos-pop-up.png')] bg-contain bg-center bg-no-repeat rounded-full fixed bottom-5 right-5 z-80" onclick="window.location.href='pilketos';"></div>
<section class="hero  relative w-full bg-black">
    <div class="absolute w-full flex justify-center items-start pt-2  top-0 left-0 h-8 z-80 bg-gradient-to-b from-black/25 to-black/0">
        <div class="slider-indicator-container w-full flex   bg-gray-200/10 rounded-full">
            <div
                class="slider-indicator animate-pulse  h-1 bg-gradient-to-r from-white/0 to-white flex justify-end items-center rounded-full relative">
                <div class="absolute w-7 aspect-square -top-3 -right-3">
                    <img src="<?= base_url(); ?>public/assets/images/progres-star.svg" class="w-full h-full object-contain animate-pulse">
                </div>
            </div>
        </div>
    </div>


    <div
        class=" identity absolute top-0 left-0 bottom-0 right-0 z-20 text-white flex flex-col  lg:justify-center   overflow-hidden items-start">
        <img src="<?= base_url(); ?>public/assets/images/hero-img.webp" alt="siswi smp quran Almuanawiyah"
            class="absolute w-full bottom-0 object-contain md:w-6/12 right-0 z-50 hero-img">
        <div class="flex justify-center items-center mb-2  pt-5 mx-auto md:mx-0 logo p-5 md:pl-20">
            <img src="<?= base_url(); ?>public/assets/images/logo.png" class=" w-32 mr-10 md:w-40 logo" alt="">
            <img src="<?= base_url(); ?>public/assets/images/akreditasi.webp" class="w-16  h-16 object-contain md:h-20 md:w-20"
                alt="">
            <img src="<?= base_url(); ?>public/assets/images/logo-adiwiyata.png" class="w-16  h-16 object-contain md:h-20 md:w-20 bg-green-100 rounded-xl"
                alt="">

        </div>
        <div class="pl-5 md:pl-20">
            <h1 class="text-start text-3xl sm:text-4xl lg:text-7xl font-semibold relative z-50 drop-shadow-lg ">
                SMP
                Quran <br><span class="text-5xl sm:text-6xl lg:text-9xl lato-bold">Al-Muanawiyah</span></h1>
            <p class="text-xl">Terakreditasi A</p>


        </div>
    </div>

    <div class="mySlides fade relative first-slide">
        <picture data-desktop="1735200011-desktop.webp" data-mobile="1735200011-mobile.webp">
            <source media="(min-width:768px)">
            <!-- <source media="(min-width:768px)" srcset=""> -->
            <img src="" alt="" class="w-full md:h-screen md:object-cover" id="first-slide">
        </picture>
    </div>

    <?php foreach ($banners as $banner): ?>
        <div class="mySlides fade relative">
            <picture data-desktop="<?= $banner['desktop']; ?>" data-mobile="<?= $banner['mobile']; ?>">
                <source media="(min-width:768px)">
                <!-- <source media="(min-width:768px)" srcset=""> -->
                <img src="" alt="" class="w-full md:h-screen md:object-cover">
            </picture>
        </div>
    <?php endforeach; ?>
    <div class="navigasi absolute right-5 md:right-10 h-full top-0 flex justify-center  flex-col items-center z-60">
        <a
            class="prev block relative h-10 w-10 rounded-full border border-white   text-white text font-bold text-base select-none hover:bg-white hover:cursor-pointer hover:text-black flex justify-center items-center transition-all  ">❮</a>
        <a
            class="next -translate-y-2 block relative h-10 w-10 rounded-full border border-white  text-white text font-bold text-base select-none  hover:bg-white hover:cursor-pointer hover:text-black flex justify-center items-center transition-all ">❯</a>
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
<section class="my-5 px-2 md:px-5 flex flex-col md:flex-row w-full">
    <!-- <a href="<?= base_url(); ?>ppdb" class="w-full ">
        <div
            class="h-16 md:h-20 px-5  border bg-gray-500 text-white rounded-3xl flex justify-between items-center text-xl md:text-3xl  relative overflow-hidden">
            <i class="fa-solid fa-circle-info relative z-20  ">

            </i>
            <span class="font-bold ml-2 text-xs sm:text-lg md:text-2xl relative z-20 font-Poppins">
                INFORMASI PENERIMAAN PESERTA DIDIK BARU
            </span>
            <div
                class="bg absolute z-0 top-0 right-0 h-full w-full bg-[url('../images/bg-ppdb.jpg')] bg-bottom bg-no-repeat bg-cover ">
            </div>
            <div class="bg absolute z-0 top-0 right-0 h-full w-full bg-secondary opacity-90 ">
            </div>

        </div>

    </a> -->
    <!-- <div class="w-full md:w-1/2">
        <div class="h-24 px-5  border bg-gray-500 text-white rounded-3xl flex justify-between items-center text-xl  relative overflow-hidden">
            <i class="fa-solid fa-circle-info relative z-20"></i>
            <div class="relative z-20 flex flex-col text-right">
                <span class="text-base">Agenda Mendatang</span>
                <span class="font-bold ">
                    INFORMASI PENERIMAAN SANTRI BARU
                </span>

            </div>
            <div class="bg absolute z-0 top-0 right-0 h-full w-full bg-[url('../images/bg-ppdb.jpg')] bg-bottom bg-no-repeat bg-cover "></div>
            <div class="bg absolute z-0 top-0 right-0 h-full w-full bg-primary opacity-75 "></div>
        </div>

    </div> -->
</section>




<section class=" px-1 md:px-5   pb-5 " id="berita">
    <div class="featured p-1 flex flex-col md:flex-row gap-5 mb-5 items-stretch">
        <?php if ($recentNews != null): ?>
            <?php foreach ($recentNews as $key => $n): ?>
                <?php if ($key == 0): ?>
                    <div class="featured-main bg-white w-full  md:w-3/5 lg:w-8/12 shadow-custom rounded-xl overflow-hidden relative bg-center bg-cover hover:cursor-pointer flex items-end  flex flex-col md:flex-row" data-id="<?= $n['id'] ;?> " data-img="<?= $n['hd']; ?>">
                        <div class="image w-full md:w-7/12 md:h-full aspect-video md:aspect-auto  bg-no-repeat bg-center bg-cover"></div>
                        <div class="details w-full md:w-5/12 h-full ml-3 p-3 relative font-Poppins">
                            <h3 class="font-bold text-2xl mb-1"><?= $n['title'] ;?></h3>
                            <p class="mb-3 opacity-75"><?= $n['created_at'] ;?></p>
                            <p class="featured-main-excerpt">
                                <?php 
                                    echo str_replace('|', '', $n['isi']);

                                 ?>

                            </p>
                            <div class="relative mt-3 text-sm opacity-75 right-3 capitalize bottom-3 p-2 rounded-full bg-white">baca selengkapnya</div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="featured-nav w-full md:w-2/5 lg:w-4/12 bg-white min-h-72 p-2 rounded-3xl">
            <div class=" rounded-xl  w-full">
                <div class="w-full grid grid-cols-2 gap-1 mb-1">
                    <div class="featured-menu bg-secondary text-white relative rounded-full  p-2 text-center latest active font-bold  opacity-100 transition-all hover:cursor-pointer"
                        data-featured="latest">
                        <i class="fa-solid fa-clock"></i>
                        <span>
                            Terkini
                        </span>
                    </div>

                    <div class="featured-menu bg-secondary/30 relative rounded-full  p-2 text-center opacity-75 popular  transition-all hover:cursor-pointer"
                        data-featured="popular">
                        <i class="fa-solid fa-clock"></i>
                        <span>
                            Populer
                        </span>
                    </div>
                </div>
                <div class="featured-container mt-3 rounded-xl transition-all rounded-b-xl bg-white font-Montserrat uppercase text-xxs font-semibold latest-container"
                    data-featured="latest">
                    <?php if ($recentNews != null): ?>
                        <?php foreach ($recentNews as $key => $n): ?>
                            <a href="<?= base_url() ?>berita/baca/<?= $n['id']; ?>" class="flex gap-2  mb-1">
                                <img src="<?= base_url(); ?>public/assets/images/<?= $n['hd']; ?>" alt=""
                                    class="w-2/6 h-16 object-cover rounded-lg">
                                <p class="w-4/6">
                                    <?= $n['title']; ?>
                                </p>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="featured-container mt-3 rounded-xl transition-all rounded-b-xl bg-white font-Montserrat uppercase text-xxs font-semibold popular-container hidden"
                    data-featured="popular">
                    <?php if ($popularNews != null): ?>
                        <?php foreach ($popularNews as $key => $n): ?>
                            <a href="<?= base_url() ?>berita/baca/<?= $n['id']; ?>" class="flex gap-2 mb-1">
                                <img src="<?= base_url(); ?>public/assets/images/<?= $n['hd']; ?>" alt=""
                                    class="w-2/6 h-16 object-cover rounded-lg">
                                <p class="w-4/6">
                                    <?= $n['title']; ?>
                                </p>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="berita-outer-container flex flex-col md:flex-row gap-5" data-wow-duration=".5s" data-wow-delay=".25s"
        data-wow-offset="100">
        <div class="berita-container w-full p-1 md:w-3/5 lg:w-8/12 h-fit bg-white/50 rounded-2xl">
            <?php if ($recentNews != null): ?>
                <?php foreach ($recentNews as $key => $n): ?>
                    <?php if ($key == 0) {
                        continue;
                    }; ?>
                    <div class="berita-card hover:cursor-pointer w-full rounded-2xl overflow-hidden    flex mb-2"
                        data-id="<?= $n['id']; ?>" data-hd="<?= $n['hd']; ?>" data-thumb="<?= $n['thumb']; ?>">
                        <div class="image  w-3/12 aspect-video  relative  p-1">
                            <img class="gambar-berita w-full h-full object-cover hd rounded-xl"
                                src="<?= base_url(); ?>public/assets/images/<?= $n['hd']; ?>">




                        </div>
                        <div class="detail-berita p-2  w-9/12 ">


                            <h2
                                class="judul-berita font-Montserrat font-medium text-gray-800 capitalize text-xs sm:text-sm break-words">
                                <?= $n['title']; ?>
                            </h2>
                            <div class="detail-berita-head flex opacity-80 text-xxs md:text-xs mb-2">
                                <div class="tanggal  inline-block"><?= $n['created_at']; ?></div>
                                <div class="view  inline-block ml-2">
                                    <i class="fa-regular fa-eye"></i>
                                    <span><?= $n['view']; ?></span>
                                </div>
                            </div>
                            <p class="featured-recent-excerpt text-sm">
                                <?php 
                                    echo str_replace('|', '', $n['isi']);

                                 ?>

                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="load-more text-center w-fit mx-auto hover:cursor-pointer text-black relative z-10 bg-white py-2 px-4 font-quicksand-medium transition-all duration-200 hover:bg-black hover:text-white rounded-full mt-10 wow animate__animated animate__fadeInUp mb-10"
                data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
                <a href="<?= base_url(); ?>berita">Muat Lebih Banyak ...</a>
            </div>


        </div>

        <div class="ppdb md:w-2/5 lg:w-4/12 p-1">
            <a href="<?= base_url(); ?>ppdb">
                <img src="<?= base_url(); ?>public/assets/images/poster-ppdb.jpeg" alt=""
                    class="rounded-xl shadow-custom">
            </a>
        </div>

    </div>

</section>





<section class="sambutan  bg-secondary  px-5 lg:px-10 lg:px-40 py-20 lg:py-32 my-20 relative ">

    <div class="sambutan-container bg-no-repeat bg-left flex flex-col md:flex-row items-center lg:justify-around rounded-xl p-5 wow animate__animated animate__fadeInUp"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <div class="foto text-center md:flex-1  overflow-hidden my-5 ">
            <img src="<?= base_url() ?>public/assets/images/ks-2.webp" alt="kepala SMP Quran Al-Muanawiyah"
                class="w-9/12 sm:w-1/2 md:w-10/12 mx-auto object-cover rounded-xl">
            <!-- <img src="public/assets/images/headmaster.png" alt=""
                class="w-full max-w-48 aspect-square mx-auto  my-2">
            <p class="font-regular"><span class="text-xl font-semibold">A. Mu'ammar Sholahuddin, S. Pd</span><br>
                Pendiri Pesantren Al-Muanawiyah</p> -->
        </div>
        <div class="teks mb-5 md:w-3/5   text-white text-[.9rem] md:flex-2 font-semibold">
            <span class="mb-10  sub-title block text-center">Sambutan Kepala SMP Quran Al-Muanawiyah</span>
            <div class="teks-container overflow-y-scroll w-full max-h-72  pr-6 mt-10">
                <h2 class=" font-medium mb-1 opacity-80">Assalamu'alaikum Wr.Wb.</h2>
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
                <p class="font-regular mt-5"><span class="text-xl font-semibold">Lia Amirotus Zakiyah, S.Pd</span><br>
                    <span class="opacity-80">
                        Kepala SMPQ Al-Muanawiyah
                    </span>
                </p>
            </div>
        </div>
    </div>
</section>
<section class="program relative  px-5 md:px-20   my-20 mt-32 rounded-xl pb-10" id="program">
    <div class="text-center capitalize z-10 relative text-black block w-full mx-auto wow animate__animated animate__fadeInUp"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <h2
            class=" bg-gray-100 font-semibold text-xl bg-secondary inline-block w-fit relative -top-6 text-white py-2 px-5 rounded-full">
            Program Unggulan</h2>
    </div>
    <div class=" text-gray-800 font-semibold mb-10 my-10 max-w-3xl mx-auto">
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
                class="flex  mt-10 justify-center items-center w-fit mx-auto block aspect-square bg-secondary rounded-full p-2">
                <i class="fa-solid fa-angles-down text-primary text-xl"></i>
            </a>
        </div>
        <div
            class="program-item font-semibold flex flex-col bg-white text-secondary rounded-xl p-5 md:p-10 py-10 mb-10">
            <i class="fa-solid fa-book-quran text-7xl text-secondary inline-block w-full text-center "></i>
            <h3 class="text-xl md:text-2xl break-words xl:break-normal my-5 font-bold text-center">PROGRAM TAHFIDZ</h3>
            <p class="text-justify opacity-70">Diberikan Program Tahfidz (dalam Kurikulum Kepesantrenan) berupa
                Percepatan untuk menambah target hafalan. Dan Perbaikan untuk penyetaraan.</p>
            <a href="#intrakurikuler"
                class="flex mt-10 justify-center items-center w-fit mx-auto block aspect-square bg-secondary rounded-full p-2">
                <i class="fa-solid fa-angles-down text-primary text-xl"></i>
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
                class="flex mt-10 justify-center items-center w-fit mx-auto block aspect-square bg-secondary rounded-full p-2">
                <i class="fa-solid fa-angles-down text-primary text-xl"></i>
            </a>
        </div>
    </div>
</section>

<section class="intrakurikuler relative bg-secondary shadow-lg mb-20 p-5 py-20" id="intrakurikuler">
    <div class="text-center capitalize z-10 relative text-black block w-full mx-auto wow animate__animated animate__fadeInUp"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <h2
            class=" bg-gray-100 font-bold text-3xl font-Poppins bg-secondary inline-block w-fit  text-white py-2 px-5 rounded-full">
            INTRAKURIKULER</h2>
    </div>
    <div class="w-full my-10   relative overflow-hidden">
        <div class="w-full  flex flex-col md:flex-row  justify-evenly">
            <div class="left mb-10 md:mb-0  flex flex-col justify-center w-full md:w-6/12 ">
                <h3
                    class="text-3xl font-bold text-primary relative z-20 mb-5 wow animate__animated animate__fadeInLeft">
                    Kurikulum Nasional</h3>

                <p class=" text-white relative z-20 wow animate__animated animate__fadeInLeft">
                    <strong><span class="font-normal">Kurikulum nasional di SMP Quran Al-Muanawiyah adalah</span>
                        kurikulum
                        Merdeka</strong> yang mengacu pada Peraturan Menteri Pendidikan, Kebudayaan, Riset, dan
                    Teknologi
                    (Mendikbudristek) nomor 12 Tahun 2024. Serta <strong>mulok Jawa Timur (Bahasa Jawa)</strong> dan
                    <strong>Mulok Kab. Jombang (keagamaan dan Diniyah)</strong>
                </p>
            </div>
            <div
                class="w-full md:w-5/12 min-h-80 relative  wow animate__animated animate__fadeInRight bg-[url('../images/kurikulum-nasional.webp')] bg-center bg-no-repeat bg-cover z-10">

            </div>
        </div>
    </div>
    <div class="w-full my-10   relative overflow-hidden">
        <div class="w-full flex flex-col md:flex-row  justify-evenly">
            <div class="left mb-10 md:mb-0  flex flex-col justify-center w-full  md:w-6/12 ">
                <h3
                    class="text-3xl font-bold text-primary relative z-20 mb-5 wow animate__animated animate__fadeInLeft">
                    Kurikulum Kepesantrenan</h3>

                <p class=" text-white relative z-20 wow animate__animated animate__fadeInLeft">
                    <span class="font-normal">Kurikulum kepesantrenan terbagi menjadi <strong>Program Tahfidz</strong>
                        (percepatan dan perbaikan), serta <strong>Mulok Kepesantrenan</strong> yang terintegrasi dengan
                        PPTQ. Al-Muanawiyah <strong>(Bahasa Arab, Fasholatan, Nahwu, Shorof, Akhlaq, Fiqih, dll) dan
                            Qur’an
                            (Halaqoh, Muroja’ah, Ma’tsurat, dan Tilawah)</strong>.
                </p>
            </div>
            <div
                class="w-full  md:w-5/12 min-h-80 relative  bg-[url('../images/kurikulum-kepesantrenan.webp')] bg-center bg-no-repeat bg-cover z-10">

            </div>
        </div>
    </div>

</section>
<section class="kokurikuler relative  mx-2 md:mx-10 bg-white border-t-2 border-primary rounded-xl shadow-lg mb-20 pb-10"
    id="kokurikuler">
    <div class="text-center capitalize z-10 relative text-black block w-full mx-auto wow animate__animated animate__fadeInUp"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <h2
            class=" bg-gray-100 font-semibold text-xl bg-secondary inline-block w-fit relative -top-6 text-white py-2 px-5 rounded-full">
            KOKURIKULER</h2>
    </div>
    <div class="w-full mt-5 py-10  relative bg-white overflow-hidden">
        <h3
            class="px-5 md:px-10 text-3xl font-bold text-primary relative z-20 mb-5  wow animate__animated animate__fadeInLeft">
            P5 (Proyek Penguatan Profil Pelajar Pancasila)</h3>
        <p
            class="px-5 md:px-10 text-gray-600 relative z-20 md:w-8/12 font-normal  wow animate__animated animate__fadeInLeft">
            Kokurikuler adalah kegiatan yang menguatkan kegiatan intrakurikuler. SMP Quran Al-Muanawiyah melaksanakan P5
            (Proyek Penguatan Profil Pelajar Pancasila). Kegiatan P5 di SMP Quran Al-Muanawiyah sebagai ajang untuk
            menumbuhkan karakter pelajar pancasila, menumbuhkan jiwa kepemimpinan, melatih keterampilan, dan
            mengoptimalkan penguatan pendidikan karakter pada peserta didik.
        </p>
        <div
            class="w-full md:h-full relative md:absolute md:w-1/2  wow animate__animated animate__fadeInRight md:right-0 md:top-0 h-56 bg-[url('../images/p5-1.webp')] bg-bottom bg-no-repeat bg-cover z-10">
            <div
                class=" bg-gradient-to-b md:bg-gradient-to-r from-white to-white/0 w-full md:w-3/4 md:h-full h-3/4 absolute top-0 left-0">
            </div>
        </div>
    </div>
    <div class="w-full py-10 md:py-28 relative bg-white md:mt-5 overflow-hidden">
        <p
            class="px-5 md:px-10 text-gray-600 relative z-20 md:w-8/12 font-normal  wow animate__animated animate__fadeInLeft">
            Pada semester genap Tapel. 2023/2024 mengambil tema “Suara Demokrasi, Bhinneka Tunggal Ika, dan Kearifan
            Lokal”
            Pada semester ganjil Tapel. 2024/2025 yang sedang berlangsung P5 dengan tema “Rekayasa dan Berteknologi
            untuk NKRI” dengan membuat video profil sekolah.

        </p>
        <div
            class="w-full md:h-full relative md:absolute md:w-1/2  wow animate__animated animate__fadeInRight md:right-0 md:top-0 h-56 bg-[url('../images/p5-2.webp')] bg-bottom bg-no-repeat bg-cover z-10">
            <div
                class=" bg-gradient-to-b md:bg-gradient-to-r from-white to-white/0 w-full md:w-3/4 md:h-full h-3/4 absolute top-0 left-0">
            </div>
        </div>
    </div>
</section>

<section
    class="ekstra swiper-container  relative px-1 mx-2 md:mx-10 md:px-10  bg-white/50 border-t-2 border-primary rounded-xl shadow-lg mb-20 pb-5"
    id="ekstra">
    <div class="text-center capitalize z-10 relative text-black block w-full mx-auto wow animate__animated animate__fadeInUp"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <h2
            class=" bg-gray-100 font-semibold text-xl bg-secondary inline-block w-fit relative -top-6 text-white py-2 px-5 rounded-full">
            Ekstrakurikuler</h2>
    </div>
    <div class="swiper ekstraSwiper w-full h-80 max-w-[1000px] mx-auto wow animate__animated animate__fadeInUp mb-10"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <div class="swiper-wrapper">
            <div
                class="swiper-slide rounded-lg overflow-hidden text-center text-lg bg-white flex justify-center items-center max-w-80">
                <img src="<?= base_url(); ?>public/assets/images/pramuka.jpeg" class="block w-full h-full  object-cover"
                    alt="">
                <div
                    class="absolute bottom-0 h-20 bg-gradient-to-t from-black via-black/80 to-black/0 flex justify-start z-50 w-full pt-4">
                    <span
                        class=" block  text-center hover:bg-white hover:text-black text-white border px-2 border-white h-fit mx-auto bg-white/10 rounded-md cursor-pointer">
                        <a href="<?= base_url("program/#tahfidz"); ?>">Pramuka</a>
                    </span>
                </div>
            </div>
            <div
                class="swiper-slide rounded-lg overflow-hidden text-center text-lg bg-white flex justify-center items-center max-w-80">
                <img src="<?= base_url(); ?>public/assets/images/olimpiade-sains.jpeg"
                    class="block w-full h-full  object-cover" alt="">
                <div
                    class="absolute bottom-0 h-20 bg-gradient-to-t from-black via-black/80 to-black/0 flex justify-start z-50 w-full pt-4">
                    <span
                        class=" block  text-center hover:bg-white hover:text-black text-white border px-2 border-white h-fit mx-auto bg-white/10 rounded-md cursor-pointer">
                        <a href="<?= base_url("program/#tahfidz"); ?>">Olimpiade SAINS</a>
                    </span>
                </div>
            </div>
            <div
                class="swiper-slide rounded-lg overflow-hidden text-center text-lg bg-white flex justify-center items-center max-w-80">
                <img src="<?= base_url(); ?>public/assets/images/1.jpg" class="block w-full h-full  object-cover"
                    alt="">
                <div
                    class="absolute bottom-0 h-20 bg-gradient-to-t from-black via-black/80 to-black/0 flex justify-start z-50 w-full pt-4">
                    <span
                        class=" block  text-center hover:bg-white hover:text-black text-white border px-2 border-white h-fit mx-auto bg-white/10 rounded-md cursor-pointer">
                        <a href="<?= base_url("program/#tahfidz"); ?>">Olimpiade Math</a>
                    </span>
                </div>
            </div>

            <div
                class="swiper-slide rounded-lg overflow-hidden text-center text-lg bg-white flex justify-center items-center max-w-80">
                <img src="<?= base_url(); ?>public/assets/images/kaligrafi.jpeg"
                    class="block w-full h-full  object-cover" alt="">
                <div
                    class="absolute bottom-0 h-20 bg-gradient-to-t from-black via-black/80 to-black/0 flex justify-start z-50 w-full pt-4">
                    <span
                        class=" block  text-center hover:bg-white hover:text-black text-white border px-2 border-white h-fit mx-auto bg-white/10 rounded-md cursor-pointer">
                        <a href="<?= base_url("program/#tahfidz"); ?>">Kaligrafi</a>
                    </span>
                </div>
            </div>

            <div
                class="swiper-slide rounded-lg overflow-hidden text-center text-lg bg-white flex justify-center items-center max-w-80">
                <img src="<?= base_url(); ?>public/assets/images/seni-lukis.jpeg"
                    class="block w-full h-full  object-cover" alt="">
                <div
                    class="absolute bottom-0 h-20 bg-gradient-to-t from-black via-black/80 to-black/0 flex justify-start z-50 w-full pt-4">
                    <span
                        class=" block  text-center hover:bg-white hover:text-black text-white border px-2 border-white h-fit mx-auto bg-white/10 rounded-md cursor-pointer">
                        <a href="<?= base_url("program/#tahfidz"); ?>">Seni Lukis</a>
                    </span>
                </div>
            </div>
            <div
                class="swiper-slide rounded-lg overflow-hidden text-center text-lg bg-white flex justify-center items-center max-w-80">
                <img src="<?= base_url(); ?>public/assets/images/banjari.png" class="block w-full h-full  object-cover"
                    alt="">
                <div
                    class="absolute bottom-0 h-20 bg-gradient-to-t from-black via-black/80 to-black/0 flex justify-start z-50 w-full pt-4">
                    <span
                        class=" block  text-center hover:bg-white hover:text-black text-white border px-2 border-white h-fit mx-auto bg-white/10 rounded-md cursor-pointer">
                        <a href="<?= base_url("program/#tahfidz"); ?>">Banjari</a>
                    </span>
                </div>
            </div>

            <div
                class="swiper-slide rounded-lg overflow-hidden text-center text-lg bg-white flex justify-center items-center max-w-80">
                <img src="<?= base_url(); ?>public/assets/images/multimedia.jpeg"
                    class="block w-full h-full  object-cover" alt="">
                <div
                    class="absolute bottom-0 h-20 bg-gradient-to-t from-black via-black/80 to-black/0 flex justify-start z-50 w-full pt-4">
                    <span
                        class=" block  text-center hover:bg-white hover:text-black text-white border px-2 border-white h-fit mx-auto bg-white/10 rounded-md cursor-pointer">
                        <a href="<?= base_url("program/#tahfidz"); ?>">Multimedia</a>
                    </span>
                </div>
            </div>
            <div
                class="swiper-slide rounded-lg overflow-hidden text-center text-lg bg-white flex justify-center items-center max-w-80">
                <img src="<?= base_url(); ?>public/assets/images/desain-grafis.jpeg"
                    class="block w-full h-full  object-cover" alt="">
                <div
                    class="absolute bottom-0 h-20 bg-gradient-to-t from-black via-black/80 to-black/0 flex justify-start z-50 w-full pt-4">
                    <span
                        class=" block  text-center hover:bg-white hover:text-black text-white border px-2 border-white h-fit mx-auto bg-white/10 rounded-md cursor-pointer">
                        <a href="<?= base_url("program/#tahfidz"); ?>">Desain Grafis</a>
                    </span>
                </div>
            </div>






        </div>

        <div class="swiper-pagination"></div>
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

<section
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
</section>

<section
    class="youtube px-1 mx-2 md:mx-10 md:px-10  bg-white/50 border-t-2 border-primary rounded-xl shadow-lg mb-32 pb-5  bg-contain">
    <div class="text-center capitalize z-10 relative text-black block w-full mx-auto wow animate__animated animate__fadeInUp"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <h2
            class=" bg-gray-100 font-semibold bg-secondary inline-block w-fit relative -top-6 text-white py-2 px-5 rounded-full text-base">
            Youtube SMPQ Al-Muanawiyah</h2>
    </div>
    <div class="w-full youtube-container grid px-10 md:grid-cols-2 lg:grid-cols-3 gap-5 wow animate__animated animate__fadeInUp"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <iframe class="youtube w-full h-60 md:h-40 lg:h-48 rounded-lg overflow-hidden" src=""
            data-src="https://www.youtube.com/embed/1JrlRcx9I_w?si=Tc5KcPw6Yv2uO0g-" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe class="youtube w-full h-60 md:h-40 lg:h-48 rounded-lg overflow-hidden" src=""
            data-src="https://www.youtube.com/embed/Xc9q3ByeWZs?si=2NMrh7IYEGBmWlY7" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe class="youtube w-full h-60 md:h-40 lg:h-48 rounded-lg overflow-hidden" src=""
            data-src="https://www.youtube.com/embed/D8-R2iIf1UI?si=y_R42yHMe_1HgZkv" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="load-more text-center w-fit mx-auto hover:cursor-pointer text-white relative z-10 bg-black py-2 px-4 font-quicksand-medium transition-all duration-200 hover:bg-white hover:text-black rounded-full mt-5 wow animate__animated animate__fadeInUp mb-10"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <a href="https://www.youtube.com/@smpqalmuanawiyah" target="_blank">Selengkapnya</a>
    </div>
</section>

</div>
</section>
<script src="<?= base_url(); ?>public/assets/js/home.js" type="module"></script>