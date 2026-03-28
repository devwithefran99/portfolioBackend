<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekram Hossen Portfolio</title>
    <!-- link part start here -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <!-- link part ends here -->
</head>
<body>
    <header>
        <!-- nav bar starts -->
         <section id="Home">
           <nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#offcanvasExample"><img src="{{asset ('frontend/assets/images/amar logo 2.png ')}}" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <a role="button" aria-controls="offcanvasExample" href="#offcanvasExample" data-bs-toggle="offcanvas"><i class="bi bi-list"></i></a>
    </button>
    <!-- side bar starts -->
     <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel"><img src="{{asset ('frontend/assets/images/amar logo 2.png ')}}" alt=""></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
 <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#Home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#skills">Skills</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#workPart">Works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#workPart">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#about">About me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#contact">Cantact</a>
        </li>
      </ul>
     <div class="cvBtn">
       <a href="{{asset ('frontend/assets/images/cvEkram.pdf') }}"
   download="Ekram-Hossen-CV">
   <i class="bi bi-cloud-download-fill"></i> Download CV
</a>
     </div>
</div>
<!-- sidebar ends here -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#Home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#skills">Skills</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#workPart">Works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#workPart">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#about">About me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#contact">Cantact</a>
        </li>
      </ul>
 <div class="cvBtn">
       <a href="{{asset ('frontend/assets/images/cvEkram.pdf') }}"
   download="Ekram-Hossen-CV">
   <i class="bi bi-cloud-download-fill"></i> Download CV
</a>
    </div>
  </div>
</nav>
         </section>
        <!-- nav bar ends -->
</header>

<main>
<!-- hero part starts -->
 <section class="hero py-5">
    <div class="container">
      <div class="row">
        <!-- Left image -->
        <div class="col-lg-4 col-12">
          <div class="hero-img">
            <img src="{{asset ('frontend/assets/images/Vector.png ')}}" alt="Profile" class="img-fluid">
          </div>
        </div>
        <!-- Middle text -->
        <div class="col-lg-7 col-12 my-auto justify-content-center heroText">
          <p class="intro-text mb-1">Hello I’M</p>
          <h1 class="fw-bold"> Ekram Hossen</h1>
          <h3 class="fw-semibold text-primary typed">A Graphic & UI UX Designer</h3>
          <p class="mt-3 mb-4">I’m Graphic & UI Designer skilled in digital branding,UI design, 
and marketing <br> visuals, focused on clear, creative, and effective 
design solutions.</p>
          <a href="#about" class="btn btn-outline-primary px-4 py-2">About me</a>
        </div>

        <!-- Right social sidebar -->
        <div class="col-lg-1 d-none d-lg-flex align-items-center justify-content-center">
       <div class="social-sidebar">
         <ul class="list-unstyled m-0 p-0">
           <li><a href="https://www.behance.net/Ekramhossenemon"><i class="bi bi-behance"></i></a></li>
           <li><a href="https://www.linkedin.com/in/ekram-husain-emon/"><i class="bi bi-linkedin"></i></a></li>
            <li><a href="https://wa.me/8801576521362"><i class="bi bi-whatsapp"></i></a></li>
           <li><a href="#"><i class="bi bi-telegram"></i></a></li>
           <li><a href="https://www.facebook.com/share/1N5oC8m5FM/"><i class="bi bi-facebook"></i></a></li>
         </ul>
         <p class="follow-text">Follow me:</p>
       </div>
</div>
      </div>
    </div>
  </section>
<!-- hero parts ends -->

<!-- skill parts starts here -->

<section id="skills" class="skills">
  <div class="container py-5">

    <div class="section-title-box text-center mb-5">
  <div class="title-3d">
    <h2 class="section-title">My Skills</h2>
  </div>

  <p class="section-subtitle mt-3">
    Practical skills I use in real-world projects
  </p>
