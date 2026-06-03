<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary SEO -->
    <title>Ekram Hossen | Graphic & UI Designer — Chattogram</title>
    <meta name="description" content="Ekram Hossen — Graphic Designer with 3+ years of experience in UI/UX, Branding & Social Media Design. Based in Chattogram, Bangladesh.">
    <meta name="keywords" content="Graphic Designer, UI Designer, Branding, Chattogram, Bangladesh, Ekram Hossen, Photoshop, Figma, Illustrator">
    <meta name="author" content="Ekram Hossen">
    <meta name="robots" content="index, follow">

    <!-- Canonical URL -->
    {{-- <link rel="canonical" href="https://yourdomain.com/"> --}}

    <!-- ✅ Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/ekram logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('frontend/assets/images/ekram logo.png') }}">

    <!-- ✅ Open Graph (Facebook, LinkedIn share) -->
    <meta property="og:type" content="website">
    {{-- <meta property="og:url" content="https://yourdomain.com/"> --}}
    <meta property="og:title" content="Ekram Hossen | Graphic & UI Designer">
    <meta property="og:description" content="Graphic Designer with 3+ years of experience in UI/UX, Branding & Social Media Design. Based in Chattogram, Bangladesh.">
    <meta property="og:image" content="{{ asset('frontend/assets/images/my-image-2.png') }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="Ekram Hossen Portfolio">

    <!-- ✅ Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Ekram Hossen | Graphic & UI Designer">
    <meta name="twitter:description" content="Graphic Designer with 3+ years of experience in UI/UX, Branding & Social Media Design.">
    {{-- <meta name="twitter:image" content="{{ asset('frontend/assets/images/my-image-2.png') }}"> --}}

    <!-- fonts & CSS — আগের মতোই রাখো -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link rel="preload" as="style"
  href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
</head>
<body>
<!-- Preloader -->
<div id="preloader">
  <div class="loader-wrapper">
    <img src="{{asset ('frontend/assets/images/ekram logo.png ')}}" alt="Logo" class="logo">
    <div class="glow"></div>
  </div>
</div>
  <!-- preloader ends here -->
    <header>
        <!-- nav bar starts -->
         <section id="Home">
           <nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#offcanvasExample"><img class="img-fluid" src="{{asset ('frontend/assets/images/ekram logo.png ')}}" alt="Ekram Hossen — Graphic & UI Designer Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <a role="button" aria-controls="offcanvasExample" href="#offcanvasExample" data-bs-toggle="offcanvas"><i class="bi bi-list"></i></a>
    </button>
    <!-- side bar starts -->
     <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel"><img class="img-fluid" src="{{asset ('frontend/assets/images/ekram logo.png ')}}" alt="Ekram Hossen — Graphic & UI Designer Logo"></h5>
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
          <a class="nav-link active" aria-current="page" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#workPart">Works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#about">About me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#contact">Contact</a>
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
          <a class="nav-link active" aria-current="page" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#workPart">Works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#about">About me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#contact">Contact</a>
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

  <!-- navBottom starts here -->
<nav class="mobile-bottom-nav">

  <a class="mob-nav-link" href="{{ $profile->fiverr ?? '#' }}" target="_blank">... </a>
<a class="mob-nav-link" href="https://wa.me/{{ $profile->whatsapp ?? '' }}" target="_blank">...</a>
<a class="mob-nav-link" href="{{ $profile->facebook ?? '#' }}" target="_blank">...</a>
<a class="mob-nav-link" href="{{ $profile->behance ?? '#' }}" target="_blank">...</a>

</nav>

  <!-- navBottom ends here -->
        <!-- nav bar ends -->
</header>

<main>
<!-- hero part starts -->
 <section class="hero py-5">
    <div class="container">
      <div class="row">
        <!-- Left image -->
        <div class="col-lg-4 col-12">
          <div class="hero-img mt-5">
            <img src="{{asset ('frontend/assets/images/my-image-2.png') }}" alt="Ekram Hossen — Graphic & UI Designer" class="img-fluid">
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
            <li><a href="https://wa.me/+8801576521362"><i class="bi bi-whatsapp"></i></a></li>
           <li><a href="https://t.me/ekramhossen" target="_blank"><i class="bi bi-telegram"></i></a></li>
           <li><a href="https://www.facebook.com/share/1N5oC8m5FM/"><i class="bi bi-facebook"></i></a></li>
         </ul>
         <p class="follow-text">Follow me:</p>
       </div>
</div>
      </div>
    </div>
  </section>
<!-- hero parts ends -->
 <!-- counter part -->
<section>
  <div class="container">
    <div class="stats-wrap" id="statsGrid"></div>
  </div>
