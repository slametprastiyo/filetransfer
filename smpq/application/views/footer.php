<section class="footer w-full bg-secondary flex flex-col md:flex-row  py-20 relative" id="footer">
    <a href="<?= base_url() ?>/admin" class="absolute bottom-3 left-3 z-90">
        <img src="<?= base_url() ?>public/assets/images/icons/login.svg" class="w-8 aspect-square object-contain">
    </a>
    <div class="identitas flex-1  flex md:flex-col items-center p-5">
        <img src="<?= base_url(); ?>public/assets/images/logo-white.png" class="w-20 md:w-44 my-3" alt="">
        <p class="text-xs text-white font-thin my-3 md:text-sm">Dusun Sambisari RT/RW 02/02<br> Desa Ceweng Kecamatan
            Diwek<br>Kabupaten Jombang<br>Jawa Timur</p>
    </div>
    <div class="lokasi flex-1  p-5">
        <iframe class="w-full aspect-video rounded-lg"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d825.2218263825417!2d112.2374245!3d-7.5874664!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7841665d19b035%3A0x4f42068cd3f370fd!2sPesantren%20Tahfidz%20%26%20SMP%26SMA%20Qur&#39;an%20Al-Muanawiyah%20Jombang!5e1!3m2!1sen!2sid!4v1730008142864!5m2!1sen!2sid"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


    <div class="kontak flex-1">
        <div class="text-white opacity-60 p-5 justify-center items-center">
            <h3 class="font-bold text-xl">HUBUNGI KAMI</h3>
            <ul class="my-5 font-normal">
                <li class="mb-2 flex items-center">
                    <i class="w-5 fa-brands fa-whatsapp mr-2"></i>
                    <p>
                        <a href="https://web.whatsapp.com/send/?phone=085645754384" target="_blank">
                        085645754384 (Ustd. Amar)     
                        </a>
                    </p>
                </li>
                <li class="mb-2 flex items-center">
                    <i class="w-5 fa-brands fa-instagram mr-2"></i>
                    <p><a target="_blank" href="https://www.instagram.com/smpqalmuanawiyah/">@smpqalmuanawiyah</a></p>
                </li>
                <li class="mb-2 flex items-center">
                    <i class="w-5 fa-brands fa-youtube mr-2"></i>
                    <p><a target="_blank" href="https://www.youtube.com/@smpqalmuanawiyah">@smpqalmuanawiyah</a></p>
                </li>
            </ul>

        </div>
        <div class="text-white opacity-60 p-5 justify-center items-center">
            <h3 class="font-bold text-xl uppercase">pintasan</h3>
            <ul class="my-5 font-normal">
                <li class="mb-2 flex items-center">
                    <i class="fa-solid fa-globe mr-2"></i>
                    <p><a target="_blank" href="https://almuanawiyah.com">almuanawiyah.com</a></p>

                </li>
            </ul>

        </div>

    </div>
    <div class="copy pt-1 bg-secondary text-white  w-full w-full font-normal text-center text-xxs absolute bottom-20">
        &copy SMPQ Al-Muanawiyah 2025</div>
</section>
<script>
    localStorage.setItem("loaderCounter", 1);
    // setInterval(() => {
        let loaderContainer = document.querySelector(".loader-container");
        // console.log(loaderIframe);
        if(loaderContainer) {
            const cover = document.createElement("div");
            cover.classList.add("loader-cover");
            cover.classList.add("absolute");
            cover.classList.add("bottom-0");
            cover.classList.add("right-0");
            cover.classList.add("w-full");
            cover.classList.add("h-1/6");
            cover.classList.add("bg-white");
    
            loaderContainer.appendChild(cover);
        }
    // }, 1000);
    
</script>
<script src="<?= base_url(); ?>public/assets/js/script.js" type="module"></script>
</body>

</html>