@php $adminProfile = \App\Models\Profile::getSingle(); @endphp
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>    
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

   <title>@yield('title', 'Dashboard - Myfolio')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('backend/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('backend/assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    <script src="{{asset('backend/assets/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('backend/assets/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <img src="{{asset ('frontend/assets/images/ekramlogo.png ')}}" width="100px" alt="Logo" class="logo">
          </div>

          <div class="menu-inner-shadow"></div>

         <ul class="menu-inner py-1">

    {{-- Dashboard --}}
    <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a href="{{ route('backend.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div>Dashboard</div>
        </a>
    </li>

    {{-- Your Work --}}
    <li class="menu-item {{ request()->routeIs('works.*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div>Your Work</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ request()->routeIs('works.create') ? 'active' : '' }}">
                <a href="{{ route('backend.works.create') }}" class="menu-link">
                    <div>Add Work</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('works.index') ? 'active' : '' }}">
                <a href="{{ route('backend.works.index') }}" class="menu-link">
                    <div>All Works</div>
                </a>
            </li>
        </ul>
    </li>
{{-- Work Stats --}}
    <li class="menu-item {{ request()->routeIs('works.stats') ? 'active' : '' }}">
    <a href="{{ route('backend.works.stats') }}" class="menu-link">
        <i class="menu-icon bx bx-bar-chart-alt-2"></i>
        <div>Work Stats</div>
    </a>
</li>

    {{-- Contact Messages --}}
    <li class="menu-item {{ request()->routeIs('contacts.index') ? 'active' : '' }}">
        <a href="{{ route('backend.contacts.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-envelope"></i>
            <div>Messages</div>
        </a>
    </li>

    {{-- Analytics --}}
    <li class="menu-item {{ request()->routeIs('analytics.index') ? 'active' : '' }}">
        <a href="{{ route('backend.analytics.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
            <div>Analytics</div>
        </a>
    </li>

    {{-- Testimonials --}}
    <li class="menu-item {{ request()->routeIs('testimonials.*') ? 'active' : '' }}">
        <a href="{{ route('backend.testimonials.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-star"></i>
            <div>Testimonials</div>
        </a>
    </li>

    {{-- Profile Settings --}}
    <li class="menu-item {{ request()->routeIs('profile.index') ? 'active' : '' }}">
        <a href="{{ route('backend.profile.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user-circle"></i>
            <div>Profile Settings</div>
        </a>
    </li>

    {{-- Account Settings --}}
<li class="menu-item {{ request()->routeIs('account.settings') ? 'active' : '' }}">
    <a href="{{ route('backend.account.settings') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-lock-alt"></i>
        <div>Account Settings</div>
    </a>
</li>

    {{-- Services --}}
    <li class="menu-item {{ request()->routeIs('services.*') ? 'active' : '' }}">
        <a href="{{ route('backend.services.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-briefcase"></i>
            <div>Services</div>
        </a>
    </li>

    {{-- Trusted By / Clients --}}
<li class="menu-item {{ request()->routeIs('clients.*') ? 'active open' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-buildings"></i>
        <div>Trusted By</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item {{ request()->routeIs('clients.create') ? 'active' : '' }}">
            <a href="{{ route('backend.clients.create') }}" class="menu-link">
                <div>Add Client</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('clients.index') ? 'active' : '' }}">
            <a href="{{ route('backend.clients.index') }}" class="menu-link">
                <div>All Clients</div>
            </a>
        </li>
    </ul>
</li>

</ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->  
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
               

                <!-- User -->
<li class="nav-item navbar-dropdown dropdown-user dropdown">
  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
    <div class="avatar avatar-online">
     @if($adminProfile->photo)
  <img src="{{ asset('storage/'.$adminProfile->photo) }}"
       alt="{{ $adminProfile->name }}" class="w-px-40 h-auto rounded-circle">
@else
  <div class="w-px-40 h-px-40 rounded-circle bg-primary d-flex align-items-center justify-content-center text-white fw-bold">
    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
  </div>
@endif
    </div>
  </a>

  <ul class="dropdown-menu dropdown-menu-end">

    {{-- User info --}}
    <li>
      <a class="dropdown-item" href="{{ route('backend.profile.index') }}">
        <div class="d-flex">
          <div class="flex-shrink-0 me-3">
            <div class="avatar avatar-online">
             @if($adminProfile->photo)
  <img src="{{ asset('storage/'.$adminProfile->photo) }}"
       alt="{{ $adminProfile->name }}" class="w-px-40 h-auto rounded-circle">
@else
  <div class="w-px-40 h-px-40 rounded-circle bg-primary d-flex align-items-center justify-content-center text-white fw-bold">
    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
  </div>
@endif
            </div>
          </div>
          <div class="flex-grow-1">
           <span class="fw-semibold d-block">{{ $adminProfile->name }}</span>
           <small class="text-muted">{{ auth()->user()->email }}</small>
          </div>
        </div>
      </a>
    </li>

    <li><div class="dropdown-divider"></div></li>

    {{-- Profile Settings --}}
    <li>
      <a class="dropdown-item" href="{{ route('backend.profile.index') }}">
        <i class="bx bx-user me-2"></i>
        <span class="align-middle">Profile Settings</span>
      </a>
    </li>

    <li><div class="dropdown-divider"></div></li>

    {{-- Logout --}}
    <li>
      <form method="POST" action="/logout">
        @csrf
        <button type="submit" class="dropdown-item">
          <i class="bx bx-power-off me-2"></i>
          <span class="align-middle">Log Out</span>
        </button>
      </form>
    </li>

  </ul>
</li>
<!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

@yield('content')    


    <script src="{{asset('backend/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/js/menu.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{asset('backend/assets/js/main.js')}}"></script>
    <script src="{{asset('backend/assets/js/dashboards-analytics.js')}}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

  </body>
</html>
