// Add this script to the page that will be reloaded

localStorage.setItem("totalVote", 0);

const body = document.querySelector("body");
const kandidats = document.querySelectorAll(".kandidat img");
const detailKandidats = document.querySelectorAll(".detail-kandidat");
const authSection = document.querySelector("#auth");
const authSubmitBtn = authSection.querySelector("#auth-submit");
const input = authSection.querySelector("#input_nis");
const password = authSection.querySelector("#input_password");
const authReturnBtn = authSection.querySelector(".auth-return");
const authenticatedUser = document.querySelector(".authenticated-user");
const voteLoading = document.querySelector(".vote-loading");
// const authenticatedUserClose = authenticatedUser.querySelector('.authenticatd-user-close');
if (localStorage.getItem("dpt")) {
    const dptName = localStorage.getItem("dptName");
    const authenticatedUserP = authenticatedUser.querySelector("p");
    authenticatedUserP.innerHTML = dptName;
    authenticatedUser.classList.remove("hidden");
}

authReturnBtn.addEventListener("click", () => {
    authSection.classList.add("hidden");
    input.value = "";
    password.value = "";
});
kandidats.forEach((kandidat, index) => {
    kandidat.addEventListener("click", () => {
        // Use kandidat.dataset.nis to get the correct ID
        const detailKandidat = document.getElementById(
            `${kandidat.dataset.nis}`,
        );
        const voteBtn = detailKandidat.querySelector(".vote-btn");

        detailKandidats.forEach((detail) => {
            detail.classList.add("scale-0");
        });
        detailKandidat.classList.remove("scale-0");
        location.href = "#" + kandidat.dataset.nis;
        body.style.overflow = "hidden";

        const returnBtn = detailKandidat.querySelector(".kandidat-return");
        returnBtn.addEventListener("click", () => {
            detailKandidat.classList.add("scale-0");
            body.style.overflow = "auto";
        });
    });
});
authSubmitBtn.addEventListener("click", () => {
    voteLoading.classList.remove("hidden");
    const input = authSection.querySelector("#input_nis");
    const password = authSection.querySelector("#input_password");

    if (input.value == "") {
        return;
    }
    // cek apakah nis benar
    // Use the fetch API
    fetch(
        `http://localhost/smpq/pilketos/getDPT?nis=${input.value}&password=${password.value}`,
    )
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.text(); // Parse the response as JSON
        })
        .then((data) => {
            //nis dpt sesuai
            const result = JSON.parse(data);
            // console.log(result);return;

            if (result.status == false) {
                setTimeout(() => {
                    voteLoading.classList.add("hidden");
                    Swal.fire({
                        title: "Gagal masuk",
                        text: "NIS atau password salah",
                        icon: "warning",
                    });
                }, 2000);
            } else {
                if (result.is_vote == 0) {
                    setTimeout(() => {
                        voteLoading.classList.add("hidden");
                        Swal.fire({
                            title: result.dpt.nama,
                            text: result.dpt.kelas,
                            icon: "info",
                            timer: 2000,
                            showConfirmButton: false,
                        });
                        localStorage.setItem("dpt", input.value);
                        localStorage.setItem("dptName", result.dpt.nama);
                        const authenticatedUserP =
                            authenticatedUser.querySelector("p");
                        authenticatedUserP.innerHTML = result.dpt.nama;
                        authenticatedUser.classList.remove("hidden");
                        authSection.classList.add("hidden");
                    }, 2000);
                } else {
                    setTimeout(() => {
                        voteLoading.classList.add("hidden");
                        Swal.fire({
                            title: "Gagal",
                            text: "Anda sudah memilih",
                            icon: "error",
                            timer: 2000,
                            showConfirmButton: false,
                        });
                        input.value = "";

                        password.value = "";

                        localStorage.removeItem("dpt");
                        authSection.classList.add("hidden");
                    }, 2000);
                }
            }
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
        });
});

