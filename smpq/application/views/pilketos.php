<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilketos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
        <link rel="preload" href="<?= base_url(); ?>public/assets/sounds/beep.mp3" as="audio">
        <link rel="preload" href="<?= base_url(); ?>public/assets/sounds/counting.mp3" as="audio">
        <link rel="preload" href="<?= base_url(); ?>public/assets/sounds/celebration.mp3" as="audio">


    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/output.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        @keyframes moveCloud {
            0% {
                right: -300px;
            }

            100% {
                right: 1500px;
            }
        }

        .cloud-1 {
            animation: moveCloud 90s linear infinite;
        }

        @keyframes moveCloud2 {
            0% {
                right: -200px;
            }

            100% {
                right: 1500px;
            }
        }

        .cloud-2 {
            animation: moveCloud2 120s linear infinite;
        }

        @keyframes moveCloud3 {
            0% {
                right: -500px;
            }

            100% {
                right: 1700px;
            }
        }

        .cloud-3 {
            animation: moveCloud3 60s linear infinite;
        }

        @keyframes plane {
            0% {
                right: -500px;
                transform: scale(1.25);
                top: 350px;
            }

            10% {
                top: 330px;
            }

            20% {
                top: 350px;
            }

            30% {
                top: 330px;
            }

            40% {
                top: 350px;
            }

            50% {
                top: 330px;
            }

            60% {
                top: 350px;
            }

            70% {
                top: 330px;
            }


            100% {
                right: 1700px;
                top: 350px;
                transform: scale(1.25);


            }
        }

        .plane {
            animation: plane 15s linear infinite;
        }

        .kandidat img {
            filter: drop-shadow(0 10px 0.5rem rgba(0, 0, 255, 0.25));
        }

        .show {
            transform: scale(1);
            transition: all 0.5s ease-in-out;
        }

        #hero-bg {
            filter: blur(5px);
        }

        .vote-loading {
            backdrop-filter: blur(15px);
        }
        .visi-misi-container::-webkit-scrollbar {
  width: 10px;
}

.visi-misi-container::-webkit-scrollbar-track {
  background: rgba(241, 159, 21,.25);
  border-radius: 6px;
  overflow: auto;
}

.visi-misi-container::-webkit-scrollbar-thumb {
  background:rgba(241, 159, 21,.75);
  border-radius: 6px;
}

.visi-misi-container::-webkit-scrollbar-thumb:hover {
  background:rgba(241, 159, 21,1);
}

.notif-container{
    position: fixed;
    display: flex;
    justify-content: center;
    top: 10px;
  z-index: 999;
  width: 100%;

}
.notif {
    position: absolute;
    top: -40px;
  width : 40px;
  height: 30px;
  background: black;
  border-radius: 15px;
  transition: all .2s ease;
}

