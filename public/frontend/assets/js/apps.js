

const scrollTopBtn = document.getElementById('scrollTopBtn');

scrollTopBtn.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

// ── Navbar: slide down after 20% scroll + active link ──
const navbar = document.querySelector('nav.navbar');
const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

// Section গুলো এবং তাদের id — তোমার সব section id এখানে আছে
const sectionIds = ['Home', 'skills', 'services', 'workPart', 'educationPart', 'about', 'contact'];

// ✅ একটা scroll listener এ সব রাখো
window.addEventListener('scroll', () => {
  const scrolled = window.scrollY;

  // navbar
  navbar.classList.toggle('nav-scrolled', scrolled > 80);

  // scroll to top button
  scrollTopBtn.classList.toggle('show', scrolled > 400);

  // active nav link
  let current = '';
  sectionIds.forEach(id => {
    const section = document.getElementById(id);
    if (section && scrolled >= section.offsetTop - 120) {
      current = id;
    }
  });
  navLinks.forEach(link => {
    link.classList.toggle('nav-active', link.getAttribute('href') === '#' + current);
  });
});
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

// ──── Work View & Like Tracking ────
const CSRF = document.querySelector('meta[name="csrf-token"]')?.content;

// 👁️ Eye click → view +1
document.querySelectorAll(".icon.view").forEach(btn => {
    btn.addEventListener("click", function (e) {
        // stopPropagation নেই — popup trigger হবে normally
        const workId = this.dataset.workId;
        if (workId) {
            fetch(`/work/${workId}/view`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': CSRF, 'Content-Type': 'application/json' }
            });
        }
    });
});

// ❤️ Heart click → like toggle (localStorage শুধু UI state এর জন্য)
document.querySelectorAll(".icon.love").forEach(btn => {
    const workId = btn.dataset.workId;

    // page load এ liked state দেখাও
    if (localStorage.getItem(`liked_${workId}`)) {
        btn.classList.add('active');
    }

    btn.addEventListener("click", function (e) {
        e.stopPropagation();
        const isLiked = localStorage.getItem(`liked_${workId}`);
        const action  = isLiked ? 'unlike' : 'like';

        fetch(`/work/${workId}/like`, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': CSRF, 'Content-Type': 'application/json' },
            body: JSON.stringify({ action })
        }).then(res => res.json()).then(() => {
            if (action === 'like') {
                localStorage.setItem(`liked_${workId}`, '1');
                btn.classList.add('active');
            } else {
                localStorage.removeItem(`liked_${workId}`);
                btn.classList.remove('active');
            }
        });
    });
});
// work toggle ends


// *my work slider ends

// Services accordion — 2nd item default open
const srvItems = document.querySelectorAll('.srv-item');

if (srvItems.length >= 2) {
  srvItems[1].classList.add('srv-active');
}

const isTouchDevice = () => window.matchMedia('(max-width: 768px)').matches;

srvItems.forEach(item => {
  // Desktop — hover
  item.addEventListener('mouseenter', () => {
    if (isTouchDevice()) return;
    srvItems.forEach(i => i.classList.remove('srv-active'));
    item.classList.add('srv-active');
  });

  item.addEventListener('mouseleave', () => {
    if (isTouchDevice()) return;
    srvItems.forEach(i => i.classList.remove('srv-active'));
    srvItems[1].classList.add('srv-active');
  });

  // Mobile — click/tap
  item.addEventListener('click', () => {
    if (!isTouchDevice()) return;
    const isAlreadyActive = item.classList.contains('srv-active');
    srvItems.forEach(i => i.classList.remove('srv-active'));
    if (!isAlreadyActive) {
      item.classList.add('srv-active');
    } else {
      srvItems[1].classList.add('srv-active'); // close করলে ২ নম্বর default
    }
  });
});


