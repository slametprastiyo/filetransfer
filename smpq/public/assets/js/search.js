export function searchOpen(keyword) {
  const searchResultSection = document.querySelector("section.search-result");
  const searchResult = searchResultSection.querySelector(".result");
  const notFound = searchResultSection.querySelector(".search-not-found");
  const searchLoading = searchResultSection.querySelector(".search-loading");
  const resultBeritaContainer = searchResultSection.querySelector(
    ".result-berita-container",
  );
  const resultGaleriContainer = searchResultSection.querySelector(
    ".result-galeri-container",
  );
  const resultBerita = searchResultSection.querySelector(".result-berita");
  const resultGaleri = searchResultSection.querySelector(".result-galeri");

  searchResultSection.classList.remove("hidden");

  fetch("http://localhost/smpq/search/q/" + keyword)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok " + response.statusText);
      }
      return response.json();
    })
    .then((result) => {
      // console.log(notFound);

      // console.log(result);
      // console.log(result.berita == "" && result.galeri == "");

      if (result.galeri == "" && result.berita == "") {
        notFound.classList.remove("hidden");
        resultBeritaContainer.classList.add("hidden");
        resultGaleriContainer.classList.add("hidden");
      } else {
        notFound.classList.add("hidden");
        // resultBerita.innerHTML = JSON.stringify(result.berita);
        // resultGaleri.innerHTML = JSON.stringify(result.galeri);
        if (result.berita != "") {
          resultBerita.innerHTML = "";
          result.berita.forEach((el) => {
            const link = document.createElement("a");
            link.href = "http://localhost/smpq/berita/baca/" + el.id;
            link.classList.add("clearfix");
            link.classList.add("inline-block");
            const linkImg = document.createElement("img");
            linkImg.classList.add("w-10", "h-10", "object-cover", "mr-2");
            linkImg.src =
              "http://localhost/smpq/public/assets/images/" + el.thumb;
            linkImg.classList.add("float-left");
            link.appendChild(linkImg);
            const linkTitle = document.createElement("p");
            linkTitle.innerHTML = el.title;
            linkTitle.classList.add("w-full");
            link.appendChild(linkTitle);

            resultBerita.appendChild(link);
            const hr = document.createElement("hr");
            hr.classList.add("my-5");
            resultBerita.appendChild(hr);
            console.log(el);
          });
          resultBeritaContainer.classList.remove("hidden");
        } else {
          resultBeritaContainer.classList.add("hidden");
        }
        if (result.galeri != "") {
          resultGaleriContainer.classList.remove("hidden");
        } else {
          resultGaleriContainer.classList.add("hidden");
        }
      }
      const body = document.querySelector("body");
      if (!searchResultSection.classList.contains("hidden")) {
        body.classList.add("overflow-hidden");
      }
      searchLoading.classList.add("hidden");
    })
    .catch((error) => {
      console.error(
        "There has been a problem with your fetch operation:",
        error,
      );
    });
}

export function searchClose() {
  const searchResultSection = document.querySelector("section.search-result");
  const searchbar = document.querySelectorAll(".search-bar");

  searchbar.forEach((sb) => {
    const searchbarInput = sb.querySelector("input");
    searchbarInput.value = "";
  });

  searchResultSection.classList.add("hidden");
  const body = document.querySelector("body");
  body.classList.remove("overflow-hidden");
  body.classList.add("overflow-auto");
  const resultBeritaContainer = searchResultSection.querySelector(
    ".result-berita-container",
  );
  const resultGaleriContainer = searchResultSection.querySelector(
    ".result-galeri-container",
  );
  const resultBerita = searchResultSection.querySelector(".result-berita");
  const resultGaleri = searchResultSection.querySelector(".result-galeri");
  resultBerita.innerHTML = "";
  resultGaleri.innerHTML = "";
  resultBeritaContainer.classList.add("hidden");
  resultGaleriContainer.classList.add("hidden");
}