.notif.down{
    top: 5px;
  transition: all .2s ease;
}
.notif.expand-flow{
   width: 425px;
  height: 120px;
  border-radius: 50px;
  transition: all 300ms ease;
}
.notif.expand{
   width: 400px;
  
  transition: all 200ms ease;
}
.progress-bar {
    position: relative;
            height: 80px;
            aspect-ratio: 1;
            border-radius: 100%;
            display: grid;
            place-items: center;
            background-image: conic-gradient(
                #084476 0%, black 0%
            );
        }
        .progress-bar::after{
            content: "";
            height: 60px;
            aspect-ratio: 1;
            border-radius: 100%;
            background: black;
        }
        .progress-bar::before{
            content: var(--before-content, "0%");
            width: 100%;
            aspect-ratio: 1;
            color: white;
            left: 0;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/sweetalert2@11.js"></script>
    <script src='https://cdn.plot.ly/plotly-3.0.1.min.js'></script>
</head>

<body class="">
   
<div class="notif-container">
    <div class="notif">
        <div class="notif-content flex justify-between items-center p-5 hidden">
            <p class="text-white text-center w-full">Total Suara Masuk</p>
            <div class="progress-bar" id="myProgressBar"></div>
        </div>
    </div>
</div>

    <div
        class="authenticated-user fixed bottom-3 left-3 p-5 bg-blue-100 border border-secondary rounded-xl z-30 hidden">
        <!-- <div
                class="authenticatd-user-close w-8 h-8 rounded-full bg-white absolute z-20 top-1 right-1  flex justify-center items-center p-2 cursor-pointer shadow-sm  colors-primary">
                <img src="<?= base_url(); ?>public/assets/images/logout.svg" class="w-full h-full object-contain" alt="">
            </div> -->
        <p class="text-secondary pointer-events-none">Nama DPT</p>
    </div>
    <section class="hero w-full h-screen relative overflow-hidden">
        <div id="hero-bg"
            class="absolute top-0 left-0 w-full h-full bg-no-repeat bg-center bg-cover bg-[url('../images/pilketos-hero-bg.png')] ">
        </div>
        <div class="bg-secondary w-full h-full opacity-80 absolute top-0 left-0"></div>
        <!-- <div class="w-full h-96 absolute border border-yellow-400 flex justify-center bottom-32">
            <img src="<?= base_url(); ?>public/assets/images/star.png"
                class="w-6/12 object-contain absolute top-0 blur-[10px] animate-[spin_20s_linear_infinite]" alt="">
        </div> -->
        
        <div class="w-full flex justify-center absolute top-0 h-full overflow-hidden hero-container">
            
            <img src="<?= base_url(); ?>public/assets/images/cloud.svg"
                class="cloud-1 w-72 object-contain absolute top-6 opacity-75" alt="">
            <img src="<?= base_url(); ?>public/assets/images/cloud-2.svg"
                class="cloud-2 w-32 object-contain absolute top-32 opacity-25" alt="">

            <img src="<?= base_url(); ?>public/assets/images/pilketos-hero-title.svg"
                class=" w-96 md:w-[550px] object-contain absolute top-2" alt="">
            <img src="<?= base_url(); ?>public/assets/images/cloud-3.svg"
                class="cloud-3 w-96 object-contain absolute top-10" alt="">
            <img src="<?= base_url(); ?>public/assets/images/ellipse.png"
                class="w-full object-contain absolute -bottom-1" alt="">
            <img src="<?= base_url(); ?>public/assets/images/pilketos-hero-img.webp"
                class="w-11/12 object-contain absolute bottom-0" alt="">
            <!-- <img src="<?= base_url(); ?>public/assets/images/plane.png" class="plane w-96 object-contain absolute"
                alt=""> -->

            <a href="#kandidat"
                class="h-10 rounded-full  flex items-center justify-center absolute bottom-10 p-5 cursor-pointer hover:scale-110 animation ease-in-out duration-300">
                <div
                    class="w-full h-full absolute rounded-full bg-yellow-200 flex items-center justify-center absolute p-5 cursor-pointer scale-y-125 scale-x-110 animate-pulse">
                </div>
                <div
                    class="w-full h-full absolute rounded-full bg-secondary flex items-center justify-center absolute p-5 cursor-pointer ">
                </div>
                <p class="text-white relative min-w-32 text-center ">Berikan Suara</p>
            </a>
            <div id="myDiv"
                class="bg-white/50 absolute -left-96 opacity-0 animation duration-200 top-3 rounded-xl overflow-hidden">
            </div>
        </div>
        
    </section>
    <section id="kandidat" class=" w-full h-screen bg-white relative border border-white ">
        <div class="vote-loading absolute w-full h-full z-80 flex justify-center items-center hidden">
            <div class="w-32  aspect-square rounded-xl flex justify-center items-center bg-secondary/75">
                <img src="<?= base_url(); ?>public/assets/images/loader.svg" class="w-24" alt="">
            </div>
        </div>
        <p class="judul uppercase text-blue-900 text-xl font-black my-24 text-center">calon ketua osis</p>
        <div class="kandidat w-full h-72 flex flex-col md:flex-row justify-evenly items-center  ">
            <img src="<?= base_url(); ?>public/assets/images/kandidat-1.webp"
                class="w-full md:w-1/4 object-contain h-full hover:scale-105 animation ease-out duration-200 hover:cursor-pointer kandidat-1"
                alt="" data-nis="23018">
            <img src="<?= base_url(); ?>public/assets/images/kandidat-2.webp"
                class="w-full md:w-1/4 object-contain h-full hover:scale-105 animation ease-out duration-200 hover:cursor-pointer kandidat-2"
                alt="" data-nis="23024">
            <img src="<?= base_url(); ?>public/assets/images/kandidat-3.webp"
                class="w-full md:w-1/4 object-contain h-full hover:scale-105 animation ease-out duration-200 hover:cursor-pointer kandidat-3"
                alt="" data-nis="23027">
        </div>
        <?php foreach($kandidat as $k):?>
        <div id="<?= $k['nis'];?>"
            class="detail-kandidat w-full h-screen absolute bg-white overflow-hidden top-0 flex items-center justify-center scale-0">
            <div class="detail-card relative select-none  rounded-3xl mx-auto max-w-3xl h-fit relative flex">
          <div class="w-32 aspect-square absolute -bottom-36 right-24 ">
              <iframe src="https://cdn.lottielab.com/l/DAAtLB8ZEb1AUy.html" frameborder="0" class="w-full h-full"></iframe>
          </div>
               
                <div class="w-28 h-11 rounded-full -bottom-16 right-0 absolute bg-secondary text-white uppercase flex justify-center items-center cursor-pointer hover:scale-105 animation ease-out duration-150 font-bold vote-btn  z-30"
                    data-nis="<?= $k['nis'];?>" data-name="<?= $k['nama'];?>">vote</div>
                <div class="left inline-block w-2/5 relative top-0 bottom-0 left-0 flex justify-center items-center  h-96 overflow-hidden">
                    <div class="absolute w-full h-full bottom-0 bg-gradient-to-b from-white to-blue-200 z-10 rounded-3xl">
                        <span class="text-7xl text-secondary font-bold absolute top-5 right-5"><?= $k['no_urut'];?></span>
                        

                    </div>
                    <div
                        class="kandidat-return w-10 aspect-square rounded-full bg-white absolute z-40 top-2 left-2 p-2 cursor-pointer shadow-sm ">
                        <img src="<?= base_url(); ?>public/assets/images/arrow-left-circle-primary.png"
                            class="w-full h-full object-contain z-30" alt="">
                    </div>
                    <img src="<?= base_url(); ?>public/assets/images/<?= $k['gambar'];?>"
                        class="w-full h-full object-contain absolute z-30" alt="">
                </div>
                <div class="right inline-block w-3/5 h-full pr-5 pl-3">
                    <div class="visi-misi relative">
                        <div class="nama font-bold text-xl absolute top-0 left-0 bg-orange-400 p-2 px-5 rounded-full text-white z-20">
                            <?= $k['nama'];?>
                            </div>
                        <div class="rounded-2xl pt-5 relative h-96">
                            <div class="visi-misi-container overflow-y-auto font-medium rounded-3xl h-full pr-5">
                                
                                    <div class="visi bg-blue-100 px-5 rounded-3xl py-3 pt-10 mb-2">
                                        <div class=" uppercase font-bold">visi</div>
                                        <p class="opacity-80"><?= $k['visi_misi']['visi'];?></p>
                                    </div>
                                    <div class="misi bg-yellow-100 px-5 rounded-3xl py-3">
                                        <div class=" uppercase font-bold">misi</div>
                                        <ul class="list-disc pl-5 opacity-80">
                                            <?php foreach($k['visi_misi']['misi'] as $misi): ?>
                                                <li><?= $misi; ?></li>
                                            <?php endforeach; ?>

                                        </ul>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    </section>
    <section id="auth" class="w-full h-screen fixed top-0 left-0 bg-white flex justify-center items-center hidden z-50">
        <div
            class="auth-card h-fit aspect-square  bg-secondary  rounded-3xl p-5 flex flex-col items-center justify-center relative">
            <div
                class="auth-return w-8 aspect-square rounded-full bg-white absolute z-20 top-3 left-3 p-2 cursor-pointer shadow-sm ">
                <img src="<?= base_url(); ?>public/assets/images/arrow-left-circle-primary.png"
                    class="w-full h-full object-contain" alt="">
            </div>
            <div class="w-full text-center p-5 text-white">
                <p>Login dengan NIS / Username</p>
            </div>
            <input type="text" id="input_nis" name="nis" class="w-full p-2 rounded-full mb-2"
                placeholder="NIS / Username">
            <input type="text" id="input_password" name="password" class="w-full p-2 rounded-full"
                placeholder="Kode akses">

            <div id="auth-submit" class="bg-orange-400 mt-5 inline-block w-fit p-2 rounded-full hover:cursor-pointer">
                Masuk</div>
        </div>
    </section>
    <section class="result min-h-screen flex justify-center items-center relative">
        <audio class="countdown-audio  hidden">
            <source src="" type="audio/mp3">
        </audio>
        <audio class="counting  hidden" loop>
            <source src="<?= base_url() ?>public/assets/sounds/counting.mp3" type="audio/mp3">
        </audio>
        <audio class="celebration  hidden" loop>
            <source src="<?= base_url() ?>public/assets/sounds/celebration.mp3" type="audio/mp3">
        </audio>
        <button class="bg-secondary rounded-3xl p-3 text-white absolute z-40">Lihat Hasil</button>
        <div class="countdown w-full h-full bg-white absolute top-0 left-0 flex justify-center items-center flex-col hidden">
            <p class="mb-5">Menampilkan hasil dalam ...</p>
            <h3 class="font-bold text-3xl">00:00:00</h3>
            <p>Jam : Menit : Detik</p>
        </div>
        <div class="countdown-10 w-full h-full bg-white absolute top-0 left-0 flex justify-center items-center bg-red-400 opacity-0 z-30">
            <span class="font-bold text-9xl text-secondary animation ease-out duration-200 scale-125">10</span>
        </div>
        <!-- <div class="countdown w-full h-full bg-red-400 absolute top-0 left-0"></div>         -->
        <div class="result-auth bg-white absolute left-0 top-0 w-full h-full hidden flex justify-center items-center z-50">

            <div class="w-40  bg-secondary p-5 rounded-3xl flex items-center flex-col relative">
                <div
                class="return w-8 aspect-square rounded-full bg-red-300 absolute z-20 -top-3 left-0 p-2 cursor-pointer shadow-sm ">
                    <img src="<?= base_url(); ?>public/assets/images/arrow-left-circle-primary.png"
                    class="w-full h-full object-contain" alt="">
                </div>
            <input type="text" name="result-code" class="w-full p-2 rounded-xl"
                placeholder="Kode akses">

            <div id="auth-submit" class="bg-orange-400 mt-5 inline-block w-fit p-2 rounded-full hover:cursor-pointer">
                Masuk</div>
            </div>
        </div>
        <div class="final-result z-30 bg-white absolute top-0 left-0 w-full h-full flex justify-center items-center hidden">
           <!--  <div class="final-result-card w-56 h-64 mx-10 border border-gray-200 rounded-3xl px-2 flex">

                <div class="left w-5/8 h-full relative flex justify-center items-end mr-5">
                    <img src="<?= base_url() ?>public/assets/images/detail-kandidat-1.webp" class="w-full h-full object-cover">
                    <span class="text-secondary font-bold capitalize w-full p-3 bg-gradient-to-t from-white/25 to-white/0 absolute bottom-0 text-center">Nama</span>
                </div>
                <div class="right w-[20px] h-full relative">
                    <div class="percentage-visual bg-secondary w-full h-1/2 absolute bottom-0 flex justify-center">
                        <span class="percentage-value absolute  -top-5 font-bold">0%</span>
                    </div>
                </div>

            </div> -->

        </div>
    </section>
<script src="<?= base_url() ?>public/assets/js/pilketos-script.js"></script>
</body>

</html>