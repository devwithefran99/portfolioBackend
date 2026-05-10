const startTime = Date.now();

  window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");

    const minDuration = 1500; 
    const elapsed = Date.now() - startTime;

    const delay = Math.max(minDuration - elapsed, 0);

    setTimeout(() => {
      preloader.style.transition = "0.5s ease";
      preloader.style.opacity = "0";

      setTimeout(() => {
        preloader.style.display = "none";
      }, 500);
    }, delay);
  });

// progress bar
document.querySelectorAll('.skill-card').forEach(card => {
  const percent = parseInt(card.dataset.percent);
  const fill = card.querySelector('.progress-fill');
  const number = card.querySelector('.progress-number');

  let count = 0;

  const run = setInterval(() => {
    if (count >= percent) {
      clearInterval(run);
    } else {
      count++;
      fill.style.width = count + '%';
      number.innerText = count + '%';
    }
  }, 20);
});

// counter part starts
const stats = [
  { iconClass:"ti ti-mood-smile anim-pulse",  label:"Happy Clients",       target:37,  suffix:"+",  duration:2200, isFloat:false },
  { iconClass:"ti ti-trophy anim-bounce",     label:"Years of Experience", target:3,   suffix:"+",  duration:1600, isFloat:false },
  { iconClass:"ti ti-briefcase anim-shake",   label:"Projects Completed",  target:73,  suffix:"+",  duration:2500, isFloat:false },
  { iconClass:"ti ti-star anim-spin",         label:"Overall Rating",      target:4.4,  suffix:"/5", duration:2000, isFloat:true  },
];

const grid = document.getElementById("statsGrid");

stats.forEach((s, i) => {
  const card = document.createElement("div");
  card.className = "stat-card";
  card.innerHTML = `
    <div class="stat-icon"><i class="${s.iconClass}" aria-hidden="true"></i></div>
    <div class="stat-number" id="num-${i}"><span class="val">${s.isFloat ? "0.0" : "0"}</span><span class="suffix">${s.suffix}</span></div>
    <div class="stat-label">${s.label}</div>
    <div class="stat-bar"><div class="stat-bar-fill" id="bar-${i}"></div></div>
  `;
  grid.appendChild(card);
});

function easeOut(t) { return 1 - Math.pow(1 - t, 3); }

function animateCounter(i, target, duration, isFloat) {
  const el = document.querySelector(`#num-${i} .val`);
  const bar = document.getElementById(`bar-${i}`);
  const start = performance.now();
  function step(now) {
    const elapsed = now - start;
    const progress = Math.min(elapsed / duration, 1);
    const eased = easeOut(progress);
    const current = eased * target;
    el.textContent = isFloat ? current.toFixed(1) : Math.floor(current).toLocaleString();
    if (bar) bar.style.width = (eased * (isFloat ? (target/5)*100 : 100)) + "%";
    if (progress < 1) {
      requestAnimationFrame(step);
    } else {
      el.textContent = isFloat ? target.toFixed(1) : target.toLocaleString();
      if (bar) bar.style.width = (isFloat ? (target/5)*100 : 100) + "%";
    }
  }
  requestAnimationFrame(step);
}

function startCounters() {
  stats.forEach((s, i) => animateCounter(i, s.target, s.duration, s.isFloat));
}

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      setTimeout(startCounters, 500);
      observer.disconnect();
    }
  });
}, { threshold: 0.3 });

observer.observe(grid);
// counter part ends
// heropart js
const texts = [
    "Graphic & UI Designer",
    "Creative Thinker",
    "Branding Specialist"
  ];

  let index = 0;        // current text
  let charIndex = 0;    // current character
  let isDeleting = false;

  const typedElement = document.querySelector(".typed");

  function typeEffect() {
    let currentText = texts[index];

    if (isDeleting) {
      charIndex--;
    } else {
      charIndex++;
    }

    typedElement.textContent = currentText.substring(0, charIndex);

    let speed = isDeleting ? 50 : 200;

    // যখন পুরো লেখা শেষ
    if (!isDeleting && charIndex === currentText.length) {
      speed = 2000; // pause
      isDeleting = true;
    } 
    // যখন পুরো delete শেষ
    else if (isDeleting && charIndex === 0) {
      isDeleting = false;
      index = (index + 1) % texts.length;
      speed = 500;
    }

    setTimeout(typeEffect, speed);
  }

  // start
  typeEffect();