</div>


    <div class="row g-4">

      <!-- Skill Card -->
      <div class="col-12 col-md-6 col-lg-3" data-aos="fade-right">
        <div class="skill-card" data-percent="90">
          <div class="skill-top">
            <img src="{{asset ('frontend/assets/images/Group 120.png ')}}" alt="">
            <h5>Adobe Photoshop</h5>
          </div>

          <div class="progress-wrap">
            <div class="progress-bar">
              <span class="progress-fill"></span>
            </div>
            <span class="progress-number">0%</span>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-3" data-aos="fade-right">
        <div class="skill-card" data-percent="70">
          <div class="skill-top">
            <img src="{{asset ('frontend/assets/images/Group 124.png') }}" alt="">
            <h5>Adobe XD</h5>
          </div>

          <div class="progress-wrap">
            <div class="progress-bar">
              <span class="progress-fill"></span>
            </div>
            <span class="progress-number">0%</span>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-3" data-aos="fade-right">
        <div class="skill-card" data-percent="90">
          <div class="skill-top">
            <img src="{{asset ('frontend/assets/images/Group.png ')}}" alt="">
            <h5>Adobe Illustrator</h5>
          </div>

          <div class="progress-wrap">
            <div class="progress-bar">
              <span class="progress-fill"></span>
            </div>
            <span class="progress-number">0%</span>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-3" data-aos="fade-right">
        <div class="skill-card" data-percent="85">
          <div class="skill-top">
            <img src="{{asset ('frontend/assets/images/Group 48.png ')}}" alt="">
            <h5>Figma</h5>
          </div>

          <div class="progress-wrap">
            <div class="progress-bar">
              <span class="progress-fill"></span>
            </div>
            <span class="progress-number">0%</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- skill parts ends  -->
<!-- Mywork part Starts -->
<section id="workPart">
  <div class="container py-5">

    <div class="section-title-box text-center mb-4">
      <div class="title-3d">
        <h2 class="section-title">My Work</h2>
      </div>

      <p class="section-subtitle mt-3">
        A quick overview of my Projects & Design
      </p>
    </div>

    <!-- Filter Buttons -->
    <div class="d-flex justify-content-center gap-2 mb-4">
      <button class="filter-btn active" data-filter="mobile">Social Media</button>
      <button class="filter-btn" data-filter="web">Web Design</button>
      <button class="filter-btn" data-filter="social">print item's</button>
    </div>

    <!-- Work Grid -->
    <div class="row g-4" id="workGrid">

      <!-- ===== MOBILE APP (6 + 6) ===== -->
     
<div class="col-lg-4 col-md-6 work-item mobile visible">
  <div class="work-card popup-trigger" 
       data-img="{{asset('frontend/assets/images/Social-media-fruit-project.jpeg')}}">

    <div class="w-100">
      <!-- Thumbnail image -->
      <img src="{{asset('frontend/assets/images/cover 1.jpeg')}}" 
           class="w-100" 
           alt="">
    </div>

    <div class="content">
      <span class="date">26 Dec 2025</span>
      <h6>Creative Fruit Poster Design</h6>
    </div>

  </div>
</div>
      <div class="col-lg-4 col-md-6 work-item mobile visible">
        <div class="work-card">
          <div class="w-100">
            <img src="{{asset ('frontend/assets/images/poster cvr 1.jpeg ')}}" alt="">
          </div>
          <div class="content">
            <span class="date">26 Dec 2025</span>
            <h6>Social Media Post Design</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 work-item mobile visible">
        <div class="work-card">
          <div class="w-100">
            <img src="{{asset ('frontend/assets/images/social media cvr 2.jpeg ')}}" alt="">
          </div>
          <div class="content">
            <span class="date">26 Dec 2025</span>
            <h6>Ad Design for Restaurant</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 work-item mobile visible">
        <div class="work-card">
          <div class="w-100">
            <img src="{{asset ('frontend/assets/images/perfume-behance-cover.jpeg ')}}" alt="">
          </div>
          <div class="content">
            <span class="date">26 Dec 2025</span>
            <h6>Perfume Creative Ads Design</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 work-item mobile visible">
        <div class="work-card">
          <div class="w-100">
            <img src="{{asset ('frontend/assets/images/social media 3.jpeg')}}" alt="">
          </div>
          <div class="content">
            <span class="date">26 Dec 2025</span>
            <h6>Creative Ads | Agency Branding</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 work-item mobile visible">
  <div class="work-card popup-trigger" 
       data-img="{{asset('frontend/assets/images/porchex-project.jpeg')}}">

    <div class="w-100">
      <!-- Thumbnail image -->
      <img src="{{asset('frontend/assets/images/project cover.png')}}" 
           class="w-100" 
           alt="">
    </div>

    <div class="content">
      <span class="date">26 Dec 2025</span>
      <h6>Real State Poster Design</h6>
    </div>

  </div>
