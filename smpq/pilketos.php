<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilketos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/sweetalert2@11.js"></script>
</head>

<body class="">
    <section class="hero w-full h-screen bg-no-repeat bg-center bg-cover bg-[url('../images/pilketos-hero-bg.png')] ">
        <div class="bg-gradient-to-t from-blue-950 to-blue-700 w-full h-full opacity-75"></div>
        <div class="w-full flex justify-center absolute top-0 h-full overflow-hidden">

            <img src="<?= base_url(); ?>public/assets/images/cloud.svg"
                class="cloud-1 w-72 object-contain absolute top-6 opacity-75" alt="">
            <img src="<?= base_url(); ?>public/assets/images/cloud-2.svg"
                class="cloud-2 w-32 object-contain absolute top-32 opacity-25" alt="">
            <img src="<?= base_url(); ?>public/assets/images/pilketos-hero-title.svg"
                class="w-96 object-contain absolute top-6" alt="">
            <img src="<?= base_url(); ?>public/assets/images/cloud-3.svg"
                class="cloud-3 w-96 object-contain absolute top-10" alt="">
            <img src="<?= base_url(); ?>public/assets/images/ellipse.png"
                class="w-full object-contain absolute -bottom-1" alt="">
            <img src="<?= base_url(); ?>public/assets/images/hero-img.png"
                class="w-3/4 md:w-5/12 object-contain absolute bottom-0" alt="">
            <img src="<?= base_url(); ?>public/assets/images/plane.png" class="plane w-96 object-contain absolute"
                alt="">

            <div
                class="h-10 rounded-full  flex items-center justify-center absolute bottom-10 p-5 cursor-pointer hover:scale-110 animation ease-in-out duration-300">
                <div
                    class="w-full h-full absolute rounded-full bg-white flex items-center justify-center absolute p-5 cursor-pointer animate-ping">
                </div>
                <div
                    class="w-full h-full absolute rounded-full bg-blue-900 flex items-center justify-center absolute p-5 cursor-pointer ">
                </div>
                <a href="#kandidat" class="text-white relative ">Pilih Sekarang</a>
            </div>
        </div>

    </section>
    <section id="kandidat" class=" w-full h-screen bg-white relative ">
        <p class="judul uppercase text-blue-900 text-xl font-black my-28 text-center">calon ketua osis</p>
        <div class="kandidat w-full h-72 flex flex-col md:flex-row justify-evenly items-center  ">
            <img src="<?= base_url(); ?>public/assets/images/kandidat1.png"
                class="w-full md:w-1/4 object-contain h-full hover:scale-105 animation ease-out duration-200 hover:cursor-pointer kandidat-1" alt="">
            <img src="<?= base_url(); ?>public/assets/images/kandidat2.png"
                class="w-full md:w-1/4 object-contain h-full hover:scale-105 animation ease-out duration-200 hover:cursor-pointer kandidat-2" alt="">
            <img src="<?= base_url(); ?>public/assets/images/kandidat3.png"
                class="w-full md:w-1/4 object-contain h-full hover:scale-105 animation ease-out duration-200 hover:cursor-pointer kandidat-3" alt="">
        </div>
        <div id="kandidat-1" class="detail-kandidat w-full h-screen absolute bg-white overflow-y-scroll top-0 flex items-center justify-center scale-0">
            <div class="detail-card relative bg-blue-900 rounded-3xl mx-auto max-w-3xl h-fit relative flex py-10 pl-10">
                <img src="<?= base_url(); ?>public/assets/images/detail-kandidat-corner.png" class="w-36 h-fit bottom-0 right-0 absolute" alt="">
                <div class="w-28 h-11 rounded-full bottom-0 right-0 absolute bg-orange-500 text-white uppercase flex justify-center items-center cursor-pointer hover:scale-105 animation ease-out duration-150 font-bold vote-btn" data-nis="111" data-name="kandidat 1">vote</div>
                <div class="left inline-block w-2/5">
                    <img src="<?= base_url(); ?>public/assets/images/kandidat-return.svg" class="absolute kandidat-return w-12 aspect-square left-5 z-10 top-5 cursor-pointer">
                    <img src="<?= base_url(); ?>public/assets/images/detail-kandidat.png"
                        class="absolute bottom-0 left-5 w-1/2 md:w-auto md:h-full object-contain" alt="">
                </div>
                <div class="right inline-block w-3/5 h-full p-5 py-6">
                    <div class="visi-misi relative">
                        <div class="nama absolute -top-6 right-0 bg-orange-500 p-2 rounded-full text-white z-10">kandidat 1</div>

                        <div class="bg-gray-100 rounded-2xl px-5 py-3 relative">
                            <img src="<?= base_url(); ?>public/assets/images/kandidat-triangle.png" class="absolute w-12 aspect-square top-0 -left-8">
                            <p class="uppercase font-medium mb-2">visi misi</p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae saepe sint ipsum maiores? Ab deserunt veritatis error alias nam aut?
                            </p>
                            <p class="uppercase font-medium my-2">program kerja</p>
                            <div class="max-h-32 overflow-y-scroll text-sm ">
                                <ul class="mb-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, unde.
                                </ul>
                                <ul class="mb-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, unde.
                                </ul>
                                <ul class="mb-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, unde.
                                </ul>
                                <ul class="mb-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, unde.
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kandidat-2" class="detail-kandidat w-full h-screen absolute bg-white overflow-y-scroll top-0 flex items-center justify-center scale-0">
            <div class="detail-card relative bg-blue-900 rounded-3xl mx-auto max-w-3xl h-fit relative flex py-10 pl-10">
                <img src="<?= base_url(); ?>public/assets/images/detail-kandidat-corner.png" class="w-36 h-fit bottom-0 right-0 absolute" alt="">
                <div class="w-28 h-11 rounded-full bottom-0 right-0 absolute bg-orange-500 text-white uppercase flex justify-center items-center cursor-pointer hover:scale-105 animation ease-out duration-150 font-bold vote-btn" data-nis="222" data-name="kandidat 2">vote</div>
                <div class="left inline-block w-2/5">
                    <img src="<?= base_url(); ?>public/assets/images/kandidat-return.svg" class="absolute kandidat-return w-12 aspect-square left-5 z-10 top-5 cursor-pointer">
                    <img src="<?= base_url(); ?>public/assets/images/detail-kandidat.png"
                        class="absolute bottom-0 left-5 w-1/2 md:w-auto md:h-full object-contain" alt="">
                </div>
                <div class="right inline-block w-3/5 h-full p-5 py-6">
                    <div class="visi-misi relative">
                        <div class="nama absolute -top-6 right-0 bg-orange-500 p-2 rounded-full text-white z-10">kandidat 2</div>

                        <div class="bg-gray-100 rounded-2xl px-5 py-3 relative">
                            <img src="<?= base_url(); ?>public/assets/images/kandidat-triangle.png" class="absolute w-12 aspect-square top-0 -left-8">
                            <p class="uppercase font-medium mb-2">visi misi</p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae saepe sint ipsum maiores? Ab deserunt veritatis error alias nam aut?
                            </p>
                            <p class="uppercase font-medium my-2">program kerja</p>
                            <div class="max-h-32 overflow-y-scroll text-sm ">
                                <ul class="mb-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, unde.
                                </ul>
                                <ul class="mb-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, unde.
                                </ul>
                                <ul class="mb-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, unde.
                                </ul>
                                <ul class="mb-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, unde.
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kandidat-3" class="detail-kandidat w-full h-screen absolute bg-white overflow-y-scroll top-0 flex items-center justify-center scale-0">
            <div class="detail-card relative bg-blue-900 rounded-3xl mx-auto max-w-3xl h-fit relative flex py-10 pl-10">
                <img src="<?= base_url(); ?>public/assets/images/detail-kandidat-corner.png" class="w-36 h-fit bottom-0 right-0 absolute" alt="">
                <div class="w-28 h-11 rounded-full bottom-0 right-0 absolute bg-orange-500 text-white uppercase flex justify-center items-center cursor-pointer hover:scale-105 animation ease-out duration-150 font-bold vote-btn" data-nis="333" data-name="kandidat 3">vote</div>
                <div class="left inline-block w-2/5">
                    <img src="<?= base_url(); ?>public/assets/images/kandidat-return.svg" class="absolute kandidat-return w-12 aspect-square left-5 z-10 top-5 cursor-pointer">
                    <img src="<?= base_url(); ?>public/assets/images/detail-kandidat.png"
                        class="absolute bottom-0 left-5 w-1/2 md:w-auto md:h-full object-contain" alt="">
                </div>
                <div class="right inline-block w-3/5 h-full p-5 py-6">
                    <div class="visi-misi relative">
                        <div class="nama absolute -top-6 right-0 bg-orange-500 p-2 rounded-full text-white z-10">kandidat 3</div>

                        <div class="bg-gray-100 rounded-2xl px-5 py-3 relative">
                            <img src="<?= base_url(); ?>public/assets/images/kandidat-triangle.png" class="absolute w-12 aspect-square top-0 -left-8">
                            <p class="uppercase font-medium mb-2">visi misi</p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae saepe sint ipsum maiores? Ab deserunt veritatis error alias nam aut?
                            </p>
                            <p class="uppercase font-medium my-2">program kerja</p>
                            <div class="max-h-32 overflow-y-scroll text-sm ">
                                <ul class="mb-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, unde.
                                </ul>
                                <ul class="mb-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, unde.
                                </ul>
                                <ul class="mb-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, unde.
                                </ul>
                                <ul class="mb-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, unde.
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section id="auth" class="w-full h-screen fixed top-0 left-0 bg-white flex justify-center items-center hidden z-20">
        <div class="auth-card h-fit aspect-square  bg-blue-900 rounded-3xl p-5 flex flex-col items-center justify-center ">
            <div class="w-full text-center p-5 text-white">
                <p>Login dengan NIS</p>
            </div>
            <input type="text" name="nis" class="w-full p-2 rounded-full" placeholder="Masukkan NIS">
            <div id="auth-submit" class="bg-orange-400 mt-5 inline-block w-fit p-2 rounded-full hover:cursor-pointer">Masuk</div>
        </div>
    </section>
    <script>
        // Add this script to the page that will be reloaded



        const body = document.querySelector('body');
        const kandidats = document.querySelectorAll('.kandidat img');
        const detailKandidats = document.querySelectorAll('.detail-kandidat');
        const authSection = document.querySelector("#auth");
        const input = authSection.querySelector("input");
        kandidats.forEach((kandidat, index) => {
            kandidat.addEventListener('click', () => {
                const detailKandidat = document.querySelector(`#kandidat-${index + 1}`);
                const voteBtn = detailKandidat.querySelector(".vote-btn");

                detailKandidats.forEach((detail) => {
                    detail.classList.add("scale-0");
                });
                detailKandidat.classList.remove("scale-0");
                location.href = "#kandidat-" + (index + 1);
                body.style.overflow = "hidden";
                // console.log(detailKandidat);

                voteBtn.addEventListener("click", () => {
                    const kandidatSelected = voteBtn.dataset.nis;
                    const kandidatSelectedName = voteBtn.dataset.name;
                    // ambil data temp dpt dari localstorage, untuk memastikan pemilih sudah login
                    const dpt = localStorage.getItem("dpt");
                    // console.log(dpt);
                    if (dpt == null) {
                        //jika belum login
                        
                        authSection.classList.remove("hidden");
                        const authSubmitBtn = authSection.querySelector("#auth-submit");

                        authSubmitBtn.addEventListener("click", () => {
                            
                            if (input.value == "") {
                                return;
                            }
                            // cek apakah nis benar
                            // Use the fetch API
                            fetch(`http://localhost/smpq/pilketos/getDPT?nis=${input.value}`)
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error(`HTTP error! status: ${response.status}`);
                                    }
                                    return response.text(); // Parse the response as JSON
                                })
                                .then(data => {
                                    //nis dpt sesuai
                                    const result = JSON.parse(data);
                                    // console.log(result.dpt);return;
                                    
                                    if(result.status == false){
                                        Swal.fire({
                                                title: "Data DPT tidak ditemukan",
                                                text: "NIS salah",
                                                icon: "warning"
                                            })
                                    }else{
                                         Swal.fire({
                                                title: result.dpt.nama,
                                                text: result.dpt.kelas,
                                                icon: "info",
                                                timer: 2000,
                                                showConfirmButton: false
                                            })
                                        localStorage.setItem("dpt", input.value);
                                        authSection.classList.add("hidden");
                                    }
                                })
                                .catch(error => {
                                    console.error('Error fetching data:', error);
                                });
                        })

                    } else {
                        Swal.fire({
                            title: 'Pilih',
                            text: kandidatSelectedName,
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, pilih kandidat ini'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch(`http://localhost/smpq/pilketos/vote?dpt=${dpt}&kandidat=${kandidatSelected}`)
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error(`HTTP error! status: ${response.status}`);
                                        }
                                        return response.text(); // Parse the response as JSON
                                    })
                                    .then(data => {
                                        //nis dpt sesuai
                                        // console.log(data);
                                        if (data == false) {
                                            Swal.fire({
                                                title: "Gagal",
                                                text: "Coba Lagi",
                                                icon: "warning"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    localStorage.removeItem("dpt");
                                                    input.value = "";
                                                }
                                            })
                                        } else {
                                            localStorage.removeItem("dpt");
                                                    input.value = "";

                                            Swal.fire({
                                                title: "Berhasil",
                                                text: "Anda telah memilih",
                                                icon: "success"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    detailKandidats.forEach((detail) => {
                                                        detail.classList.add("scale-0");
                                                    });
                                                    body.style.overflow = "auto";
                                                    window.scrollTo(0, 0);
                                                }
                                            })
                                        }

                                        // localStorage.setItem("dpt", data);
                                        // authSection.classList.add("hidden");
                                    })
                                    .catch(error => {
                                        console.error('Error fetching data:', error);
                                    });
                            }
                        })
                    }


                })


                const returnBtn = detailKandidat.querySelector('.kandidat-return');
                returnBtn.addEventListener('click', () => {
                    detailKandidat.classList.add("scale-0");
                    body.style.overflow = "auto";
                });
            });
        });
    </script>
</body>

</html>