@extends('layouts/layoutMaster')

@section('title', 'User Profile - Projects')

<!-- Page -->
@section('page-style')
@vite(['resources/assets/vendor/scss/pages/page-profile.scss'])
@endsection

@section('content')

<!-- Header -->
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="user-profile-header-banner">
        <img src="{{ asset('assets/img/pages/profile-banner.png') }}" alt="Banner image" class="rounded-top">
      </div>
      <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
          <img src="{{ file_exists(public_path('storage/member/' . Auth::user()->image)) ? asset('storage/member/' . Auth::user()->image) : asset('assets/img/avatars/no.png') }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
        </div>
        <div class="flex-grow-1 mt-3 mt-sm-5">
          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <h4>{{ Auth::user()->name }}</h4>
              <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                <li class="list-inline-item d-flex gap-1">
                  <i class='ti ti-color-swatch'></i> {{ Auth::user()->role }}
                </li>
                <li class="list-inline-item d-flex gap-1">
                  <i class='ti ti-map-pin'></i> {{ Auth::user()->city }}
                </li>
                <li class="list-inline-item d-flex gap-1">
                  <i class='ti ti-calendar'></i> {{ Auth::user()->registered }}
                </li>
              </ul>
            </div>
            <a href="javascript:void(0)" class="btn btn-primary">
              <i class='ti ti-check me-1'></i>Connected
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Header -->

<!-- Navbar pills -->
<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-row mb-4 justify-content-center justify-content-md-start">
      <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-user')}}"><i class='ti ti-user-check ti-xs me-1'></i> Profile</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='ti ti-layout-grid ti-xs me-1'></i> Projects</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-connections')}}"><i class='ti ti-link ti-xs me-1'></i> Members</a></li>
    </ul>
  </div>
</div>
<!--/ Navbar pills -->

<!-- Project Cards -->
<div class="row g-4">
  @foreach ($projects as $item)
  @php
    $totalTasks = 0;
    $completedTasks = 0;
    foreach ($tasks as $key => $value) {
      if($value->project_id == $item->id) {
        $totalTasks++;
        if($value->status == 'Completed') {
          $completedTasks++;
        }
      }
    }
    $percentage = ($totalTasks > 0) ? round(($completedTasks / $totalTasks) * 100) : 0;
  @endphp
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="d-flex align-items-start">
          <div class="d-flex align-items-start">
            <div class="avatar me-2">
              <img src="{{ asset('assets/img/icons/brands/social-label.png') }}" alt="Avatar" class="rounded-circle" />
            </div>
            <div class="me-2 ms-1">
              <h5 class="mb-0"><a href="javascript:;" class="stretched-link text-body">{{ $item->theme }}</a></h5>
              <div class="client-info"><span class="fw-medium">Subject: </span><span class="text-muted">{{ $item->subject }}</span></div>
            </div>
          </div>
          <div class="ms-auto">
            <div class="dropdown z-2">
              <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical text-muted"></i></button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="javascript:void(0);">View details</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <p class="mb-0">{{ substr($item->description, 0, 65) }}...</p>
      </div>
      <div class="card-body border-top">
        <div class="d-flex align-items-center mb-3">
          <h6 class="mb-1"><span class="text-body fw-normal">{{ $percentage }}%</span></h6>
          <span class="badge bg-label-{{ $item->status=='Completed' ? 'primary' : ($item->status=='In Progress' ? 'success' : ($item->status=='Not Started' ? 'warning' : 'danger')) }} ms-auto">{{ $item->status }}</span>
        </div>
        <div class="progress mb-2" style="height: 8px;">
          <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex align-items-center pt-1">
          <div class="d-flex align-items-center">
            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0 z-2 mt-1">
              @foreach ($tasks as $task)
                  @if ($task->project_id == $item->id)
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $task->student_name }}" class="avatar avatar-sm pull-up">
                    <img class="rounded-circle" src="{{ file_exists(public_path('storage/member/' . $task->student_id)) ? asset('storage/member/' . $task->student_id) : asset('assets/img/avatars/no.png') }}" alt="Avatar">
                  </li>
                  @endif
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
<!--/ Project Cards -->
@endsection
