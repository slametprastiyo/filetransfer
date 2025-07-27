<section class="program swiper-container min-h-screen relative py-20 bg-gray-100" id="program">
    <div class="text-center capitalize z-10 relative  mb-20 block w-fit mx-auto p-5 bg-[url('../images/rect.png')] bg-no-repeat bg-contain bg-left wow animate__animated animate__fadeInUp"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <h2 class=" bg-gray-100 font-semibold text-xl">Program</h2>
    </div>
    <div class="swiper mySwiper w-full h-80 max-w-[1000px] mx-auto wow animate__animated animate__fadeInUp"
        data-wow-duration=".5s" data-wow-delay=".25s" data-wow-offset="100">
        <div class="swiper-wrapper">
            <div
                class="swiper-slide rounded-lg overflow-hidden text-center text-lg bg-white flex justify-center items-center max-w-80">
                <img src="<?= base_url(); ?>public/assets/images/1.jpg" class="block w-full h-full  object-cover"
                    alt="">
                <div
                    class="absolute bottom-0 h-20 bg-gradient-to-t from-black via-black/80 to-black/0 flex justify-start z-50 w-full pt-4">
                    <span
                        class=" block  text-center hover:bg-white hover:text-black text-white border px-2 border-white h-fit mx-auto bg-white/10 rounded-md cursor-pointer">
                        <a href="<?= base_url("program/#tahfidz"); ?>">Tahfidz Quran</a>
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
                        <a href="<?= base_url("program/#tahfidz"); ?>">Tahfidz Quran</a>
                    </span>
                </div>
            </div>



        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>