</section>
 <!-- counter -->

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
    @forelse($skills as $skill)
    <div class="col-12 col-md-6 col-lg-3" data-aos="fade-right">
        <div class="skill-card" data-percent="{{ $skill->percentage }}">
            <div class="skill-top">
                @if($skill->icon_path)
                    <img src="{{ asset('storage/'.$skill->icon_path) }}" alt="{{ $skill->name }}">
                @endif
                <h5>{{ $skill->name }}</h5>
            </div>
            <div class="progress-wrap">
                <div class="progress-bar">
                    <span class="progress-fill"></span>
                </div>
                <span class="progress-number">0%</span>
            </div>
        </div>
    </div>
    @empty
    <p class="text-muted text-center">No skills added yet.</p>
    @endforelse
</div>
  </div>
</section>
<!-- skill parts ends  -->

{{-- service part starts --}}
<!-- Services Section -->
<section id="services" class="services-section py-5">
  <div class="container">

    <div class="section-title-box text-center mb-5">
      <div class="title-3d">
        <h2 class="section-title">My Services</h2>
      </div>
      <p class="section-subtitle mt-3">What I can do for you</p>
    </div>

    <div class="services-list">
    @forelse($services as $i => $srv)
    <div class="srv-item">
        <div class="srv-top">
            <span class="srv-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
            <h3 class="srv-title">{{ $srv->title }}</h3>
            <div class="srv-tags">
                @foreach($srv->tags_array as $tag)
                    <span>{{ $tag }}</span>
                @endforeach
            </div>
        </div>
        <div class="srv-expand">
            <p>{{ $srv->description }}</p>
            <a href="#contact" class="srv-btn">Discuss Project</a>
        </div>
    </div>
    @empty
    <p class="text-muted text-center py-4">No services added yet.</p>
    @endforelse
</div>
  </div>
</section>
{{-- servide ended --}}
<!-- Mywork part Starts -->
<section id="workPart">
  <div class="container py-5">
 
    <div class="section-title-box text-center mb-4">
      <div class="title-3d">
        <h2 class="section-title">My Work</h2>
      </div>
      <p class="section-subtitle mt-3">A quick overview of my Projects & Design</p>
    </div>
 
    <!-- Filter Buttons -->
    <div class="d-flex justify-content-center gap-2 mb-4">
      <button class="filter-btn active" data-filter="mobile">Social Media</button>
      <button class="filter-btn" data-filter="web">Web Design</button>
      <button class="filter-btn" data-filter="social">Branding</button>
    </div>
 
    <!-- Work Grid -->
    <div class="row g-4" id="workGrid">
 
      @forelse($works as $work)
      <div class="col-lg-4 col-md-6 work-item {{ $work->category }} {{ $work->is_extra ? 'extra' : 'visible' }}">
 
        @if($work->popup_image)
        {{-- Card with popup trigger --}}
        <div class="work-card popup-trigger"
             data-img="{{ asset('storage/' . $work->popup_image) }}">
          <div class="img-wrapper">
            <img src="{{ asset('storage/' . $work->cover_image) }}"
                 class="w-100" alt="{{ $work->title }}">
            <div class="overlay">
              <div class="icons">
                <span class="icon view"><i class="bi bi-eye"></i></span>
                <span class="icon love"><i class="bi bi-heart"></i></span>
              </div>
            </div>
          </div>
          <div class="content">
            <span class="date">{{ $work->work_date ? $work->work_date->format('d M Y') : '' }}</span>
            <h6>{{ $work->title }}</h6>
          </div>
        </div>
 
        @else
        {{-- Card without popup --}}
        <div class="work-card">
          <div class="img-wrapper">
            <img src="{{ asset('storage/' . $work->cover_image) }}"
                 class="w-100" alt="{{ $work->title }}">
            <div class="overlay">
              <div class="icons">
                <span class="icon love"><i class="bi bi-heart"></i></span>
              </div>
            </div>
          </div>
          <div class="content">
            <span class="date">{{ $work->work_date ? $work->work_date->format('d M Y') : '' }}</span>
            <h6>{{ $work->title }}</h6>
          </div>
        </div>
        @endif
 
      </div>
      @empty
      <div class="col-12 text-center py-5">
        <p class="text-muted">এখনো কোনো কাজ যোগ করা হয়নি।</p>
      </div>
      @endforelse
 
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
           <img src="{{ $profile->photo ? asset('storage/'.$profile->photo) : asset('frontend/assets/images/my-image-2.png') }}" alt="{{ $profile->name }}">
          </div>

          <h4 class="mt-4">{{ $profile->name }}</h4>
<p class="email">{{ $profile->email }}</p>

          <div class="aboutBtn">
   @if($profile->cv)
<a href="{{ asset('storage/'.$profile->cv) }}" download class="btn btn-primary rounded-pill mt-3">
    <i class="bi bi-cloud-download-fill me-1"></i> Download CV
</a>
@endif

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
@if($profile->open_to_work)
    <span class="status"><i class="bi bi-check-lg"></i> Open to work</span>