const voteBtns = document.querySelectorAll(".vote-btn");
voteBtns.forEach((voteBtn) => {
    // console.log(voteBtn);
    // console.log(voteBtn.dataset.nis);
    // console.log(voteBtn.dataset.name);

    voteBtn.addEventListener("click", () => {
        const kandidatSelected = voteBtn.dataset.nis;
        console.log(kandidatSelected);
        // return;

        const kandidatSelectedName = voteBtn.dataset.name;
        // ambil data temp dpt dari localstorage, untuk memastikan pemilih sudah login
        const dpt = localStorage.getItem("dpt");
        // console.log(dpt);
        if (dpt == null) {
            //jika belum login

            authSection.classList.remove("hidden");
        } else {
            Swal.fire({
                title: "Pilih",
                text: kandidatSelectedName,
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, pilih kandidat ini",
            }).then((result) => {
                if (result.isConfirmed) {
                    // tampilkan loading
                    voteLoading.classList.remove("hidden");
                    // tampilkan loading end
                    fetch(
                        `http://localhost/smpq/pilketos/vote?dpt=${dpt}&kandidat=${kandidatSelected}`,
                    )
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error(
                                    `HTTP error! status: ${response.status}`,
                                );
                            }
                            return response.text(); // Parse the response as JSON
                        })
                        .then((data) => {
                            //nis dpt sesuai
                            // console.log(data);return;
                            const resp = JSON.parse(data);
                            if (resp.status == "failed") {
                                setTimeout(() => {
                                    voteLoading.classList.add("hidden");
                                    Swal.fire({
                                        title: "Gagal",
                                        text: "Coba Lagi",
                                        icon: "warning",
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            localStorage.removeItem("dpt");
                                            input.value = "";
                                            password.value = "";
                                        }
                                    });
                                }, 2000);
                            } else {
                                if (resp.status == "voted") {
                                    setTimeout(() => {
                                        voteLoading.classList.add("hidden");
                                        Swal.fire({
                                            title: "Gagal",
                                            text: "Anda sudah memilih",
                                            icon: "warning",
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                localStorage.removeItem("dpt");
                                                input.value = "";
                                                password.value = "";
                                                detailKandidats.forEach(
                                                    (detail) => {
                                                        detail.classList.add(
                                                            "scale-0",
                                                        );
                                                    },
                                                );
                                                body.style.overflow = "auto";
                                                window.scrollTo(0, 0);
                                            }
                                        });
                                    }, 2000);
                                } else if (resp.status == 0) {
                                    setTimeout(() => {
                                        voteLoading.classList.add("hidden");
                                        Swal.fire({
                                            title: "Gagal",
                                            text: "Coba Lagi",
                                            icon: "warning",
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                localStorage.removeItem("dpt");
                                                input.value = "";
                                                password.value = "";
                                            }
                                        });
                                    }, 2000);
                                } else {
                                    setTimeout(() => {
                                        voteLoading.classList.add("hidden");
                                        localStorage.removeItem("dpt");
                                        input.value = "";
                                        password.value = "";

                                        Swal.fire({
                                            title: "Berhasil",
                                            text: "Anda telah memilih",
                                            icon: "success",
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                detailKandidats.forEach(
                                                    (detail) => {
                                                        detail.classList.add(
                                                            "scale-0",
                                                        );
                                                    },
                                                );
                                                authenticatedUser.classList.add(
                                                    "hidden",
                                                );
                                                body.style.overflow = "auto";
                                                window.scrollTo(0, 0);
                                            }
                                        });
                                    }, 2000);
                                }
                            }
                        })
                        .catch((error) => {
                            console.error("Error fetching data:", error);
                        });
                }
            });
        }
    });
});

const liveCount = setInterval(() => {
    const myDiv = document.getElementById("myDiv");

    setTimeout(() => {
        // myDiv.classList.remove("left-3");

        myDiv.classList.add("animation");
        myDiv.classList.add("opacity-0");
        myDiv.classList.remove("left-3");
        myDiv.classList.add("-left-96");
        setTimeout(() => {
            const chartDiv = document.getElementById("myDiv");
            if (chartDiv && chartDiv.data) {
                // Check if Plotly chart exists
                Plotly.purge(chartDiv);
            }
        }, 1000);
    }, 6000);
    fetch(`http://localhost/smpq/pilketos/getVoteCount`)
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.text(); // Parse the response as JSON
        })
        .then((data) => {
            const result = JSON.parse(data);
            // console.log(JSON.parse(data));
            const totalVt = localStorage.getItem("totalVote");

            // const percentage = 11;

            // console.log(percentage + "%");
            // console.log("newest total vote :" + result.total_vote);
            // console.log("local total vote :" + totalVt);

            if (result.total_vote > totalVt) {
                const percentage = Math.floor(
                    (result.total_vote / result.total_dpt) * 100,
                );
                showNotif(percentage);
                localStorage.setItem("totalVote", result.total_vote);
            }
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
        });
}, 8000);

