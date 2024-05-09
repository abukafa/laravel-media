@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Project Dashboard')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/nouislider/nouislider.scss',
  'resources/assets/vendor/libs/swiper/swiper.scss',
  'resources/assets/vendor/libs/apex-charts/apex-charts.scss'
])
@endsection

<!-- Page Styles -->
@section('page-style')
@vite(['resources/assets/vendor/scss/pages/front-page-landing.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/nouislider/nouislider.js',
  'resources/assets/vendor/libs/swiper/swiper.js',
  'resources/assets/vendor/libs/apex-charts/apexcharts.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite([
  'resources/assets/js/front-page-landing.js'
  ])
@endsection

@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
  <!-- Hero: Start -->
  <section id="hero-animation">
    <div id="landingHero" class="section-py landing-hero position-relative">
      <img src="{{asset('assets/img/front-pages/backgrounds/hero-bg.png')}}" alt="hero background" class="position-absolute top-0 start-50 translate-middle-x object-fit-contain w-100 h-100" data-speed="1"/>
      <div class="container">
        <div class="hero-text-box text-center">
          <h1 class="text-primary hero-title display-6 fw-bold">Welcome to our Project Dashboard <br class="d-none d-md-block d-lg-none" /> Jaz Academy</h1>
          <h2 class="hero-sub-title h6 mb-4 pb-1">
            Lembaga Pendidikan Islam & Teknologi<br />
            Akademi Remaja Muslim.
          </h2>
          <div class="landing-hero-btn d-inline-block position-relative">
            <span class="hero-btn-item position-absolute d-none d-md-flex text-heading">asking is free
              <img src="{{asset('assets/img/front-pages/icons/Join-community-arrow.png')}}" alt="Join community arrow" class="scaleX-n1-rtl" /></span>
            <a href="#landingPricing" class="btn btn-primary btn-lg rounded-pill">Join Member</a>
          </div>
        </div>
        <div id="heroDashboardAnimation" class="hero-animation-img">
          <a href="{{ Auth::check() ? url('/pages/profile-user') : url('/login') }}" target="_blank">
            <div id="heroAnimationImg" class="position-relative hero-dashboard-img">
              <img src="{{asset('assets/img/front-pages/landing-page/hero-dashboard-'.$configData['style'].'.png')}}" alt="hero dashboard" class="animation-img" data-app-light-img="front-pages/landing-page/hero-dashboard-light.png" data-app-dark-img="front-pages/landing-page/hero-dashboard-dark.png" />
              <img src="{{asset('assets/img/front-pages/landing-page/hero-elements-'.$configData['style'].'.png')}}" alt="hero elements" class="position-absolute hero-elements-img animation-img top-0 start-0" data-app-light-img="front-pages/landing-page/hero-elements-light.png" data-app-dark-img="front-pages/landing-page/hero-elements-dark.png" />
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="landing-hero-blank"></div>
  </section>
  <!-- Hero: End -->

  <!-- Useful features: Start -->
  <section id="landingFeatures" class="section-py landing-features">
    <div class="container">
      <div class="text-center mb-3 pb-1">
        <span class="badge bg-label-primary">Project Overview</span>
      </div>
      <h3 class="text-center mb-1">
        <span class="position-relative fw-bold z-1">Keep Learning
          <img src="{{asset('assets/img/front-pages/icons/section-title-icon.png')}}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
        </span>
        by doing your projects
      </h3>
      <p class="text-center mb-3 mb-md-5 pb-3">
        Ilmu tanpa amal, bagaikan pohon tanpa buah.
      </p>
      <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5 mb-4">
        <div class="col-md-2 col-4 text-center features-icon-box">
          <div class="text-center mb-3">
            <img src="{{asset('assets/img/front-pages/icons/laptop.png')}}" alt="laptop charging" />
          </div>
          <h6 class="mb-3 d-none d-xl-block">Content Creator</h6>
          <p class="features-icon-description"></p>
        </div>
        <div class="col-md-2 col-4 text-center features-icon-box">
          <div class="text-center mb-3">
            <img src="{{asset('assets/img/front-pages/icons/rocket.png')}}" alt="transition up" />
          </div>
          <h6 class="mb-3 d-none d-xl-block">Web Developer</h6>
          <p class="features-icon-description"></p>
        </div>
        <div class="col-md-2 col-4 text-center features-icon-box">
          <div class="text-center mb-3">
            <img src="{{asset('assets/img/front-pages/icons/paper.png')}}" alt="edit" />
          </div>
          <h6 class="mb-3 d-none d-xl-block">Workshop</h6>
          <p class="features-icon-description"></p>
        </div>
        <div class="col-md-2 col-4 text-center features-icon-box d-none d-md-block">
          <div class="text-center mb-3">
            <img src="{{asset('assets/img/front-pages/icons/check.png')}}" alt="3d select solid" />
          </div>
          <h6 class="mb-3 d-none d-xl-block">Entrepreneurship</h6>
          <p class="features-icon-description"></p>
        </div>
        <div class="col-md-2 col-4 text-center features-icon-box d-none d-md-block">
          <div class="text-center mb-3">
            <img src="{{asset('assets/img/front-pages/icons/user.png')}}" alt="lifebelt" />
          </div>
          <h6 class="mb-3 d-none d-xl-block">Public Speaking</h6>
          <p class="features-icon-description"></p>
        </div>
        <div class="col-md-2 col-4 text-center features-icon-box d-none d-md-block">
          <div class="text-center mb-3">
            <img src="{{asset('assets/img/front-pages/icons/keyboard.png')}}" alt="google docs" />
          </div>
          <h6 class="mb-3 d-none d-xl-block">Literation</h6>
          <p class="features-icon-description"></p>
        </div>
      </div>

      <!-- PROJECT GRAPHIC : START -->
      <div class="row">

        <!-- Bar Chart -->
        <div class="col-md-8 mb-4">
          <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-md-center align-items-start">
              <div>
                <h5 class="card-title mb-0">Daily Progress</h5>
                <small class="text-muted">Overview</small>
              </div>
              <div class="dropdown">
                <button type="button" class="btn dropdown-toggle p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-calendar"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Yesterday</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7 Days</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30 Days</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current Month</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last Month</a></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <div id="barChart"></div>
            </div>
          </div>
        </div>
        <!-- /Bar Chart -->

        <!-- Radial bar Chart -->
        <div class="col-md-4 col-12 mb-4">
          <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="card-title mb-0">Completion</h5>
              <div class="dropdown">
                <button type="button" class="btn dropdown-toggle p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-calendar"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Yesterday</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7 Days</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30 Days</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current Month</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last Month</a></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <div id="radialBarChart"></div>
            </div>
          </div>
        </div>
        <!-- /Radial bar Chart -->

        <!-- Line Area Chart -->
        <div class="col-xl-8 mb-2 h-100">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
            </div>
            <div class="card-body">
              <div id="lineAreaChart"></div>
            </div>
          </div>
        </div>
        <!-- /Line Area Chart -->

        <!-- Donut Chart -->
        <div class="col-md-4 col-12 mb-4">
          <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
              <div>
                <h5 class="card-title mb-0">Subjects</h5>
                <small class="text-muted">Subject theme percentation</small>
              </div>
              <div class="dropdown d-none d-sm-flex">
                <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-calendar"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Yesterday</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7 Days</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30 Days</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current Month</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last Month</a></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <div id="donutChart"></div>
            </div>
          </div>
        </div>
        <!-- /Donut Chart -->

        <!-- Line Chart -->
        <div class="col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-header d-flex justify-content-between">
              <div>
                <h5 class="card-title mb-0">Balance</h5>
                <small class="text-muted">Daily Completion</small>
              </div>
            </div>
            <div class="card-body">
              <div id="lineChart"></div>
            </div>
          </div>
        </div>
        <!-- /Line Chart -->

        <!-- Scatter Chart -->
        <div class="col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
              <div>
                <h5 class="card-title mb-0">Personal Tasks</h5>
                <small class="text-muted">Daily Completion</small>
              </div>
              <div class="btn-group d-none d-sm-flex" role="group" aria-label="radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="dailyRadio" checked>
                <label class="btn btn-outline-secondary" for="dailyRadio">Daily</label>

                <input type="radio" class="btn-check" name="btnradio" id="monthlyRadio">
                <label class="btn btn-outline-secondary" for="monthlyRadio">Monthly</label>

                <input type="radio" class="btn-check" name="btnradio" id="yearlyRadio">
                <label class="btn btn-outline-secondary" for="yearlyRadio">Yearly</label>
              </div>
            </div>
            <div class="card-body">
              <div id="scatterChart"></div>
            </div>
          </div>
        </div>
        <!-- /Scatter Chart -->

      </div>
      <!-- PROJECT GRAPHIC : END -->

    </div>
  </section>
  <!-- Useful features: End -->

  <!-- Real customers reviews: Start -->
  <section id="landingReviews" class="section-py bg-body landing-reviews pb-0 d-none">
    <!-- What people say slider: Start -->
    <div class="container">
      <div class="row align-items-center gx-0 gy-4 g-lg-5">
        <div class="col-md-6 col-lg-5 col-xl-3">
          <div class="mb-3 pb-1">
            <span class="badge bg-label-primary">Project Reviews</span>
          </div>
          <h3 class="mb-1">
            <span class="position-relative fw-bold z-1">Top of the Month
              <img src="{{asset('assets/img/front-pages/icons/section-title-icon.png')}}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
            </span>
          </h3>
          <p class="mb-3 mb-md-5">
            Sebaik-baik amal yang terus menerus<br class="d-none d-xl-block" />
            walaupun hanya sedikit.
          </p>
          <div class="landing-reviews-btns">
            <button id="reviews-previous-btn" class="btn btn-label-primary reviews-btn me-3 scaleX-n1-rtl" type="button">
              <i class="ti ti-chevron-left ti-sm"></i>
            </button>
            <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn scaleX-n1-rtl" type="button">
              <i class="ti ti-chevron-right ti-sm"></i>
            </button>
          </div>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-9">
          <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
            <div class="swiper" id="swiper-reviews">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="{{asset('assets/img/front-pages/branding/logo-1.png')}}" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        “Vuexy is hands down the most useful front end Bootstrap theme I've ever used. I can't wait
                        to use it again for my next project.”
                      </p>
                      <div class="text-warning mb-3">
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Cecilia Payne</h6>
                          <p class="small text-muted mb-0">CEO of Airbnb</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="{{asset('assets/img/front-pages/branding/logo-2.png')}}" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        “I've never used a theme as versatile and flexible as Vuexy. It's my go to for building
                        dashboard sites on almost any project.”
                      </p>
                      <div class="text-warning mb-3">
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="{{asset('assets/img/avatars/2.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Eugenia Moore</h6>
                          <p class="small text-muted mb-0">Founder of Hubspot</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="{{asset('assets/img/front-pages/branding/logo-3.png')}}" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        This template is really clean & well documented. The docs are really easy to understand and
                        it's always easy to find a screenshot from their website.
                      </p>
                      <div class="text-warning mb-3">
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="{{asset('assets/img/avatars/3.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Curtis Fletcher</h6>
                          <p class="small text-muted mb-0">Design Lead at Dribbble</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="{{asset('assets/img/front-pages/branding/logo-4.png')}}" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        All the requirements for developers have been taken into consideration, so I’m able to build
                        any interface I want.
                      </p>
                      <div class="text-warning mb-3">
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star ti-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="{{asset('assets/img/avatars/4.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Sara Smith</h6>
                          <p class="small text-muted mb-0">Founder of Continental</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="{{asset('assets/img/front-pages/branding/logo-5.png')}}" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        “I've never used a theme as versatile and flexible as Vuexy. It's my go to for building
                        dashboard sites on almost any project.”
                      </p>
                      <div class="text-warning mb-3">
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Eugenia Moore</h6>
                          <p class="small text-muted mb-0">Founder of Hubspot</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="{{asset('assets/img/front-pages/branding/logo-6.png')}}" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam nemo mollitia, ad eum
                        officia numquam nostrum repellendus consequuntur!
                      </p>
                      <div class="text-warning mb-3">
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star ti-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Sara Smith</h6>
                          <p class="small text-muted mb-0">Founder of Continental</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- What people say slider: End -->
    <hr class="m-0" />
    <!-- Logo slider: Start -->
    <div class="container">
      <div class="swiper-logo-carousel py-4 my-lg-2">
        <div class="swiper" id="swiper-clients-logos">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="{{asset('assets/img/front-pages/branding/logo_1-'.$configData['style'].'.png')}}" alt="client logo" class="client-logo" data-app-light-img="front-pages/branding/logo_1-light.png" data-app-dark-img="front-pages/branding/logo_1-dark.png" />
            </div>
            <div class="swiper-slide">
              <img src="{{asset('assets/img/front-pages/branding/logo_2-'.$configData['style'].'.png')}}" alt="client logo" class="client-logo" data-app-light-img="front-pages/branding/logo_2-light.png" data-app-dark-img="front-pages/branding/logo_2-dark.png" />
            </div>
            <div class="swiper-slide">
              <img src="{{asset('assets/img/front-pages/branding/logo_3-'.$configData['style'].'.png')}}" alt="client logo" class="client-logo" data-app-light-img="front-pages/branding/logo_3-light.png" data-app-dark-img="front-pages/branding/logo_3-dark.png" />
            </div>
            <div class="swiper-slide">
              <img src="{{asset('assets/img/front-pages/branding/logo_4-'.$configData['style'].'.png')}}" alt="client logo" class="client-logo" data-app-light-img="front-pages/branding/logo_4-light.png" data-app-dark-img="front-pages/branding/logo_4-dark.png" />
            </div>
            <div class="swiper-slide">
              <img src="{{asset('assets/img/front-pages/branding/logo_5-'.$configData['style'].'.png')}}" alt="client logo" class="client-logo" data-app-light-img="front-pages/branding/logo_5-light.png" data-app-dark-img="front-pages/branding/logo_5-dark.png" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Logo slider: End -->
  </section>
  <!-- Real customers reviews: End -->

  <!-- Our great team: Start -->
  <section id="landingTeam" class="section-py landing-team">
    <div class="container">
      <div class="text-center mb-3 pb-1">
        <span class="badge bg-label-primary">Our Mentors</span>
      </div>
      <h3 class="text-center mb-1">
        <span class="position-relative fw-bold z-1">Jaz
          <img src="{{asset('assets/img/front-pages/icons/section-title-icon.png')}}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
        </span>
        Teams.</h3>
      <p class="text-center mb-md-5 pb-3">Supported by Real People</p>
      <div class="row gy-5 mt-2">
        <div class="col-md-4">
          <div class="card mt-3 mt-lg-0 shadow-none">
            <div class="bg-label-primary position-relative team-image-box">
              <img src="{{asset('assets/img/front-pages/landing-page/team-hijaz.png')}}" class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" />
            </div>
            <div class="card-body border border-top-0 border-label-primary text-center">
              <h5 class="card-title mb-0">Hijaz Abdullah</h5>
              <p class="text-muted mb-0">CEO Jaz Academy</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mt-3 mt-lg-0 shadow-none">
            <div class="bg-label-info position-relative team-image-box">
              <img src="{{asset('assets/img/front-pages/landing-page/team-ayah.png')}}" class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" />
            </div>
            <div class="card-body border border-top-0 border-label-info text-center">
              <h5 class="card-title mb-0">Abu Kafa</h5>
              <p class="text-muted mb-0">Project Manager</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mt-3 mt-lg-0 shadow-none">
            <div class="bg-label-danger position-relative team-image-box">
              <img src="{{asset('assets/img/front-pages/landing-page/team-bunda.png')}}" class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" />
            </div>
            <div class="card-body border border-top-0 border-label-danger text-center">
              <h5 class="card-title mb-0">Ms. Tia</h5>
              <p class="text-muted mb-0">Lead Programs</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Our great team: End -->

  <!-- Pricing plans: Start -->
  <section id="landingPricing" class="section-py bg-body landing-pricing">
    <div class="container">
      <div class="text-center mb-3 pb-1">
        <span class="badge bg-label-primary">Program Plans</span>
      </div>
      <h3 class="text-center mb-1">
        <span class="position-relative fw-bold z-1">Jaz Academy
          <img src="{{asset('assets/img/front-pages/icons/section-title-icon.png')}}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
        </span>
        Programs
      </h3>
      <p class="text-center mb-4 pb-3">
        Visi kami adalah menghadirkan generasi muslim yang tangguh, berintegritas, dan siap menjadi pemimpin <br class="d-none d-xl-block" /> yang membawa <br class="d-block d-sm-none" /> perubahan positif dalam masyarakat global <br class="d-block d-sm-none" /> yang semakin terhubung.
      </p>

      <div class="row gy-4 pt-lg-3 jaz-plans">
        <!-- Basic Plan: Start -->
        <div class="col-xl-4 col-lg-6">
          <div class="card">
            <div class="card-header">
              <div class="text-center">
                <img src="{{asset('assets/img/front-pages/icons/paper-airplane.png')}}" alt="paper airplane icon" class="mb-4 pb-2" />
                <div class="d-flex align-items-center justify-content-center">
                  <span class="price-monthly h3 text-primary fw-bold mb-0">Homeschooling</span>
                </div>
                <h5 class="mb-1">Setara Sekolah Dasar</h5>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-unstyled ms-4">
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Alquran
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Iman
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Science
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Math
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    English
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Robotic
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Weekday or Weekend
                  </h5>
                </li>
              </ul>
              <div class="d-grid mt-4 pt-3">
                <a href="{{config('variables.whatsapp')}}" target="_blank" class="btn btn-label-primary">More Info</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Basic Plan: End -->

        <!-- Favourite Plan: Start -->
        <div class="col-xl-4 col-lg-6">
          <div class="card">
            <div class="card-header">
              <div class="text-center">
                <img src="{{asset('assets/img/front-pages/icons/plane.png')}}" alt="plane icon" class="mb-4 pb-2" />
                <div class="d-flex align-items-center justify-content-center">
                  <span class="price-monthly h3 text-primary fw-bold mb-0">Akademi Remaja</span>
                </div>
                <h5 class="mb-1">Setara Sekolah Lanjutan</h5>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-unstyled ms-4">
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Alquran
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Tsaqofah
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Multimedia
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Public Speaking
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Entrepreneurship
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Content Creator
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Asrama 3 Tahun
                  </h5>
                </li>
              </ul>
              <div class="d-grid mt-4 pt-3">
                <a href="{{config('variables.whatsapp')}}" target="_blank" class="btn btn-label-primary">More Info</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Favourite Plan: End -->

        <!-- Standard Plan: Start -->
        <div class="col-xl-4 col-lg-6">
          <div class="card">
            <div class="card-header">
              <div class="text-center">
                <img src="{{asset('assets/img/front-pages/icons/shuttle-rocket.png')}}" alt="shuttle rocket icon" class="mb-4 pb-2" />
                <div class="d-flex align-items-center justify-content-center">
                  <span class="price-monthly h3 text-primary fw-bold mb-0">Private Class</span>
                </div>
                <h5 class="mb-1">Peserta Umum</h5>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-unstyled ms-4">
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Coding Class
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Web Developer
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Game Developer
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Video Editing
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Graphic Design
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Motion Graphic
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                    Private Mentoring
                  </h5>
                </li>
              </ul>
              <div class="d-grid mt-4 pt-3">
                <a href="{{config('variables.whatsapp')}}" target="_blank" class="btn btn-label-primary">More Info</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Standard Plan: End -->
      </div>
    </div>
  </section>
  <!-- Pricing plans: End -->

  <!-- Fun facts: Start -->
  <section id="landingFunFacts" class="section-py landing-fun-facts">
    <div class="container">
      <div class="row gy-3">
        <div class="col-6 col-lg-3">
          <div class="card border border-label-primary shadow-none">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/front-pages/icons/laptop.png')}}" alt="laptop" class="mb-2" />
              <h5 class="h2 mb-1">35+</h5>
              <p class="fw-medium mb-0">
                Coding Class<br />
                Participant
              </p>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="card border border-label-success shadow-none">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/front-pages/icons/user-success.png')}}" alt="laptop" class="mb-2" />
              <h5 class="h2 mb-1">23+</h5>
              <p class="fw-medium mb-0">
                Private Class<br />
                Participant
              </p>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="card border border-label-info shadow-none">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/front-pages/icons/diamond-info.png')}}" alt="laptop" class="mb-2" />
              <h5 class="h2 mb-1">10+</h5>
              <p class="fw-medium mb-0">
                Akademi Remaja<br />
                Members
              </p>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="card border border-label-warning shadow-none">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/front-pages/icons/check-warning.png')}}" alt="laptop" class="mb-2" />
              <h5 class="h2 mb-1">12+</h5>
              <p class="fw-medium mb-0">
                Homeschooling<br />
                Joined
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Fun facts: End -->

  <!-- FAQ: Start -->
  <section id="landingFAQ" class="section-py bg-body landing-faq">
    <div class="container">
      <div class="text-center mb-3 pb-1">
        <span class="badge bg-label-primary">FAQ</span>
      </div>
      <h3 class="text-center mb-1">Frequently Asked
        <span class="position-relative fw-bold z-1">Questions
          <img src="{{asset('assets/img/front-pages/icons/section-title-icon.png')}}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
        </span>
      </h3>
      <p class="text-center mb-5 pb-3">Pertanyaan tentang Jaz Academy.</p>
      <div class="row gy-5">
        <div class="col-lg-5">
          <div class="text-center">
            <img src="{{asset('assets/img/front-pages/landing-page/faq-boy-with-logos.png')}}" alt="faq boy with logos" class="faq-image" />
          </div>
        </div>
        <div class="col-lg-7">
          <div class="accordion" id="accordionExample">
            <div class="card accordion-item active">
              <h2 class="accordion-header" id="headingOne">
                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                  Apa itu Jaz Academy?
                </button>
              </h2>

              <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Lembaga pelatihan dan pembinaan generasi muslim era digital yang berkomitmen untuk mempersiapkan pemuda muslim yang siap menghadapi tantangan dunia modern.
                  Kami memberikan pendidikan dan pelatihan terbaik dalam berbagai program yang dirancang untuk menggabungkan nilai-nilai islami dengan teknologi mutakhir..
                </div>
              </div>
            </div>
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                  Apa itu Akademi Remaja Muslim?
                </button>
              </h2>
              <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Sebuah program pendidikan non-formal setara SLTP yang menyajikan konsep unik yang menggabungkan konsep Homeschooling dan Boarding School.
                  Kami berkomitmen untuk membentuk pemuda yang berintegritas, berkompeten, dan siap menghadapi tantangan dunia modern dengan keyakinan yang kuat.
                </div>
              </div>
            </div>
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                  Apa itu Homeschooling Jaz Academy?
                </button>
              </h2>
              <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Program pembinaan yang berfokus pada pendidikan karakter dan pembentukan individu yang berintegritas. Ini adalah program jangka panjang yang dapat mencakup asrama dan pendidikan dalam lingkungan yang mendukung dan peduli.
                  Program ini bertujuan untuk membimbing peserta dalam pengembangan karakter, keterampilan interpersonal, dan pemahaman tentang nilai-nilai Islami. Selain itu, program ini mencakup pendidikan akademik dan agama yang mendalam.
                  Peserta akan memperoleh pemahaman mendalam tentang Islam, keterampilan akademik, serta nilai-nilai moral yang kuat.
                </div>
              </div>
            </div>
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionFour" aria-expanded="false" aria-controls="accordionFour">
                  Bagaimana Konsep Pengajaran di Jaz Academy?
                </button>
              </h2>
              <div id="accordionFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Pendekatan kami berorientasi objek, memungkinkan peserta untuk belajar melalui pengalaman langsung dan proyek yang mendalam.
                  Kami memahami bahwa pembelajaran yang penuh makna terjadi ketika peserta terlibat secara aktif dalam eksplorasi dan kreativitas.
                </div>
              </div>
            </div>
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionFive" aria-expanded="false" aria-controls="accordionFive">
                  Bagaimana dengan Masa Pembinaan Akademi Remaja?
                </button>
              </h2>
              <div id="accordionFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Peserta yang bergabung dengan JAZ Academy di program Akademi Remaja Muslim akan menjalani masa pembinaan selama 3 tahun.
                  Selama masa ini, mereka akan tinggal di asrama, di mana perkembangan harian mereka akan dipantau dengan cermat.
                  Kenaikan jenjang akan ditentukan berdasarkan perkembangan mereka serta proyek-proyek yang berhasil mereka buat.
                  Kami berkomitmen untuk menciptakan generasi pemuda yang tangguh, berintegritas, dan siap untuk menjadi agen perubahan positif dalam masyarakat.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- FAQ: End -->

  <!-- CTA: Start -->
  <section id="landingCTA" class="section-py landing-cta position-relative p-lg-0 pb-0">
    <img src="{{asset('assets/img/front-pages/backgrounds/cta-bg-'.$configData['style'].'.png')}}" class="position-absolute bottom-0 end-0 scaleX-n1-rtl h-100 w-100 z-n1" alt="cta image" data-app-light-img="front-pages/backgrounds/cta-bg-light.png" data-app-dark-img="front-pages/backgrounds/cta-bg-dark.png" />
    <div class="container">
      <div class="row align-items-center gy-5 gy-lg-0">
        <div class="col-lg-6 text-center text-lg-start">
          <h6 class="h2 text-primary fw-bold mb-1">Ready to Get Started?</h6>
          <p class="fw-medium mb-4">Saatnya merancang masa depan, dan memulainya..</p>
          <a href="{{config('variables.instagramUrl')}}" target="_blank" class="btn btn-lg btn-primary">Our Gallery</a>
        </div>
        <div class="col-lg-6 pt-lg-5 text-center text-lg-end">
          <img src="{{asset('assets/img/front-pages/landing-page/cta-dashboard.png')}}" alt="cta dashboard" class="img-fluid" />
        </div>
      </div>
    </div>
  </section>
  <!-- CTA: End -->

  <!-- Contact Us: Start -->
  <section id="landingContact" class="section-py bg-body landing-contact">
    <div class="container">
      <div class="text-center mb-3 pb-1">
        <span class="badge bg-label-primary">Contact US</span>
      </div>
      <h3 class="text-center mb-1">
        <span class="position-relative fw-bold z-1">Let's start
          <img src="{{asset('assets/img/front-pages/icons/section-title-icon.png')}}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
        </span>
        together
      </h3>
      <p class="text-center mb-4 mb-lg-5 pb-md-3">Untuk informasi lebih lanjut, hubungi kami..</p>
      <div class="row gy-4">
        <div class="col-lg-5">
          <div class="contact-img-box position-relative border p-2 h-100">
            <img src="{{asset('assets/img/front-pages/icons/contact-border.png')}}" alt="contact border" class="contact-border-img position-absolute d-none d-md-block scaleX-n1-rtl" />
            <img src="{{asset('assets/img/front-pages/landing-page/contact-family.png')}}" alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl" />
            <div class="pt-3 px-4 pb-1">
              <div class="row gy-3 gx-md-4">
                <div class="col-md-6 col-lg-12 col-xl-6">
                  <div class="d-flex align-items-center">
                    <div class="badge bg-label-primary rounded p-2 me-2"><i class="ti ti-mail ti-sm"></i></div>
                    <div>
                      <p class="mb-0">Email</p>
                      <h5 class="mb-0">
                        <a href="mailto:jazcorp.id@gmail.com" class="text-heading">jazcorp.id@gmail.com</a>
                      </h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12 col-xl-6">
                  <div class="d-flex align-items-center">
                    <div class="badge bg-label-success rounded p-2 me-2">
                      <i class="ti ti-phone-call ti-sm"></i>
                    </div>
                    <div>
                      <p class="mb-0">Phone</p>
                      <h5 class="mb-0"><a href="tel:+6281222299964" class="text-heading">+6281 2222 999 64</a></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="card">
            <div class="card-body">
              <h4 class="mb-1">Send a message</h4>
              <p class="mb-4">
                Jika Anda ingin mendiskusikan apa pun yang berkaitan dengan pendidikan islam, teknologi, <br class="d-none d-lg-block" />
                entrepreneurship, atau pengembangan anak usia remaja, Anda berada di tempat yang tepat.
              </p>
              <form>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="contact-form-fullname">Full Name</label>
                    <input type="text" class="form-control" id="contact-form-fullname" placeholder="john" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="contact-form-email">Email</label>
                    <input type="text" id="contact-form-email" class="form-control" placeholder="johndoe@gmail.com" />
                  </div>
                  <div class="col-12">
                    <label class="form-label" for="contact-form-message">Message</label>
                    <textarea id="contact-form-message" class="form-control" rows="8" placeholder="Write a message"></textarea>
                  </div>
                  <div class="col-12">
                    <a href="{{config('variables.whatsapp')}}" target="_blank" class="btn btn-primary">Send inquiry</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Us: End -->