// ──── Popup (image modal) ────
const cards = document.querySelectorAll(".popup-trigger");
const modal = document.getElementById("imageModal");
const modalImg = document.getElementById("modalImg");
const closeBtn = document.querySelector(".close-btn");
const viewCount = document.getElementById("viewCount"); // null হলেও সমস্যা নেই

cards.forEach((card) => {
    card.addEventListener("click", () => {
        const popupImage = card.getAttribute("data-img");
        const workId = card.dataset.id; // ← DB থেকে view count নেবে

        modal.classList.add("active");
        modalImg.src = popupImage;

        // DB তে view track করো
        if (workId) {
            fetch(`/work/${workId}/view`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': CSRF, 'Content-Type': 'application/json' }
            });
        }

        // viewCount element থাকলে দেখাও, না থাকলে skip
        if (viewCount) viewCount.innerText = '';
    });
});

// close
closeBtn.addEventListener("click", () => {
    modal.classList.remove("active");
});

// outside click
modal.addEventListener("click", (e) => {
    if (e.target === modal) modal.classList.remove("active");
});

// ESC
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") modal.classList.remove("active");
});
 
 $(document).ready(function () {

  // Trusted By — smooth infinite scroll
(function () {
  const track = document.querySelector('.client-track');
  if (!track) return;

  // সব item clone করে দুইবার বানাও
  const items = Array.from(track.children);
  items.forEach(item => {
    track.appendChild(item.cloneNode(true));
  });
  items.forEach(item => {
    track.appendChild(item.cloneNode(true));
  });

  let position = 0;
  const speed = 0.5;

  function slide() {
    position -= speed;

    const firstItem = track.children[0];
    const itemWidth = firstItem.getBoundingClientRect().width + 16;

    if (Math.abs(position) >= itemWidth) {
      position += itemWidth;
      track.appendChild(firstItem);
    }

    track.style.transform = `translateX(${position}px)`;
    requestAnimationFrame(slide);
  }

  requestAnimationFrame(slide);
})();

  // feedback slider
  let index = 0;
  const slides = $('.feedback-item');
  const dots = $('.dot');
  slides.hide().eq(0).show();

  setInterval(function () {
    let current = slides.eq(index);
    current.animate({ opacity: 0, marginRight: '40px' }, 600, function () {
      current.hide().css({ opacity: 1, marginRight: '0' });
      dots.eq(index).removeClass('active');
      index = (index + 1) % slides.length;
      let next = slides.eq(index);
      next.css({ display: 'block', opacity: 0, marginRight: '-60px' });
      next.animate({ opacity: 1, marginRight: '0' }, 600);
      dots.eq(index).addClass('active');
    });
  }, 4000);

});

  // Contact form validation
const contactForm = document.getElementById('contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', function (e) {
    let valid = true;

    const name    = document.getElementById('contactName');
    const email   = document.getElementById('contactEmail');
    const message = document.getElementById('contactMessage');

    // Name check
    if (name.value.trim().length < 2) {
      document.getElementById('nameError').textContent = '⚠ নাম কমপক্ষে ২ অক্ষর হতে হবে';
      name.classList.add('input-error'); name.classList.remove('input-ok');
      valid = false;
    } else {
      document.getElementById('nameError').textContent = '';
      name.classList.remove('input-error'); name.classList.add('input-ok');
    }

    // Email check
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value.trim())) {
      document.getElementById('emailError').textContent = 'Please enter a valid email';
      email.classList.add('input-error'); email.classList.remove('input-ok');
      valid = false;
    } else {
      document.getElementById('emailError').textContent = '';
      email.classList.remove('input-error'); email.classList.add('input-ok');
    }

    // Message check
    if (message.value.trim().length < 10) {
      document.getElementById('messageError').textContent = 'Message must be at least 10 characters long.';
      message.classList.add('input-error'); message.classList.remove('input-ok');
      valid = false;
    } else {
      document.getElementById('messageError').textContent = '';
      message.classList.remove('input-error'); message.classList.add('input-ok');
    }

    if (!valid) e.preventDefault();
  });
}




   AOS.init();

   

