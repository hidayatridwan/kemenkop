// INITIALS
resize();

window.addEventListener("resize", () => {
  resize();
});

function resize() {
  const contentHeight = (window.innerHeight - 70) / 2;
  const container = document.getElementById("container");
  container.style.gridTemplateRows = `${contentHeight}px ${contentHeight}px 40px`;
}

// START OF NEWS
// get element for news
const title = document.getElementById("title");
const description = document.getElementById("description");
const qrcode = document.getElementById("qrcode");

// data news
let dataNews = [];

fetch(`${BASE_URL}tvwall/display/list_data_berita_json`)
  .then((response) => response.json())
  .then((result) => {
    dataNews = result;
    fetchNews(dataNews);
  })
  .catch((error) => console.log(error));

function fetchNews(result) {
  // initials
  title.innerText = result[0].title.substring(0, 100);
  description.innerText = result[0].description.substring(0, 500);
  qrcode.src = result[0].qrcode;
  textNews();
}
// automatic change news text
let indexNews = 0;
function textNews() {
  if (indexNews == dataNews.length) {
    indexNews = 0;
  }

  title.classList.remove("animate-news-title");
  void title.offsetWidth;
  title.innerHTML = dataNews[indexNews].title.substring(0, 100);
  title.classList.add("animate-news-title");

  description.classList.remove("animate-news-desc");
  void description.offsetWidth;
  description.innerHTML = dataNews[indexNews].description.substring(0, 500);
  description.classList.add("animate-news-desc");

  qrcode.classList.remove("animate-news-qrcode");
  void qrcode.offsetWidth;
  qrcode.src = `${BASE_URL}uploads/qrcode/${dataNews[indexNews].qrcode}`;
  qrcode.classList.add("animate-news-qrcode");

  setTimeout(textNews, 20000);
  indexNews++;
}
// END OF NEWS

// START OF SLIDER
// get element for slider
const slider = document.getElementById("slider");
const sliderText = document.createElement("p");
slider.appendChild(sliderText);

// data for slider
let dataSlide = [];

fetch(`${BASE_URL}tvwall/display/list_data_slide_json`)
  .then((response) => response.json())
  .then((result) => {
    dataSlide = result;
    fetchSlide(dataSlide);
  })
  .catch((error) => console.log(error));

function fetchSlide(result) {
  // initial first background
  slider.style.backgroundImage = `url(${BASE_URL}uploads/slide/${result[0].image})`;
  sliderText.innerHTML = result[0].title.substring(0, 200);
  imageSlide();
}

// automatic slide
let indexSlide = 0;
function imageSlide() {
  if (indexSlide == dataSlide.length) {
    indexSlide = 0;
  }
  slider.style.backgroundImage = `url(${BASE_URL}uploads/slide/${dataSlide[indexSlide].image})`;
  slider.style.backgroundRepeat = "no-repeat";
  slider.style.backgroundSize = "cover";
  slider.style.backgroundPosition = "center center";
  slider.style.transition = "3s";
  // add title
  sliderText.classList.remove("animate-news-qrcode");
  void sliderText.offsetWidth;
  sliderText.innerHTML = dataSlide[indexSlide].title.substring(0, 200);
  sliderText.classList.add("animate-news-qrcode");
  // change image with interval
  setTimeout(imageSlide, 10000);
  indexSlide++;
}
// END OF SLIDER

// START OF VIDEO
// get element for video
const videoSource = document.getElementById("videosource");
// data video
let dataVideo = [];

fetch(`${BASE_URL}tvwall/display/list_data_video_json`)
  .then((response) => response.json())
  .then((result) => {
    dataVideo = result;
    fetchVideo(dataVideo);
  })
  .catch((error) => console.log(error));

function fetchVideo(result) {
  result.forEach((value) => {
    const source = document.createElement("source");
    source.className = "active";
    source.src = `${BASE_URL}uploads/video/${value.video}`;
    source.type = value.type;
    videoSource.appendChild(source);
  });
}

