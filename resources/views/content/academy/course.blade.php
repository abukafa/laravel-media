@extends('layouts/layoutMaster')
@php
  $configData = Helper::appClasses();
@endphp

@section('title', 'Academy Course - Apps')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Academy/</span> Our Courses</h4>

<div class="app-academy">
  <div class="card p-0 mb-4">
    <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
      <div class="app-academy-md-25 card-body py-0">
        <img src="{{asset('assets/img/illustrations/bulb-'.$configData['style'].'.png') }}" class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand" data-app-light-img="illustrations/bulb-light.png" data-app-dark-img="illustrations/bulb-dark.png" height="90" />
      </div>
      <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
        <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
          Education, talents, and career opportunities.
          <span class="text-primary fw-medium text-nowrap">All in one place</span>.
        </h3>
        <p class="mb-3">
          Grow your skill with the most reliable online courses and certifications in marketing, information technology,
          programming, and multimedia.
        </p>
        <div class="d-flex align-items-center justify-content-between app-academy-md-80">
            <form method="GET" class="d-flex">
                <input type="search" name="name" placeholder="Find your course" class="form-control me-2" />
                <button type="submit" class="btn btn-primary btn-icon"><i class="ti ti-search"></i></button>
            </form>
        </div>
      </div>
      <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
        <img src="{{asset('assets/img/illustrations/pencil-rocket.png') }}" alt="pencil rocket" height="188" class="scaleX-n1-rtl" />
      </div>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header d-flex flex-wrap justify-content-between gap-3">
      <div class="card-title mb-0 me-1">
        <h5 class="mb-1">{{ request('subject') ?: 'All Courses' }}</h5>
        <p class="text-muted mb-0">Total {{ count($courses) }} course you have to learn</p>
      </div>
      <div class="d-flex justify-content-md-end align-items-center gap-4 flex-wrap">
        <form method="GET" id="courseForm">
            <select name="subject" class="select2 form-select" data-placeholder="{{ request('subject') }}" onchange="document.getElementById('courseForm').submit()">
                <option value="">All Subjects</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->subject }}">{{ $course->subject }}</option>
                @endforeach
            </select>
        </form>


        <label class="switch d-none">
          <input type="checkbox" class="switch-input">
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
          <span class="switch-label text-nowrap mb-0">Hide completed</span>
        </label>
      </div>
    </div>
    <div class="card-body">
        <div class="row gy-4 mb-4">
        @foreach ($courses as $course)
            <div class="col-sm-6 col-lg-4">
            <div class="card p-2 h-100 shadow-none border">
                <div class="rounded-2 text-center mb-3">
                <a href="{{url('academy/course/' . $course->first_id)}}"><img class="img-fluid" src="{{asset('assets/img/pages/app-academy-tutor-1.png')}}" alt="tutor image 1" /></a>
                </div>
                <div class="card-body p-3 pt-2">
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <span class="badge bg-label-primary">{{ $course->subject }}</span>
                    <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                    {{ round(mt_rand(350, 500) / 100,1) }} <span class="text-warning"><i class="ti ti-star-filled me-1 mt-n1"></i></span><span class="text-muted"></span>
                    </h6>
                </div>
                <a href="{{url('academy/course/' . $course->first_id)}}" class="h5">{{ $course->name }}</a>
                <p class="mt-2">{{ $course->note }}</p>
                <p class="d-flex align-items-center"><i class="ti ti-clock me-2 mt-n1"></i>{{ $course->count }} Videos</p>
                <div class="progress mb-4" style="height: 8px">
                    <div class="progress-bar" style="width: {{ mt_rand(50, 100) }}%;" role="progressbar" aria-valuenow="{{ mt_rand(50, 100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex flex-column flex-md-row gap-2 text-nowrap">
                    <a class="app-academy-md-50 btn btn-label-primary d-flex align-items-center" href="{{url('academy/course/' . $course->first_id)}}">
                    <span class="me-2">Start Over</span><i class="ti ti-chevron-right scaleX-n1-rtl ti-sm"></i>
                    </a>
                </div>
                </div>
            </div>
            </div>
        @endforeach
        </div>
        <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
            <ul class="pagination">
            <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="ti ti-chevron-left ti-xs scaleX-n1-rtl"></i></a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0);">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
            </li>
            <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="ti ti-chevron-right ti-xs scaleX-n1-rtl"></i></a>
            </li>
            </ul>
        </nav>
    </div>
  </div>
</div>
@endsection