// notif

const notif = document.querySelector(".notif");
// const button = document.querySelector("button");
// button.addEventListener("click",()=>{
//   showNotif();

// });

function showNotif(percentage) {
    const notifContent = notif.querySelector(".notif-content");
    // if(!notif.classList.contains("down")){
    notif.classList.add("down");
    setTimeout(() => {
        notif.classList.add("expand-flow");
    }, 200);
    setTimeout(() => {
        notif.classList.add("expand");
    }, 500);
    setTimeout(() => {
        notifContent.classList.remove("hidden");
        // Get a reference to the progress bar element
        const progressBar = document.getElementById("myProgressBar");

        // Function to update the conic gradient
        function updateProgressBarGradient(color1, stop1, color2, stop2) {
            progressBar.style.backgroundImage = `conic-gradient(${color1} ${stop1}%, ${color2} ${stop2}%)`;
        }

        // Examples of changing the stops dynamically:

        // Example 3: You can also use variables for the percentage stops
        let currentProgress = 0;
        const intervalId = setInterval(() => {
            currentProgress += 1;
            if (currentProgress > percentage) {
                clearInterval(intervalId);
                return;
            }
            // Animate progress from 0% to 100% using red and transparent
            updateProgressBarGradient(
                "#084476",
                currentProgress,
                "transparent",
                currentProgress,
            );

            progressBar.style.setProperty(
                "--before-content",
                `"` + currentProgress + `%"`,
            );
            // console.log(`Progress: ${currentProgress}%`);
        }, 10);
    }, 600);
    // }else{
    setTimeout(function () {
        notif.classList.remove("expand");
        notifContent.classList.add("hidden");

        notif.classList.remove("expand-flow");
        setTimeout(() => {
            notif.classList.remove("down");
        }, 200);
    }, 5000);

    // }
}

// notif end

// function timestampToReadable(timestamp) {
//   // Multiply by 1000 if the timestamp is in seconds (Unix timestamp)
//   // JavaScript Date object works with milliseconds
//   const date = new Date(timestamp * 1000);

//   const hours = date.getHours().toString().padStart(2, '0');
//   const minutes = date.getMinutes().toString().padStart(2, '0');
//   const seconds = date.getSeconds().toString().padStart(2, '0');
//   const milliseconds = date.getMilliseconds().toString().padStart(3, '0');

//   return `${hours}:${minutes}:${seconds}:${milliseconds}`;
// }

// const resultContainer = document.querySelector("section.result");
const showResultBtn = document.querySelector(".result button");
const countdownContainer = document.querySelector(".countdown");
const resultAuth = document.querySelector(".result-auth");
const resultAuthInput = resultAuth.querySelector("input");
const resultAuthBtn = resultAuth.querySelector("#auth-submit");
const resultAuthReturn = resultAuth.querySelector(".return");
const countdownH3 = document.querySelector(".countdown h3");
const countdown10 = document.querySelector(".countdown-10");
const countdown10Val = countdown10.querySelector("span");
const finalResult = document.querySelector(".final-result");
const countingAudio = document.querySelector("audio.counting");
const celebrationAudio = document.querySelector("audio.celebration");