videoSource.addEventListener("ended", function (e) {
  var activesource = document.querySelector("#videosource source.active");
  var nextsource =
    document.querySelector("#videosource source.active + source") ||
    document.querySelector("#videosource source:first-child");

  activesource.className = "";
  nextsource.className = "active";

  videoSource.src = nextsource.src;
  videoSource.play();
});
// END OF VIDEO

// FOOTER
// get element for running text
const runningText = document.getElementById("running-text");
// running text
let dataText = [];

fetch(`${BASE_URL}tvwall/display/list_data_text_json`)
  .then((response) => response.json())
  .then((result) => {
    dataText = result;
    fetchRunningText(dataText);
  })
  .catch((error) => console.log(error));

function fetchRunningText(result) {
  let text = "";
  result.forEach((value) => {
    text += value.text;
  });
  runningText.innerHTML = text;
}

// date time
const dateLabel = document.getElementById("date");
const timeLabel = document.getElementById("time");

function dateID() {
  const dateTime = new Date();
  const year = dateTime.getFullYear();
  let month = dateTime.getMonth();
  const date = dateTime.getDate();
  let day = dateTime.getDay();
  const hour = dateTime.getHours();
  const minute = dateTime.getMinutes();
  const second = dateTime.getSeconds();

  switch (day) {
    case 0:
      day = "Minggu";
      break;
    case 1:
      day = "Senin";
      break;
    case 2:
      day = "Selasa";
      break;
    case 3:
      day = "Rabu";
      break;
    case 4:
      day = "Kamis";
      break;
    case 5:
      day = "Jum'at";
      break;
    case 6:
      day = "Sabtu";
      break;
  }

  switch (month) {
    case 0:
      month = "Januari";
      break;
    case 1:
      month = "Februari";
      break;
    case 2:
      month = "Maret";
      break;
    case 3:
      month = "April";
      break;
    case 4:
      month = "Mei";
      break;
    case 5:
      month = "Juni";
      break;
    case 6:
      month = "Juli";
      break;
    case 7:
      month = "Agustus";
      break;
    case 8:
      month = "September";
      break;
    case 9:
      month = "Oktober";
      break;
    case 10:
      month = "November";
      break;
    case 11:
      month = "Desember";
      break;
  }
  dateLabel.innerHTML = day + ", " + date + " " + month + " " + year;
  timeLabel.innerHTML = hour + ":" + minute + ":" + second;
}

setInterval(() => {
  dateID();
}, 1000);

// reload if there update content
const ip_address = document.getElementById("ip_address");

let user = {
  name: "John",
  surname: "Smith",
};

setInterval(function () {
  reloadTvwall();
}, 10000);

async function reloadTvwall() {
  const responseGetIP = await fetch(
    `${BASE_URL}tvwall/display/get_reloadtvwall_json?ip_address=${ip_address.value}`
  );
  const getIP = await responseGetIP.json();

  if (getIP.status == 1) {
    let formData = new FormData();
    formData.append("ip_address", ip_address.value);

    const responseSaveIP = await fetch(
      `${BASE_URL}tvwall/display/save_reloadtvwall_json`,
      {
        method: "POST",
        body: formData,
      }
    );
    const saveIP = await responseSaveIP.json();

    if (saveIP.status == true) {
      location.reload();
    }
  }
}

// ============== IKLAN POPUP ================================

const section = document.querySelector("section");
const overlay = document.querySelector(".overlay");
const showBtn = document.querySelector(".show-modal");
const imgapp = document.querySelector("#imgapp");
const winHeight = window.innerHeight;
let durasi = 0;
let popup = "N";

function showAdds() {
  section.classList.add("active");
  setTimeout(() => {
    section.classList.remove("active");
  }, durasi);
}

fetch(`${BASE_URL}tvwall/profil/get`)
  .then((response) => response.json())
  .then((result) => {
    imgapp.src = `${BASE_URL}uploads/${result.gambar}`;
    imgapp.style.height = `${winHeight - 100}px`;
    durasi = parseInt(result.durasi);
    popup = result.popup;

    if (popup == "Y") {
      setTimeout(() => {
        showAdds();
      }, 5000);
    }

    if (popup == "Y") {
      setInterval(() => {
        showAdds();
      }, 360000);
    }
  })
  .catch((error) => console.log(error));