// * my work slider
const filterBtns = document.querySelectorAll(".filter-btn");
const allItems = document.querySelectorAll(".work-item");
const toggleBtn = document.getElementById("toggleBtn");

let currentFilter = "mobile";
let expanded = false;

/* Initial filter */
applyFilter("mobile");

filterBtns.forEach(btn=>{
  btn.onclick = ()=>{
    filterBtns.forEach(b=>b.classList.remove("active"));
    btn.classList.add("active");

    currentFilter = btn.dataset.filter;
    expanded = false;
    toggleBtn.innerText = "Show More";

    applyFilter(currentFilter);
  }
});

function applyFilter(filter){
  allItems.forEach(item=>{
    item.classList.remove("show");
    item.style.display = "none";

    if(item.classList.contains(filter) && !item.classList.contains("extra")){
      item.style.display = "block";
    }
  });
}

/* Show More / Less */
toggleBtn.onclick = ()=>{
  const extras = document.querySelectorAll(`.work-item.${currentFilter}.extra`);
  expanded = !expanded;

  extras.forEach((item,i)=>{
    if(expanded){
      item.style.display="block";
      setTimeout(()=>item.classList.add("show"), i*80);
    }else{
      item.classList.remove("show");
      setTimeout(()=>item.style.display="none",300);
    }
  });

  toggleBtn.innerText = expanded ? "Show Less" : "Show More";
};

// work toggle start
document.querySelectorAll(".icon.love").forEach(btn=>{
  btn.addEventListener("click",(e)=>{
    e.stopPropagation(); // popup na khulte
    btn.classList.toggle("active");
  });
});
// work toggle ends
// * trusted part starts
$(document).ready(function(){
  let track = $('.client-track');

  setInterval(function(){
    let firstItem = track.children().first();
    firstItem.animate({marginLeft: "-220px"}, 800, function(){
      firstItem.appendTo(track).css("margin-left","0");
    });
  },5000);
});

// *my work slider ends

// image-models starts
const cards = document.querySelectorAll(".popup-trigger");
const modal = document.getElementById("imageModal");
const modalImg = document.getElementById("modalImg");
const closeBtn = document.querySelector(".close-btn");
const viewCount = document.getElementById("viewCount");

cards.forEach((card, index) => {
  card.addEventListener("click", () => {
    const popupImage = card.getAttribute("data-img");

    modal.classList.add("active");
    modalImg.src = popupImage;

    // fake view count (localStorage)
    let views = localStorage.getItem("views_" + index);
    views = views ? parseInt(views) + 1 : 1;
    localStorage.setItem("views_" + index, views);

    viewCount.innerText = views;
  });
});

// close
closeBtn.addEventListener("click", () => {
  modal.classList.remove("active");
});

// outside click
modal.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.classList.remove("active");
  }
});

// ESC
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") {
    modal.classList.remove("active");
  }
});
  // image-model ends
 
  $(document).ready(function () {
    let index = 0;
    const slides = $('.feedback-item');
    const dots = $('.dot');

    slides.hide().eq(0).show(); // first slide visible

    setInterval(function () {
      let current = slides.eq(index);

      // fade out + move right
      current.animate(
        {
          opacity: 0,
          marginRight: '40px'
        },
        600,
        function () {
          current.hide().css({
            opacity: 1,
            marginRight: '0'
          });

          dots.eq(index).removeClass('active');

          index = (index + 1) % slides.length;

          let next = slides.eq(index);

          // start from left
          next.css({
            display: 'block',
            opacity: 0,
            marginRight: '-60px'
          });

          // fade in + move to center
          next.animate(
            {
              opacity: 1,
              marginRight: '0'
            },
            600
          );

          dots.eq(index).addClass('active');
        }
      );
    }, 2000);
  });


 
  


   AOS.init();

   