let finalResultData = localStorage.getItem("finalResultData");
showResultBtn.addEventListener("click", () => {
    fetch(`http://localhost/smpq/pilketos/finalResult`)
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.text();
        })
        .then((dta) => {
            // console.log(localStorage.getItem("resultShown") == 1);
            // return;
            // if (localStorage.getItem("resultShown") == 1) {
            //     finalResult.classList.remove("hidden");
            //     finalResult.classList.remove("z-30");
            //     finalResult.classList.add("z-80");
            //     showFinalResult();
            //     displayData();
            // } else {
            localStorage.setItem("finalResultData", dta);
            resultAuth.classList.remove("hidden");
            body.classList.add("overflow-hidden");
            resultAuthReturn.addEventListener("click", () => {
                resultAuth.classList.add("hidden");
                body.classList.remove("overflow-hidden");
            });
            // }
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
        });

    // startCountdownWithMilliseconds(1);
    // countdownContainer.classList.remove("hidden");

    // console.log(finalResultData);ex
    // return;
});
resultAuthBtn.addEventListener("click", () => {
    // console.log("masuk");
    if (resultAuthInput.value == "os1s") {
        countdownContainer.classList.remove("hidden");
        resultAuth.classList.add("hidden");
        startCountdownWithMilliseconds(2);
        countdownContainer.classList.add("z-60");
    }
});
function startCountdownWithMilliseconds(duration) {
    let dur = duration;
    const countdownInterval = setInterval(function () {
        const aud = document.querySelector("audio.countdown-audio");

        countdown10Val.classList.remove("scale-125");
        countdown10Val.classList.add("scale-100");
        aud.src = "http://localhost/smpq/public/assets/sounds/beep.mp3";

        if (dur <= 11) {
            aud.play();
        }
        if (dur <= 10) {
            countdownContainer.classList.remove("z-60");
            countdown10.classList.add("z-60");
            countdown10.classList.remove("opacity-0");
            countdown10.classList.add("opacity-100");
            countdown10Val.innerHTML = dur;
        }
        if (dur <= 0) {
            clearInterval(countdownInterval);
            finalResult.classList.remove("hidden");
            finalResult.classList.remove("z-30");
            finalResult.classList.add("z-80");
            showFinalResult();
            displayData();
        }

        countdownH3.innerHTML = "";
        // countdownH3.innerHTML = `${formattedHours}:${formattedMinutes}:${formattedSeconds}`;
        countdownH3.innerHTML = `0:0:${dur}`;

        setTimeout(() => {
            countdown10Val.classList.remove("scale-100");
            countdown10Val.classList.add("scale-125");
            aud.pause(); // This will pause the audio
            aud.currentTime = 0;
            aud.src = "";
        }, 800);

        dur = dur - 1;
        // console.log(`${formattedMinutes}:${formattedSeconds}`);
    }, 1000); // Update every 1000 milliseconds (1 second) - although milliseconds are calculated
}
let ct = 3;

