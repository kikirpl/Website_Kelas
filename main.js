import "./style.scss";

// SWIPERRR JS
var swiper = new Swiper(".slide-content", {
  effect: "coverflow",
  //   slidesPerView: "auto",
  slidesPerView: 3,
  //   spaceBetween: 25,
  spaceBetween: 40,
  loop: true,
  centeredSlides: true,
  grabCursor: true,
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 0.5,
    // modifier: 0,
    slideShadows: false,
  },
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      //   slidesPerView: "auto",
      slidesPerView: 2,
    },
    950: {
      slidesPerView: "auto",
    },
  },
});

document.addEventListener("DOMContentLoaded", function () {
  var toggleButton = document.getElementById("mobile-nav-toggle");
  var mobileContent = document.getElementById("mobile-content");
  var overlay = document.getElementById("overlay");

  toggleButton.addEventListener("click", function () {
    mobileContent.classList.toggle("show");
    overlay.classList.toggle("show");
    if (mobileContent.classList.contains("show")) {
      document.body.style.overflow = "hidden";
    } else {
      document.body.style.overflow = "";
    }
  });

  overlay.addEventListener("click", function () {
    mobileContent.classList.remove("show");
    overlay.classList.remove("show");
    document.body.style.overflow = "";
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const schedule = {
    Senin: [
      "Web (1,4)",
      "Web Perangkat (5,6)",
      "B. Inggris (7,8)",
      "PPKN (9,10)",
    ],
    Selasa: ["Basis data (1,4)", "BK (5)", "MTK (6,8)", "Sejarah (9,10)"],
    Rabu: [
      "Web Perangkat (1,3)",
      "B. Indonesia (4,5)",
      "Web Perangkat (6)",
      "Basis data (7,8)",
      "Web Perangkat (9,10)",
    ],
    Kamis: [
      "Web Perangkat (1,3)",
      "Basis data (4,6)",
      "Web (7,8)",
      "Agama / B. Arab (9,10)",
    ],
    Jumat: [
      "Basis data (1)",
      "B. Indonesia (2)",
      "PJOK (3,4)",
      "Agama / B. Arab (5,7)",
    ],
    Sabtu: ["LIBUR SAYANGGG"],
    Minggu: ["LIBUR SAYANGGG"],
  };

  const dayNames = [
    "Minggu",
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu",
  ];
  const today = new Date().getDay();
  const todayName = dayNames[today];

  document.getElementById("day").textContent = todayName;

  const scheduleList = document.getElementById("schedule__li");
  scheduleList.innerHTML = "";

  schedule[todayName].forEach((subject) => {
    const li = document.createElement("li");
    li.textContent = subject;
    scheduleList.appendChild(li);
  });
});

// MODALLLL
const modal = document.querySelector("#modal");
const loginModal = document.querySelector("#login-modal");
const loginLink = document.querySelector("#login-link");
const signupLink = document.querySelector("#signup-link");
const openModal = document.querySelector(".open-button");
const closeModal = document.querySelector(".close-button");

loginLink.addEventListener("click", () => {
  loginModal.showModal();
});

signupLink.addEventListener("click", () => {
  modal.showModal();
});

openModal.addEventListener("click", () => {
  modal.showModal();
});

closeModal.addEventListener("click", () => {
  modal.setAttribute("closing", "");

  modal.addEventListener(
    "animationend",
    () => {
      modal.removeAttribute("closing");
      modal.close();
    },
    { once: true }
  );
});

// document.addEventListener("DOMContentLoaded", function () {
//   const strSpan = document.getElementById("str-span");
//   const schedule = document.getElementById("schedule");
//   const absen = document.getElementById("absen");

//   function showStruktur() {
//     if (window.innerWidth <= 768) {
//       strSpan.style.display = "block";
//       schedule.style.display = "none";
//       absen.style.display = "none";
//     }
//   }

//   function showMore() {
//     if (window.innerWidth <= 768) {
//       strSpan.style.display = "none";
//       schedule.style.display = "block";
//       absen.style.display = "block";
//     }
//   }

//   // Function to update display based on viewport width
//   function updateDisplay() {
//     if (window.innerWidth <= 768) {
//       document.querySelector(".btn-mobile").style.display = "flex";
//       strSpan.classList.add("initial");
//     } else {
//       document.querySelector(".btn-mobile").style.display = "none";
//       strSpan.style.display = "block";
//       schedule.style.display = "none";
//       absen.style.display = "none";
//     }
//   }

//   // Initial call
//   updateDisplay();

//   // Update on resize
//   window.addEventListener("resize", updateDisplay);

//   // Expose functions to global scope
//   window.showStruktur = showStruktur;
//   window.showMore = showMore;
// });