@endif
<p class="mt-3">{{ $profile->bio }}</p>

              {{-- <p class="mt-3">
                Graphic Designer with 3+ years of experience. I craft
                user-friendly interfaces that are functional and visually compelling.
              </p> --}}

              <p>
                Born and raised in Chattogram,Bangladesh. When not designing,
                I enjoy exploring new design trends and photography.
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
                <span>Adobe XD</span>
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

        @foreach($clients as $client)
          <div class="client-item">
            <img src="{{ asset('storage/'.$client->logo) }}"
                 alt="{{ $client->name }}">
          </div>
        @endforeach

      </div>
    </div>
  </div>
</section>
<!-- Trusted part ends -->

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
          @if(session('success'))
    <div class="alert alert-success mb-3">
        ✅ {{ session('success') }}
    </div>
@endif

        <form method="POST" action="/contact-submit" id="contactForm" novalidate>
  @csrf
  <div class="row g-3">
    <div class="col-md-6">
      <input type="text" name="name" id="contactName"
             class="form-control custom-input" placeholder="Your Name">
      <div class="invalid-feedback-msg" id="nameError"></div>
    </div>
    <div class="col-md-6">
      <input type="email" name="email" id="contactEmail"
             class="form-control custom-input" placeholder="Your Email">
      <div class="invalid-feedback-msg" id="emailError"></div>
    </div>
    <div class="col-12">
      <textarea name="message" id="contactMessage"
                class="form-control custom-input" rows="5"
                placeholder="Your Message"></textarea>
      <div class="invalid-feedback-msg" id="messageError"></div>
    </div>
    <div class="col-12">
      <button type="submit" class="btn send-btn w-100" id="submitBtn">
        Send Message
      </button>
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
        <img src="{{asset ('frontend/assets/images/Group 256.png ')}}" class="side-img" alt="Side Icon">
      </div>

      <!-- Center Slider -->
      <div class="col-lg-6 col-12">
        {{-- Testimonials section --}}
<div class="feedback-slider">
    @forelse($testimonials as $t)
    <div class="feedback-item">
        @if($t->photo)
            <img src="{{ asset('storage/' . $t->photo) }}" class="client-img" alt="{{ $t->client_name }}">
        @else
            <div class="client-img d-flex align-items-center justify-content-center
                        bg-primary text-white fw-bold fs-4 rounded-circle mx-auto">
                {{ strtoupper(substr($t->client_name, 0, 1)) }}
            </div>
        @endif

        <h5>{{ $t->client_name }}</h5>
        <span class="location">{{ $t->location }}</span>

        <div class="stars">
            @for($s = 1; $s <= 5; $s++)
                {{ $s <= $t->rating ? '★' : '☆' }}
            @endfor
        </div>

        <p>{{ $t->review }}</p>
    </div>
    @empty
    <div class="feedback-item">
        <p class="text-muted">No reviews yet.</p>
    </div>
    @endforelse
</div>

{{-- Dynamic dots --}}
<div class="slider-dots">
    @foreach($testimonials as $i => $t)
        <span class="dot {{ $i === 0 ? 'active' : '' }}"></span>
    @endforeach
</div>

        
      </div>

      <!-- Right Image (Fixed) -->
      <div class="col-lg-3 d-none d-lg-flex justify-content-center">
        <img src="{{asset ('frontend/assets/images/Group 255.png ')}}" class="side-img" alt="Side Icon">
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
      <img id="modalImg" src="" alt="Model-Img">
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
          Have a project in mind? I'd love to work with you. 
  Let's create something meaningful together — reach out anytime.
        </p>

        <!-- Social Icons -->
        <div class="footer-social d-flex gap- mx-5">
          <li><a href="{{ $profile->facebook ?? '#' }}"><i class="bi bi-facebook"></i></a></li>
<li><a href="{{ $profile->linkedin ?? '#' }}"><i class="bi bi-linkedin"></i></a></li>
<li><a href="https://wa.me/{{ $profile->whatsapp ?? '' }}"><i class="bi bi-whatsapp"></i></a></li>
<li><a href="https://t.me/{{ $profile->telegram ?? '' }}"><i class="bi bi-telegram"></i></a></li>
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

  <!-- Scroll to Top -->
<button id="scrollTopBtn" title="Go to top">
  <i class="bi bi-arrow-up-short"></i>
</button>

<!-- footer part ends -->
<!-- js link here -->
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('frontend/assets/js/apps.js') }}"></script>   
     <!-- js link ends -->

     {{-- SweetAlert Toast --}}
@if(session('success'))
<script>
  Swal.mixin({
  toast: true,
  position: "center",
  showConfirmButton: false,
  timer: 2500,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
}).fire({
  icon: "success",
  title: "{{ session('success') }}"
});
</script>
@endif



</body>
</html>