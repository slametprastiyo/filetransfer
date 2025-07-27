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
    <script src='https://cdn.plot.ly/plotly-3.0.1.min.js'></script>
</head>

<body class="">
    <div class="authenticated-user fixed bottom-3 left-3 p-5 pr-14 bg-blue-200 border border-secondary rounded-xl z-30 hidden">
        <!-- <div
                class="authenticatd-user-close w-8 h-8 rounded-full bg-white absolute z-20 top-1 right-1  flex justify-center items-center p-2 cursor-pointer shadow-sm border border-secondary colors-primary">
                <img src="<?= base_url() ;?>public/assets/images/logout.svg" class="w-full h-full object-contain" alt="">
            </div> -->
        <p class="text-secondary font-bold pointer-events-none">Nama DPT</p>
    </div>
    <section class="hero w-full h-screen bg-no-repeat bg-center bg-cover bg-[url('../images/pilketos-hero-bg.png')] ">
        <div class="bg-secondary w-full h-full opacity-80"></div>
        <div class="w-full flex justify-center absolute top-0 h-full overflow-hidden hero-container">

            <img src="<?= base_url(); ?>public/assets/images/cloud.svg"
                class="cloud-1 w-72 object-contain absolute top-6 opacity-75" alt="">
            <img src="<?= base_url(); ?>public/assets/images/cloud-2.svg"
                class="cloud-2 w-32 object-contain absolute top-32 opacity-25" alt="">
            <img src="<?= base_url(); ?>public/assets/images/pilketos-hero-title.svg"
                class=" w-96 md:w-[550px] object-contain absolute top-6" alt="">
            <img src="<?= base_url(); ?>public/assets/images/cloud-3.svg"
                class="cloud-3 w-96 object-contain absolute top-10" alt="">
            <img src="<?= base_url(); ?>public/assets/images/ellipse.png"
                class="w-full object-contain absolute -bottom-1" alt="">
            <img src="<?= base_url(); ?>public/assets/images/pilketos-hero-img.webp"
                class="w-full object-contain absolute bottom-0" alt="">
            <!-- <img src="<?= base_url(); ?>public/assets/images/plane.png" class="plane w-96 object-contain absolute"
                alt=""> -->

            <a href="#kandidat"
                class="h-10 rounded-full  flex items-center justify-center absolute bottom-10 p-5 cursor-pointer hover:scale-110 animation ease-in-out duration-300"
                onclick="()=>{}">
                <div
                    class="w-full h-full absolute rounded-full bg-white flex items-center justify-center absolute p-5 cursor-pointer animate-ping">
                </div>
                <div
                    class="w-full h-full absolute rounded-full bg-secondary flex items-center justify-center absolute p-5 cursor-pointer ">
                </div>
                <p class="text-white relative min-w-96 text-center ">Pilih Sekarang</p>
            </a>
            <div id="myDiv"
                class="bg-white/50 absolute -left-96 opacity-0 animation duration-200 top-3 rounded-xl overflow-hidden">
            </div>
        </div>

    </section>
    <section id="kandidat" class=" w-full h-screen bg-white relative ">
        <p class="judul uppercase text-blue-900 text-xl font-black my-28 text-center">calon ketua osis</p>
        <div class="kandidat w-full h-72 flex flex-col md:flex-row justify-evenly items-center  ">
            <img src="<?= base_url(); ?>public/assets/images/kandidat-1.png"
                class="w-full md:w-1/4 object-contain h-full hover:scale-105 animation ease-out duration-200 hover:cursor-pointer kandidat-1"
                alt="">
            <img src="<?= base_url(); ?>public/assets/images/kandidat-2.png"
                class="w-full md:w-1/4 object-contain h-full hover:scale-105 animation ease-out duration-200 hover:cursor-pointer kandidat-2"
                alt="">
            <img src="<?= base_url(); ?>public/assets/images/kandidat-3.png"
                class="w-full md:w-1/4 object-contain h-full hover:scale-105 animation ease-out duration-200 hover:cursor-pointer kandidat-3"
                alt="">
        </div>
        <div id="kandidat-1"
            class="detail-kandidat w-full h-screen absolute bg-white overflow-y-scroll top-0 flex items-center justify-center scale-0">
            <div class="detail-card relative bg-secondary rounded-3xl mx-auto max-w-3xl h-fit relative flex">
                <img src="<?= base_url(); ?>public/assets/images/detail-kandidat-corner.png"
                    class="w-36 h-fit bottom-0 right-0 absolute" alt="">
                <div class="w-28 h-11 rounded-full bottom-0 right-0 absolute bg-orange-500 text-white uppercase flex justify-center items-center cursor-pointer hover:scale-105 animation ease-out duration-150 font-bold vote-btn"
                    data-nis="111" data-name="Faaza">vote</div>
                <div class="left inline-block w-2/5 relative top-0 bottom-0 left-0">
                    <div
                        class="kandidat-return w-10 aspect-square rounded-full bg-white absolute z-20 top-2 left-2 p-2 cursor-pointer shadow-sm border border-secondary">
                        <img src="<?= base_url(); ?>public/assets/images/arrow-left-circle-primary.png"
                            class="w-full h-full object-contain" alt="">
                    </div>
                    <img src="<?= base_url(); ?>public/assets/images/detail-kandidat-1.png"
                        class="absolute bottom-0  w-full object-contain" alt="">
                </div>
                <div class="right inline-block w-3/5 h-full pr-5 pb-16 pt-10">
                    <div class="visi-misi relative">
                        <div class="nama absolute -top-6 left-0 bg-orange-500 p-2 rounded-full text-white z-10">
                            Faaza</div>

                        <div class="bg-white rounded-2xl px-5 py-3 pt-5 relative h-64">
                            <div class="visi-misi-container overflow-y-auto h-full">
                                <img src="<?= base_url(); ?>public/assets/images/kandidat-triangle.png"
                                    class="absolute w-12 aspect-square top-0 -left-8">
                                <p class="uppercase font-medium mb-2">visi misi</p>
                                <p>
                                    Menjadikan siswi yang bertanggung jawab, saling menyayangi, taat akan aturan
                                    sekolah,
                                    berakhlak, menjalin hubungan yang baik dengan guru.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kandidat-2"
            class="detail-kandidat w-full h-screen absolute bg-white overflow-y-scroll top-0 flex items-center justify-center scale-0">
            <div class="detail-card relative bg-secondary rounded-3xl mx-auto max-w-3xl h-fit relative flex">
                <img src="<?= base_url(); ?>public/assets/images/detail-kandidat-corner.png"
                    class="w-36 h-fit bottom-0 right-0 absolute" alt="">
                <div class="w-28 h-11 rounded-full bottom-0 right-0 absolute bg-orange-500 text-white uppercase flex justify-center items-center cursor-pointer hover:scale-105 animation ease-out duration-150 font-bold vote-btn"
                    data-nis="222" data-name="Nazila">vote</div>
                <div class="left inline-block w-2/5 relative top-0 bottom-0 left-0">
                    <div
                        class="kandidat-return w-10 aspect-square rounded-full bg-white absolute z-20 top-2 left-2 p-2 cursor-pointer shadow-sm border border-secondary">
                        <img src="<?= base_url(); ?>public/assets/images/arrow-left-circle-primary.png"
                            class="w-full h-full object-contain" alt="">
                    </div>
                    <img src="<?= base_url(); ?>public/assets/images/detail-kandidat-2.png"
                        class="absolute bottom-0  w-full object-contain" alt="">
                </div>
                <div class="right inline-block w-3/5 h-full pr-5 pb-16 pt-10">
                    <div class="visi-misi relative">
                        <div class="nama absolute -top-6 left-0 bg-orange-500 p-2 rounded-full text-white z-10">
                            Nazila</div>

                        <div class="bg-white rounded-2xl px-5 py-3 pt-5 relative h-64">
                            <div class="visi-misi-container overflow-y-auto h-full">
                                <img src="<?= base_url(); ?>public/assets/images/kandidat-triangle.png"
                                    class="absolute w-12 aspect-square top-0 -left-8">
                                <p class="uppercase font-medium mb-2">visi misi</p>
                                <p>
                                    visi : mewujudkan SMPQ AL MUANAWIYAH yang aktif, kreatif, inovatif, dan profesional;
                                    menjadikan OSIS sebagai wadah yang menampung segala bakat, potensi, dan keahlian
                                    yang
                                    dimiliki siswa.
                                </p>
                                <p>
                                    misi: berpartisipasi aktif dalam ajang perlombaan akademik maupun non akademik di
                                    lingkungan sekolah dan masyarakat umum; meningkatkan kedisiplinan siswa-siswi
                                    melalui
                                    peraturan yang tegas dan tanggung jawab; menyelenggarakan suatu kegiatan
                                    ekstrakurikuler
                                    yang unik, kreatif, dan menarik bagi siswa-siswi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kandidat-3"
            class="detail-kandidat w-full h-screen absolute bg-white overflow-y-scroll top-0 flex items-center justify-center scale-0">
            <div class="detail-card relative bg-secondary rounded-3xl mx-auto max-w-3xl h-fit relative flex">
                <img src="<?= base_url(); ?>public/assets/images/detail-kandidat-corner.png"
                    class="w-36 h-fit bottom-0 right-0 absolute" alt="">
                <div class="w-28 h-11 rounded-full bottom-0 right-0 absolute bg-orange-500 text-white uppercase flex justify-center items-center cursor-pointer hover:scale-105 animation ease-out duration-150 font-bold vote-btn"
                    data-nis="333" data-name="Sania">vote</div>
                <div class="left inline-block w-2/5 relative top-0 bottom-0 left-0">
                    <div
                        class="kandidat-return w-10 aspect-square rounded-full bg-white absolute z-20 top-2 left-2 p-2 cursor-pointer shadow-sm border border-secondary">
                        <img src="<?= base_url(); ?>public/assets/images/arrow-left-circle-primary.png"
                            class="w-full h-full object-contain" alt="">
                    </div>
                    <img src="<?= base_url(); ?>public/assets/images/detail-kandidat-3.png"
                        class="absolute bottom-0  w-full object-contain" alt="">
                </div>
                <div class="right inline-block w-3/5 h-full pr-5 pb-16 pt-10">
                    <div class="visi-misi relative">
                        <div class="nama absolute -top-6 left-0 bg-orange-500  p-2 rounded-full text-white z-10">
                            Sania</div>

                        <div class="bg-white rounded-2xl px-5 py-3 pt-5 relative h-64">
                            <div class="visi-misi-container overflow-y-auto h-full">
                                <img src="<?= base_url(); ?>public/assets/images/kandidat-triangle.png"
                                    class="absolute w-12 aspect-square top-0 -left-8">
                                <p class="uppercase font-medium mb-2">visi misi</p>
                                <p>
                                    visi: Mewujudkan sekolah kreatif, berkualitas, dan berprestasi dengan menciptakan
                                    lingkungan yang mendukung perkembangan semua siswa melalui kegiatan inspiratif dan
                                    beragam
                                </p>
                                <p>
                                    misi : Meningkatkan kegiatan ekstrakurikuler. Menyediakan lebih banyak opsi kegiatan
                                    yang menarik dan bermanfaat untuk semua siswa; meningkatkan komunikasi. membuka
                                    saluran komunikasi yang lebih efektif antara siswa dan pihak sekolah; memperkuat
                                    kebersamaan. menciptakan berbagai acara yang memperat hubungan antar siswa dan
                                    membangun semangat tim.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section id="auth" class="w-full h-screen fixed top-0 left-0 bg-white flex justify-center items-center hidden z-20">
        <div
            class="auth-card h-fit aspect-square  bg-secondary  rounded-3xl p-5 flex flex-col items-center justify-center relative">
            <div
                class="auth-return w-8 aspect-square rounded-full bg-white absolute z-20 top-3 left-3 p-2 cursor-pointer shadow-sm border border-secondary">
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
    <script>
        // Add this script to the page that will be reloaded

        localStorage.setItem("totalVote", 0);

        const body = document.querySelector('body');
        const kandidats = document.querySelectorAll('.kandidat img');
        const detailKandidats = document.querySelectorAll('.detail-kandidat');
        const authSection = document.querySelector("#auth");
        const authSubmitBtn = authSection.querySelector("#auth-submit");
        const input = authSection.querySelector("#input_nis");
        const password = authSection.querySelector("#input_password");
        const authReturnBtn = authSection.querySelector('.auth-return');
        const authenticatedUser = document.querySelector('.authenticated-user');
        // const authenticatedUserClose = authenticatedUser.querySelector('.authenticatd-user-close');
        if(localStorage.getItem("dpt")){
            const dptName = localStorage.getItem("dptName");
            const authenticatedUserP = authenticatedUser.querySelector('p');
            authenticatedUserP.innerHTML = dptName;
            authenticatedUser.classList.remove("hidden");
        }

        authReturnBtn.addEventListener('click', () => {
            authSection.classList.add("hidden");
            input.value = "";
            password.value = "";
        });
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


                // -------------------------




                const returnBtn = detailKandidat.querySelector('.kandidat-return');
                returnBtn.addEventListener('click', () => {
                    detailKandidat.classList.add("scale-0");
                    body.style.overflow = "auto";
                });
            });
        });
        authSubmitBtn.addEventListener("click", () => {
            const input = authSection.querySelector("#input_nis");
            const password = authSection.querySelector("#input_password");

            if (input.value == "") {
                return;
            }
            // cek apakah nis benar
            // Use the fetch API
            fetch(`https://smpqalmuanawiyah.sch.id/pilketos/getDPT?nis=${input.value}&password=${password.value}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.text(); // Parse the response as JSON
                })
                .then(data => {
                    //nis dpt sesuai
                    const result = JSON.parse(data);
                    // console.log(result);return;

                    if (result.status == false) {
                        Swal.fire({
                            title: "Gagal masuk",
                            text: "NIS atau password salah",
                            icon: "warning"
                        })
                    } else {
                        if (result.is_vote == 0) {
                            Swal.fire({
                                title: result.dpt.nama,
                                text: result.dpt.kelas,
                                icon: "info",
                                timer: 2000,
                                showConfirmButton: false
                            })
                            localStorage.setItem("dpt", input.value);
                            localStorage.setItem("dptName", result.dpt.nama);
            const authenticatedUserP = authenticatedUser.querySelector('p');
            authenticatedUserP.innerHTML = result.dpt.nama;
            authenticatedUser.classList.remove("hidden");
                            authSection.classList.add("hidden");
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                text: "Anda sudah memilih",
                                icon: "error",
                                timer: 2000,
                                showConfirmButton: false
                            })
                            input.value = "";

                            password.value = "";

                            localStorage.removeItem("dpt");
                            authSection.classList.add("hidden");
                        }
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        })

        const voteBtns = document.querySelectorAll(".vote-btn");
        voteBtns.forEach((voteBtn) => {
            // console.log(voteBtn);
            // console.log(voteBtn.dataset.nis);
            // console.log(voteBtn.dataset.name);

            voteBtn.addEventListener("click", () => {
                const kandidatSelected = voteBtn.dataset.nis;
                const kandidatSelectedName = voteBtn.dataset.name;
                // ambil data temp dpt dari localstorage, untuk memastikan pemilih sudah login
                const dpt = localStorage.getItem("dpt");
                // console.log(dpt);
                if (dpt == null) {
                    //jika belum login

                    authSection.classList.remove("hidden");



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
                            fetch(`https://smpqalmuanawiyah.sch.id/pilketos/vote?dpt=${dpt}&kandidat=${kandidatSelected}`)
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error(`HTTP error! status: ${response.status}`);
                                    }
                                    return response.text(); // Parse the response as JSON
                                })
                                .then(data => {
                                    //nis dpt sesuai
                                    // console.log(data);return;
                                    const resp = JSON.parse(data);
                                    if (resp.status == "failed") {
                                        Swal.fire({
                                            title: "Gagal",
                                            text: "Coba Lagi",
                                            icon: "warning"
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                localStorage.removeItem("dpt");
                                                input.value = "";
                                                password.value = "";
                                            }
                                        })
                                    } else {
                                        if (resp.status == "voted") {
                                            Swal.fire({
                                                title: "Gagal",
                                                text: "Anda sudah memilih",
                                                icon: "warning"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    localStorage.removeItem("dpt");
                                                    input.value = "";
                                                    password.value = "";
                                                    detailKandidats.forEach((detail) => {
                                                        detail.classList.add("scale-0");
                                                    });
                                                    body.style.overflow = "auto";
                                                    window.scrollTo(0, 0);
                                                }
                                            })
                                        } else if (resp.status == 0) {
                                            Swal.fire({
                                                title: "Gagal",
                                                text: "Coba Lagi",
                                                icon: "warning"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    localStorage.removeItem("dpt");
                                                    input.value = "";
                                                    password.value = "";

                                                }
                                            })
                                        } else {
                                            localStorage.removeItem("dpt");
                                            input.value = "";
                                            password.value = "";


                                            Swal.fire({
                                                title: "Berhasil",
                                                text: "Anda telah memilih",
                                                icon: "success"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    detailKandidats.forEach((detail) => {
                                                        detail.classList.add("scale-0");
                                                    });
                                                    authenticatedUser.classList.add("hidden");
                                                    body.style.overflow = "auto";
                                                    window.scrollTo(0, 0);
                                                }
                                            })

                                        }

                                    }
                                })
                                .catch(error => {
                                    console.error('Error fetching data:', error);
                                });
                        }
                    })
                }


            })
        })

        const liveCount = setInterval(() => {
            const myDiv = document.getElementById('myDiv');

            setTimeout(() => {
                myDiv.classList.add("opacity-0");
                myDiv.classList.add("-left-96");
                myDiv.classList.remove("left-3");
                const chartDiv = document.getElementById('myDiv');
                if (chartDiv && chartDiv.data) { // Check if Plotly chart exists
                    Plotly.purge(chartDiv);
                }
            }, 6000);
            fetch(`https://smpqalmuanawiyah.sch.id/pilketos/getVoteCount`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.text(); // Parse the response as JSON
                })
                .then(data => {
                    const result = JSON.parse(data);
                    // console.log(result);
                    const totalVt = localStorage.getItem("totalVote");
                    if (result.total_vote > totalVt) {
                        let val = [];
                        val.push(result.total_vote);
                        val.push((result.total_dpt)-1);
                        let labl = [];
                        labl.push("Suara Masuk");
                        labl.push(" ");
                        // const value = val;
                        // const label = labl;
                        const chartContainer = document.getElementById('myDiv');
                        chartContainer.innerHTML = "";
                        let dt = [{
                            values: val,
                            labels: labl,
                            type: 'pie',
                            textinfo: 'percent',
                            marker: {
                                colors: ['#1e3a8a', '#d1d5db'] // Array of custom colors
                            }
                        }];

                        let layout = {
                            height: 400,
                            width: 500,
                            title: {
                                text: 'Persentase Suara Masuk',
                                font: {
                                    size: 24,
                                    color: '#1e3a8a'
                                },
                            },
                        };
const myD = document.getElementById('myDiv');
                        Plotly.newPlot('myDiv', dt, layout);
                        myD.classList.remove("opacity-0");
                        myD.classList.remove("-left-96");
                        myD.classList.add("left-3");
                        localStorage.setItem("totalVote", result.total_vote);

                    }


                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

        }, 7000);

    </script>
</body>

</html>