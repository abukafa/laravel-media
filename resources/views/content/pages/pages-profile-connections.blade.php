@extends('layouts/layoutMaster')

@section('title', 'User Profile - Connections')

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
          <img src="{{ Auth::check() && Auth::user()->image ? asset('storage/public/member/' . Auth::user()->image) : asset('storage/public/no.png') }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
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
    <ul class="nav nav-pills flex-column flex-sm-row mb-4">
      <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-user')}}"><i class='ti ti-user-check ti-xs me-1'></i> Profile</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-projects')}}"><i class='ti ti-layout-grid ti-xs me-1'></i> Projects</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='ti ti-link ti-xs me-1'></i> Members</a></li>
    </ul>
  </div>
</div>
<!--/ Navbar pills -->

<!-- Connection Cards -->
<div class="row g-4">
  @foreach ($students as $item)
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body text-center">
        <div class="dropdown btn-pinned">
          <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical text-muted"></i></button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="javascript:void(0);">Share connection</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Block connection</a></li>
          </ul>
        </div>
        <div class="mx-auto my-3">
          <img src="{{ $item->image ? asset('storage/public/member/' . $item->image) : asset('storage/public/no.png') }}" alt="Avatar Image" class="rounded-circle w-px-100" />
        </div>
        <h4 class="mb-1 card-title">{{ implode(' ', array_slice(explode(' ', $item->name), 0, 2)) }}</h4>
        <span class="pb-1">{{ $item->role ?: 'Content Creator' }}</span>
        <div class="d-flex align-items-center justify-content-center my-3 gap-2">
          @php
              $arraySkills = $item->skills ? explode(", ", $item->skills) : [];
          @endphp
          @for ($i = 0; $i < count($arraySkills); $i++)
            <a href="javascript:;"><span class="badge bg-label-primary">{{ $arraySkills[$i] }}</span></a>
          @endfor
        </div>
        <div class="d-flex align-items-center justify-content-around my-3 py-1">
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
        @endphp
          <div>
            <h4 class="mb-0">{{ $totalTasks }}</h4>
            <span>Tasks</span>
          </div>
          <div>
            <h4 class="mb-0">{{ $completedTasks }}</h4>
            <span>Completed</span>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
          <a href="javascript:;" class="btn btn-primary d-flex align-items-center me-3"><i class="ti-xs me-1 ti ti-user-check me-1"></i>Connected</a>
          <a href="javascript:;" class="btn btn-label-secondary btn-icon"><i class="ti ti-mail ti-sm"></i></a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
<!--/ Connection Cards -->
@endsection
