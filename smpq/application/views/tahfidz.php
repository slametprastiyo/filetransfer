<section class="w-full min-h-screen bg-gradient-to-r from-secondary to-black p-5 pb-52">
    <header
        class="flex flex-col justify-center items-center  p-5 pt-12 mb-10 relative">
        <div class="absolute top-0 left-0 w-full h-full z-0"></div>
        <h1 class="uppercase text-white font-bold text-5xl mb-5 relative z-10">pencapaian program tahfidz</h1>
        <p class="text-white font-light relative z-10 text-sm md:text-base max-w-5xl mx-auto">
            Selamat kepada para puteri kami atas capaian hafalan Qurannya. 
        </p>
        
    </header>
   
    <div class="achievement-container w-full mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
        <!-- <div
            class="achievement-card w-full aspect-square bg-[url('../images/fancy-frame.webp')] bg-no-repeat bg-center bg-contain flex justify-center items-center drop-shadow-xl">
            <img src="<?= base_url(); ?>public/assets/images/mockup-pencapaian-tahfidz.jpg"
                class="object-cover w-9.5/12 aspect-square ">
        </div> -->
        <?php foreach($results as $result) :?>
        <div class="achievement-card w-full aspect-square  flex justify-center items-center relative">
            <div class="frame absolute w-full aspect-square bg-[url('../images/fancy-frame-2.webp')] bg-no-repeat bg-center bg-contain"></div>
        
            <img src="<?= base_url(); ?>public/assets/images/<?= $result["hd"]; ?>"
                class="object-cover w-11/12 aspect-square">
        </div>
        <?php endforeach ;?>
    </div>
    <div class="pagination-container flex justify-center items-center mt-10">
        <?= $links; ?>
    </div>
    </section>
<script src="<?= base_url(); ?>public/assets/js/tahfidz-script.js" type="module"></script>