</div>

      <!-- Extra Mobile -->
      <div class="col-lg-4 col-md-6 work-item mobile extra">
        <div class="work-card"><div class="img-placeholder"></div><div class="content"><h6>Travel App</h6></div></div>
      </div>
      <div class="col-lg-4 col-md-6 work-item mobile extra">
        <div class="work-card"><div class="img-placeholder"></div><div class="content"><h6>Chat App</h6></div></div>
      </div>
       <div class="col-lg-4 col-md-6 work-item mobile extra">
        <div class="work-card"><div class="img-placeholder"></div><div class="content"><h6>Gaming App</h6></div></div>
      </div>

      <!-- ===== WEB DESIGN ===== -->
      <div class="col-lg-4 col-md-6 work-item web visible">
        <div class="work-card">
          <div class="w-100">
            <img src="{{asset ('frontend/assets/images/mobile app1.jpeg')}}" alt="">
          </div>
          <div class="content">
            <span class="date">26 Dec 2025</span>
            <h6>Personal portfolio website design</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 work-item web visible">
        <div class="work-card">
          <div class="w-100">
            <img src="{{asset ('frontend/assets/images/medical-website-mockup.jpeg')}}" alt="">
          </div>
          <div class="content">
            <span class="date">26 Dec 2025</span>
            <h6>Landing page design for Medical</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 work-item web extra">
        <div class="work-card">
          <div class="img-placeholder"></div>
          <div class="content"><h6>Agency Website</h6></div>
        </div>
      </div>

      <!-- ===== SOCIAL MEDIA ===== -->
      <div class="col-lg-4 col-md-6 work-item social visible">
        <div class="work-card">
          <div class="w-100">
            <img src="{{asset ('frontend/assets/images/printItem.jpeg')}}" alt="">
          </div>
          <div class="content">
            <span class="date">26 Dec 2025</span>
            <h6>Landing page design for Medical</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 work-item social visible">
        <div class="work-card">
          <div class="w-100">
            <img src="{{asset ('frontend/assets/images/printItem2.jpeg')}}" alt="">
          </div>
          <div class="content">
            <span class="date">26 Dec 2025</span>
            <h6>Instagram Banner</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 work-item social extra">
        <div class="work-card"><div class="img-placeholder"></div><div class="content"><h6>Ad Creative</h6></div></div>
      </div>

    </div>

    <!-- Button -->
    <div class="text-center mt-3">
      <button id="toggleBtn" class="moreBtn">Show More</button>
    </div>

  </div>
</section>


<!-- MyWork part ends-->