function showFinalResult() {
    // console.log("function showFinalResult");
    // return;
    JSON.parse(localStorage.getItem("finalResultData")).forEach((result) => {
        // console.log(finalResult);
        const finalResultCard = document.createElement("div");
        finalResultCard.classList.add(
            "final-result-card",
            "w-56",
            "h-64",
            "mx-10",
            "border",
            "border-gray-200",
            "rounded-3xl",
            "px-2",
            "flex",
            "animation",
            "duration-200",
            "ease-out",
        );
        finalResultCard.setAttribute("id", "final-" + result.nis);
        finalResultCard.dataset.id = "final-" + result.nis;
        // left
        finalResultCard.dataset.totalVote = result.totalVote;
        const left = document.createElement("div");
        left.classList.add(
            "left",
            "w-5/8",
            "h-full",
            "relative",
            "flex",
            "justify-center",
            "items-end",
            "mr-5",
        );
        const imgEl = document.createElement("img");
        imgEl.classList.add("w-full", "h-full", "object-cover");
        imgEl.src =
            "http://localhost/smpq/public/assets/images/" + result.gambar;
        const spanName = document.createElement("span");
        spanName.classList.add(
            "text-secondary",
            "font-bold",
            "capitalize",
            "w-full",
            "p-3",
            "bg-gradient-to-t",
            "from-white/25",
            "to-white/0",
            "absolute",
            "bottom-0",
            "text-center",
        );
        spanName.innerHTML = result.nama;
        left.appendChild(imgEl);
        left.appendChild(spanName);
        // left end

        // right
        const right = document.createElement("div");
        right.classList.add("right", "w-[20px]", "h-full", "relative");
        const percentageVisual = document.createElement("div");
        percentageVisual.classList.add(
            "percentage-visual",
            "bg-secondary",
            "w-full",
            "absolute",
            "bottom-0",
            "flex",
            "justify-center",
        );
        const percentageValue = document.createElement("span");
        percentageValue.classList.add(
            "percentage-value",
            "absolute",
            "-top-5",
            "right-0",
            "font-bold",
        );
        percentageVisual.appendChild(percentageValue);
        right.appendChild(percentageVisual);
        // right end
        finalResultCard.appendChild(left);
        finalResultCard.appendChild(right);
        finalResult.appendChild(finalResultCard);
    });
    animateData();
}
function animateData() {
    // start displaying percentage result
    const allFinalResultCard = document.querySelectorAll(".final-result-card");
    // console.log(allFinalResultCard);
    let totalVote = 0;
    allFinalResultCard.forEach((card) => {
        totalVote = totalVote + parseInt(card.dataset.totalVote);
    });
    // console.log(totalVote);
    // countingAudio.src =
    //     "http://localhost/smpq/public/assets/sounds/counting.mp3";
    countingAudio.play();
    // countingAudio.loop = true;

    allFinalResultCard.forEach((card) => {
        // console.log((0.25 - 0.005) * Math.random() + 0.005);
        // console.log(card);
        const percentageVisual = card.querySelector(".percentage-visual");
        const percentageValue = card.querySelector(".percentage-value");
        // console.log(Math.floor((card.dataset.totalVote / totalVote) * 100));
        // return;
        let currentPV = 0;
        const displayFinalResult = setInterval(() => {
            if (
                currentPV <
                Math.floor((card.dataset.totalVote / totalVote) * 100)
            ) {
                percentageVisual.style.height = currentPV + "%";
                percentageValue.innerHTML = "";
                percentageValue.innerHTML = currentPV.toFixed(2) + "%";
                // console.log(card.nama + " : " + currentPV + "px");
                currentPV = currentPV + 0.1;
                // currentPV = currentPV + 1;
                // countingAudio.play();
            } else {
                clearInterval(displayFinalResult);

                displayData();

                ct = ct - 1;
                if (ct < 1) {
                    countingAudio.pause();
                    countingAudio.currentTime = 0;
                    lastStep();
                }
            }
        }, 10);
    });

    // start displaying percentage result end
}

function displayData() {
    const allFinalResultCard = document.querySelectorAll(".final-result-card");
    let totalVote = 0;
    allFinalResultCard.forEach((card) => {
        totalVote = totalVote + parseInt(card.dataset.totalVote);
    });
    allFinalResultCard.forEach((card) => {
        const percentageVisual = card.querySelector(".percentage-visual");
        const percentageValue = card.querySelector(".percentage-value");
        // console.log(Math.floor((card.dataset.totalVote / totalVote) * 100));
        // return;

        percentageValue.innerHTML = "";
        percentageValue.innerHTML =
            ((card.dataset.totalVote / totalVote) * 100).toFixed(2) + "%";
    });
}

function lastStep() {
    const allFinalResultCard = document.querySelectorAll(".final-result-card");
    let highest = -Infinity;
    let cardHighest = [];
    allFinalResultCard.forEach((card) => {
        const tv = parseInt(card.dataset.totalVote);
        if (tv > highest) {
            highest = tv;
            cardHighest = [card.dataset.id];
        } else if (tv == highest) {
            highest = tv;
            cardHighest.push(card.dataset.id);
        }
    });
    // console.log(highest);
    // console.log(cardHighest.length);
    // return;
    if (cardHighest.length > 1) {
        body.classList.remove("overflow-hidden");
        return;
    } else {
        allFinalResultCard.forEach((card) => {
            card.classList.add("scale-85");
        });
        celebrationAudio.loop = false;
        celebrationAudio.play();
        const highestCard = document.getElementById(cardHighest[0]);
        highestCard.classList.remove("scale-85");
        highestCard.classList.remove("bg-white");
        const perVis = highestCard.querySelector(".percentage-visual");
        const perVal = highestCard.querySelector(".percentage-value");

        perVis.classList.remove("bg-secondary");
        perVis.classList.add("bg-white");
        perVal.classList.add("text-white");

        highestCard.classList.add("bg-secondary");
        highestCard.classList.add("scale-150");
        body.classList.remove("overflow-hidden");
    }
}
