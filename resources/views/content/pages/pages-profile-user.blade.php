@extends('layouts/layoutMaster')

@section('title', 'User Profile - Profile')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss'
])
@endsection

<!-- Page Styles -->
@section('page-style')
@vite(['resources/assets/vendor/scss/pages/page-profile.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite(['resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/pages-profile.js'])
@endsection

@section('content')

<style>
  .card-body::-webkit-scrollbar {
    display: none; /* Hide the scrollbar */
  }
</style>

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
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='ti-xs ti ti-user-check me-1'></i> Profile</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-projects')}}"><i class='ti-xs ti ti-layout-grid me-1'></i> Projects</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-connections')}}"><i class='ti-xs ti ti-link me-1'></i> Members</a></li>
    </ul>
  </div>
</div>
<!--/ Navbar pills -->

<!-- User Profile Content -->
<div class="row">
  <div class="col-xl-4 col-lg-5 col-md-5">
    <!-- About User -->
    <div class="card mb-4">
      <div class="card-body">
        <small class="card-text text-uppercase">About</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="ti ti-user text-heading"></i><span class="fw-medium mx-2 text-heading">NID:</span> <span>{{ Auth::user()->nis }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-check text-heading"></i><span class="fw-medium mx-2 text-heading">Status:</span> <span>{{ Auth::user()->graduation ? 'Alumni' : 'Active' }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-crown text-heading"></i><span class="fw-medium mx-2 text-heading">Gender:</span> <span>{{ Auth::user()->gender }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-calendar text-heading"></i><span class="fw-medium mx-2 text-heading">Birth:</span> <span>{{ Auth::user()->birth_date }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-flag text-heading"></i><span class="fw-medium mx-2 text-heading">Place:</span> <span>{{ Auth::user()->birth_place }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-file-description text-heading"></i><span class="fw-medium mx-2 text-heading">Languages:</span> <span>Indonesia</span></li>
        </ul>
        <small class="card-text text-uppercase">Contacts</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="ti ti-phone-call"></i><span class="fw-medium mx-2 text-heading"></span> <span>{{ Auth::user()->own_phone ?: Auth::user()->phone }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-brand-instagram"></i><span class="fw-medium mx-2 text-heading"></span> <span>{{ Auth::user()->instagram }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span class="fw-medium mx-2 text-heading"></span> <span>{{ Auth::user()->email }}</span></li>
        </ul>
      </div>
    </div>
    <!--/ About User -->
    <!-- Profile Overview -->
    <div class="card mb-4">
      <div class="card-body">
        <p class="card-text text-uppercase">Overview</p>
        <ul class="list-unstyled mb-0">
          <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span class="fw-medium mx-2">Hobby:</span> <span>{{ Auth::user()->hobby }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-layout-grid"></i><span class="fw-medium mx-2">Sport:</span> <span>{{ Auth::user()->sport }}</span></li>
          <li class="d-flex align-items-center"><i class="ti ti-users"></i><span class="fw-medium mx-2">Goal:</span> <span>{{ Auth::user()->ambition }}</span></li>
        </ul>
      </div>
    </div>
    <!--/ Profile Overview -->
  </div>
  <div class="col-xl-8 col-lg-7 col-md-7">
    <!-- Activity Timeline -->
    <div class="card card-action mb-4" style="max-height: 686px">
      <div class="card-header align-items-center">
        <h5 class="card-action-title mb-0">Timeline Tasks</h5>
        <div class="card-action-element">
          <div class="dropdown">
            <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical text-muted"></i></button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="javascript:void(0);">Share timeline</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="card-body pb-0 overflow-auto">
        <ul class="timeline ms-1 mb-0">

          @foreach ($tasks as $item)
          @php
              $days = abs((strtotime(date('Y-m-d')) - strtotime($item->date)) / (60 * 60 * 24));
          @endphp
          <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-{{ $item->accepted ? 'primary' : (!$item->accepted && $days < 3 ? 'success' : (!$item->accepted && $days < 5 ? 'warning' : 'danger')) }}"></span>
            <div class="timeline-event">
              <div class="timeline-header mb-2 mt-1">
                <div>
                  <h6 class="mb-0">{{ ucwords(substr($item->name, 0, 35)) }}...</h6>
                  <p class="mb-2">Task ID : {{ $item->id }}</p>
                </div>
                <a href="{{ $item->link }}" target="_blank">
                  <div class="text-warning" style="font-size: 8px;">
                    @for ($i = 1; $i <= 5; $i++)
                      @if ($i <= $item->rate)
                          <i class="ti ti-star-filled ti-sm"></i>
                      @else
                          <i class="ti ti-star ti-sm"></i>
                      @endif
                    @endfor
                  </div>
                </a>
              </div>
              @if ($item->accepted)
              <div class="d-flex flex-wrap">
                <div class="avatar me-2 mb-3">
                  <img src="{{ file_exists(public_path('storage/guru/' . $item->teacher_id . '.png')) ? asset('storage/guru/' . $item->teacher_id . '.png') : asset('assets/img/avatars/no.png') }}" alt="Avatar" class="rounded-circle" />
                </div>
                <div class="ms-1">
                  <h6 class="mb-0">Accepted by {{ $item->teacher_name }}</h6>
                  <span>{{ date('l, j M Y', strtotime($item->date)) }}</span>
                </div>
              </div>
              <p>
                Review: {{ $item->review }}
              </p>
              @else
              <div class="d-flex flex-wrap gap-2 pt-1 mb-1">
                <a href="javascript:void(0)" class="me-3">
                  <img src="{{asset('assets/img/icons/misc/doc.png') }}" alt="Document image" width="15" class="me-2">
                  <span class="fw-medium text-heading">{{ $item->status }}</span>
                </a>
              </div>
              <p>{{ $item->review ?: '' }}</p>
              <p class="text-{{ ($days < 3 ? '' : ($days < 5 ? 'warning' : 'danger')) }}">{{ date('l, j M Y', strtotime($item->date)) }}</p>
              @endif
            </div>
          </li>
          @endforeach

        </ul>
      </div>
    </div>
    <!--/ Activity Timeline -->
  </div>
</div>
<!--/ User Profile Content -->
@endsection