<!-- education & experience part -->
<section id="educationPart" class="education-section py-5">
  <div class="container">

    <!-- Section Title -->
      <div class="section-title-box text-center mb-4">
      <div class="title-3d education">
        <h2 class="section-title ">My Education & Experience</h2>
      </div>

      <p class="section-subtitle mt-3">
        A quick overview of my academic background & professional journey
      </p>
    </div>


    <div class="row justify-content-center g-5">

      <!-- Education -->
      <div class="col-lg-5">
        <h4 class="column-title" data-aos="fade-right">🎓 Education</h4>

        <div class="timeline-item" data-aos="fade-up">
          <span class="timeline-dot"></span>
          <div class="timeline-content">
            <div class="icon-box">
              <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div>
              <h6>Dakhil • 2020</h6>
              <p>
                Munirul Ulom Baria Islamia Dakhil Madrash<br>
                Rangamatia, Fatickchari, Chattogram
              </p>
            </div>
          </div>
        </div>

        <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
          <span class="timeline-dot"></span>
          <div class="timeline-content">
            <div class="icon-box">
              <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div>
              <h6>Alim • 2022</h6>
              <p>
                Jamia Millia Ahmodia Kamil Madrash<br>
                Nazirhat, Fatickchari, Chattogram
              </p>
            </div>
          </div>
        </div>

        <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
          <span class="timeline-dot"></span>
          <div class="timeline-content">
            <div class="icon-box">
              <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div>
              <h6>Honors • Running</h6>
              <p>
                Subhania Alia Kamil Madrassah<br>
                Pathorghata, Kotowali, Chattogram
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Experience -->
      <div class="col-lg-5">
        <h4 class="column-title" data-aos="fade-left">💼 Experience</h4>

        <div class="timeline-item" data-aos="fade-up">
          <span class="timeline-dot"></span>
          <div class="timeline-content">
            <div class="icon-box">
              <i class="bi bi-palette-fill"></i>
            </div>
            <div>
              <h6>Graphic & UX/UI Designer</h6>
              <p>
                Wiki Tech BD<br>
                Chattogram,Bangladesh
              </p>
            </div>
          </div>
        </div>

        <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
          <span class="timeline-dot"></span>
          <div class="timeline-content">
            <div class="icon-box">
              <i class="bi bi-palette-fill"></i>
            </div>
            <div>
              <h6>Graphic Designer(Project-Based)</h6>
              <p>
                Tiger Branding<br>
                Amsterdam, Netherlands
              </p>
            </div>
          </div>
        </div>

        <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
          <span class="timeline-dot"></span>
          <div class="timeline-content">
            <div class="icon-box">
              <i class="bi bi-palette-fill"></i>
            </div>
            <div>
              <h6>Junior Graphic Designer</h6>
              <p>
                Marketian Agency (2023-2024)<br>
                Zakir Hossen Road, Khulshi, Chattogram
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- ended edu & exp -->

<!-- about me part starts -->
<section id="about">
  <div class="container py-5">
    <div class="row g-4 align-items-stretch">

      <!-- LEFT BIG PROFILE -->
      <div class="col-12 col-lg-6" data-aos="fade-right">
        <div class="card-box h-100 text-center profile-box">
          <div class="profile-img-wrapper mx-auto">
            <img src="{{asset ('frontend/assets/images/my-image-2.png ')}}" alt="">
          </div>

          <h4 class="mt-4">Ekram Hossen</h4>
          <p class="email">ekramhusain60@gmail.com</p>

          <div class="aboutBtn">
            <a class="btn btn-primary rounded-pill mt-3">
            Download CV
          </a>
          </div>
        </div>
      </div>

      <!-- RIGHT SIDE -->
      <div class="col-12 col-lg-6">
        <div class="row g-4 h-100">

          <!-- About Me -->
          <div class="col-12 col-lg-12" data-aos="fade-left">
            <div class="card-box h-100">
              <h4>About Me</h4>
              <span class="status"><i class="bi bi-check-lg"></i> Open to work</span>

              <p class="mt-3">
                Graphic Designer with 3+ years of experience. I craft
                user-friendly interfaces that are functional and visually compelling.
              </p>

              <p>
                Born and raised in Chattogram,Bangladesh. When not designing,
                I enjoy board games and cooking arepas.
              </p>
            </div>
          </div>

          <!-- Latest Roles -->
          <div class="col-12 col-lg-12" data-aos="fade-left" data-aos-delay="120">
            <div class="card-box h-100">
              <h6>Latest Roles</h6>

              <div class="role mt-3">
                <div class="icon red">⚡</div>
                <div>
                  <strong>UI Designer</strong>
                  <p>Wiki Tech BD</p>
                </div>
              </div>

              <div class="role mt-3">
                <div class="icon black">GD</div>
                <div>
                  <strong>Graphics Designer</strong>
                  <p>Marketian Agency</p>
                </div>
              </div>

              <h6 class="mt-4">Main Apps</h6>
              <div class="apps mt-2">
                <span>Figma</span>
                <span>Photoshop</span>
                <span>Illustrator</span>
                <span>adove XD</span>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
<!-- about me part ended -->