</div>

<script>
  var cards = document.querySelectorAll('.jaz-plans .card');
  cards.forEach(function(card) {
    card.addEventListener('mouseover', function() {
      card.classList.toggle('border');
      card.classList.toggle('border-primary');
      card.classList.toggle('shadow-lg');
      var button = card.querySelector('a')
      button.classList.toggle('btn-label-primary');
      button.classList.toggle('btn-primary');
      var menus = card.querySelectorAll('h5 span');
      menus.forEach(function(menu) {
        menu.classList.toggle('bg-label-primary');
        menu.classList.toggle('bg-primary');
      });
    });
  });

  var statusCount = @json($statusCount ?? []);
  var statusData = statusCount.map(function(item) {  return item.status;  });
  var percentageData = statusCount.map(function(item) {  return item.percentage; });
  var completedStatus = statusCount.find(function(item) {  return item.status === 'Completed';  });

  var dailyUpdate = @json($dailyUpdate ?? []);
  var dateUpdate = dailyUpdate.map(function(item) {  return item.date;  });
  var notStartedUpdate = dailyUpdate.map(function(item) {  return item.notStarted;  });
  var inProgressUpdate = dailyUpdate.map(function(item) {  return item.inProgress;  });
  var completedUpdate = dailyUpdate.map(function(item) {  return item.completed;  });
  var inCompletedUpdate = dailyUpdate.map(function(item, i) {  return Number(notStartedUpdate[i]) + Number(inProgressUpdate[i]);  });
  var allDataUpdate = dailyUpdate.map(function(item, i) {  return Number(notStartedUpdate[i]) + Number(inProgressUpdate[i]) + Number(completedUpdate[i]);  });

  var projectCount = @json($projectCount ?? []);
  var projectData = projectCount.map(function(item) {  return item.project;  });
  var projectCountData = projectCount.map(function(item) {  return item.count; });

  var personTrack = @json($personTrack ?? []);
  personTrack.forEach(function(item) {
    item.date = new Date(item.date);
  });
  personTrack.sort(function(a, b) {
      return a.date - b.date;
  });

  // Construct series array for scatter chart
  var series = {};
  personTrack.forEach(function(item) {
      if (!series[item.student_name]) {
          series[item.student_name] = [];
      }
      series[item.student_name].push([item.date.getTime(), getStatusValue(item.status)]);
  });

  // Convert series object to array format
  var scatterData = [];
  for (var name in series) {
      if (series.hasOwnProperty(name)) {
          scatterData.push({ name: name, data: series[name] });
      }
  }

console.log(scatterData);

function getStatusValue(status) {
    return status === 'Completed' ? 3 : (status === 'In Progress' ? 2 : (status === 'Not Started' ? 1 : 0));
}
</script>

@endsection