<!-- Trusted By -->
<section class="client-section py-5">
  <div class="container">
   <div class="section-title-box text-center mb-4">
      <div class="title-3d">
        <h2 class="section-title">Trusted By</h2>
      </div>

      <p class="section-subtitle mt-3">
        Proud to collaborate with leading brands & organizations
      </p>
    </div>


    <div class="client-wrapper">
      <div class="client-track">
        <!-- 10 Client Items -->
        <div class="client-item"><img src="{{asset ('frontend/assets/images/herbia logo design final.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/al-Maarij-logo (7).png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/chatga agro logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/golden-hotel-logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/logo-ab agro.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/porchex new logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/Mavon final logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/sabaco-logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/wecards-logo-png.png ')}}" alt=""></div>

        <!-- Duplicate for infinite loop -->
        <div class="client-item"><img src="{{asset ('frontend/assets/images/al-haramain-logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/kitchen-asia-logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/kpdl-logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/herbia logo design final.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/chatga agro logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/al-Maarij-logo (7).png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/golden-hotel-logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/porchex new logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/Mavon final logo.png ')}}" alt=""></div>
        <div class="client-item"><img src="{{asset ('frontend/assets/images/wecards-logo-png ')}}.png ')}}" alt=""></div>
      </div>
    </div>
  </div>
</section>

<!-- Trusted part ends -->
 <!-- Contact part starts -->
<section id="contact" class="contact-section">
  <div class="container py-5">

    <!-- Title -->
    <div class="section-title-box text-center mb-4">
      <div class="title-3d">
        <h2 class="section-title">Lets Talk</h2>
      </div>

      <p class="section-subtitle mt-3">
       Feel free to reach out — I’m always open to discussing new projects
      </p>
    </div>


    <div class="row align-items-center g-4">

      <!-- Contact Form -->
      <div class="col-lg-7 mx-auto" data-aos="fade-right">
        <div class="contact-card">
          <h5 class="mb-4">
            Send Your <span>Message</span>
          </h5>

          <form>
            <div class="row g-3">
              <div class="col-md-6">
                <input type="text" class="form-control custom-input" placeholder="Your Name">
              </div>
              <div class="col-md-6">
                <input type="email" class="form-control custom-input" placeholder="Your Email">
              </div>
              <div class="col-12">
                <textarea class="form-control custom-input" rows="5" placeholder="Your Message"></textarea>
              </div>
              <div class="col-12">
                <button class="btn send-btn w-100">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Contact Info -->
      <div class="col-lg-4 mx-lg-4" data-aos="fade-left">
        <div class="contact-info">

          <div class="info-item">
            <i class="bi bi-telephone-fill"></i>
            <div>
              <p>+8801576521362</p>
              <p>+8801606714140</p>
            </div>
          </div>

          <div class="info-item">
            <i class="bi bi-envelope-fill"></i>
            <div>
              <p>ekramhusain60@gmail.com</p>
              <p>info.ekram@gmail.com</p>
            </div>
          </div>

          <div class="info-item">
            <i class="bi bi-geo-alt-fill"></i>
            <div>
              <p>Harualchari, Fatikchari</p>
              <p>Chattogram, Bangladesh</p>
            </div>
          </div>

          <!-- Social Icons -->
          <div class="social-icons">
           <li><a href="https://wa.me/8801576521362"><i class="bi bi-whatsapp"></i></a></li>
            <li><a href="https://www.facebook.com/share/1N5oC8m5FM/"><i class="bi bi-facebook"></i></a></li>
            <li><a href="https://www.linkedin.com/in/ekram-husain-emon/"><i class="bi bi-linkedin"></i></a></li>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

 <!-- contact part ends -->
<!-- Clints feedback starts -->
  <section class="client-feedback-section">
  <div class="container">
   <div class="section-title-box text-center mb-4">
      <div class="title-3d">
        <h2 class="section-title">Clients Feedback</h2>
      </div>

      <p class="section-subtitle mt-3">
       Don't just take my word for it - hear from my clients
      </p>
    </div>

    <div class="row align-items-center justify-content-center">

      <!-- Left Image (Fixed) -->
      <div class="col-lg-3 d-none d-lg-flex justify-content-center">
        <img src="{{asset ('frontend/assets/images/Group 256.png ')}}" class="side-img" alt="">
      </div>

      <!-- Center Slider -->
      <div class="col-lg-6 col-12">
        <div class="feedback-slider">

          <!-- Slide 1 -->
          <div class="feedback-item active">
            <img src="{{asset ('frontend/assets/images/Ellipse 28.png ')}}" class="client-img" alt="">
            <h5>Erfan Shawon</h5>
            <span class="location">Bangladesh</span>

            <div class="stars">
              ★★★★
            </div>

            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </p>
          </div>

          <!-- Slide 2 -->
          <div class="feedback-item">
            <img src="{{asset ('frontend/assets/images/handsome-smiling-man-looking-with-disbelief 1.png ')}}" class="client-img" alt="">
            <h5>John Doe</h5>
            <span class="location">USA</span>

            <div class="stars">
              ★★★★★
            </div>

            <p>
              It has survived not only five centuries, but also the leap into electronic typesetting.
            </p>
          </div>

          <!-- Slide 3 -->
          <div class="feedback-item">
            <img src="{{asset ('frontend/assets/images/WhatsApp Image 2025-11-30 at 9.28.26 PM.jpeg ')}}" class="client-img" alt="">
            <h5>Alex Smith</h5>
            <span class="location">UK</span>

            <div class="stars">
              ★★★★★
            </div>

            <p>
              Remaining essentially unchanged. It was popularised in the 1960s.
            </p>
          </div>

        </div>

        <!-- Dots -->
        <div class="slider-dots">
          <span class="dot active"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>
      </div>

      <!-- Right Image (Fixed) -->
      <div class="col-lg-3 d-none d-lg-flex justify-content-center">
        <img src="{{asset ('frontend/assets/images/Group 255.png ')}}" class="side-img" alt="">
      </div>

    </div>
  </div>
</section>

<!-- clints parts ends -->

</main>

<!-- Image Modal -->
<div id="imageModal" class="image-modal">
  <div class="modal-content">

    <!-- Close -->
    <span class="close-btn">&times;</span>

    <!-- Left: Image -->
    <div class="modal-left">
      <img id="modalImg" src="" alt="">
    </div>

    <!-- Right: Info Panel -->

  </div>
</div>
<!-- image model ends -->

<!-- footer part starts -->
<footer class="pt-5 pb-4">
  <div class="container">
    <div class="row align-items-center gy-4">

      <!-- Left Content -->
      <div class="col-lg-6" data-aos="fade-up">
        <h2 class="fw-bold mb-3 mx-5">Get in Touch</h2>
        <p class="mb-4 mx-5" style="max-width:420px;">
          Ecosystem bootstrapping learning curve lean startup disruptive.
          Marketing long tail disruptive agile development partner.
        </p>

        <!-- Social Icons -->
        <div class="footer-social d-flex gap- mx-5">
          <li><a href="https://www.facebook.com/share/1N5oC8m5FM/"><i class="bi bi-facebook"></i></a></li>
           <li><a href="https://www.linkedin.com/in/ekram-husain-emon/"><i class="bi bi-linkedin"></i></a></li>
          <li><a href="https://wa.me/8801576521362"><i class="bi bi-whatsapp"></i></a></li>
          <li><a href="#"><i class="bi bi-telegram"></i></a></li>
        </div>
      </div>

      <!-- Right Cards -->
      <div class="col-lg-6">
        <div class="row g-4 justify-content-lg-end">

          <div class="col-sm-6" data-aos="fade-up" data-aos-delay="100">
            <div class="footer-card">
              <li><a href="https://www.behance.net/Ekramhossenemon"><i class="bi bi-behance"></i></a></li>
              <p>Ekram Hossen</p>
            </div>
          </div>

          <div class="col-sm-6" data-aos="fade-up" data-aos-delay="200">
            <div class="footer-card">
              <i class="bi bi-envelope"></i>
              <p>ekramhusain60@gmail.com</p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</footer>
<div class="footer-bottom">
    <p>© 2026 Ekram Hossen. All Rights Reserved.Powered by<a href="#"><span><i class="bi bi-code-slash"></i> devwithefran</span></a> </p>
  </div>

<!-- footer part ends -->
<!-- js link here -->
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('frontend/assets/js/apps.js') }}"></script>   
     <!-- js link ends -->
</body>
</html>