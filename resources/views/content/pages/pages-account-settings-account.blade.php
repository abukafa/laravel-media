@extends('layouts/layoutMaster')

@section('title', 'Account settings - Account')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
    'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
  'resources/assets/vendor/libs/select2/select2.scss',
  'resources/assets/vendor/libs/@form-validation/form-validation.scss',
  'resources/assets/vendor/libs/animate-css/animate.scss',
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'
])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/select2/select2.js',
  'resources/assets/vendor/libs/@form-validation/popular.js',
  'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
  'resources/assets/vendor/libs/@form-validation/auto-focus.js',
  'resources/assets/vendor/libs/cleavejs/cleave.js',
  'resources/assets/vendor/libs/cleavejs/cleave-phone.js',
    'resources/assets/vendor/libs/flatpickr/flatpickr.js',
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/pages-account-settings-account.js'])
@endsection

@section('content')
<!-- FLASH ALERT -->
@if (session()->has('success') || session()->has('danger'))
<div class="alert alert-{{ session('success') ? 'success' : 'danger' }} d-flex align-items-center py-3 mb-4" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
  <div class="ms-2">
    {{ session('success') ?: session('danger') }}.
  </div>
</div>
@else
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Account
</h4>
@endif

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-row mb-4 justify-content-center justify-content-md-start">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-users me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-security')}}"><i class="ti-xs ti ti-lock me-1"></i> Security</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-tasks')}}"><i class="ti-xs ti ti-file-description me-1"></i> Tasks</a></li>
    </ul>
    <div class="card mb-4">
      <h5 class="card-header">Profile Details</h5>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="{{ file_exists(public_path('storage/member/' . $student->image)) ? asset('storage/member/' . $student->image) : asset('assets/img/avatars/no.png') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
          <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
              <span class="d-none d-sm-block">Upload new photo</span>
              <i class="ti ti-upload d-block d-sm-none"></i>
              <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
            </label>
            <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
              <i class="ti ti-refresh-dot d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Reset</span>
            </button>

            <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
          </div>
        </div>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <form action="{{ route('pages-account-settings-account-update') }}" method="POST">
          @csrf
          <div class="row">
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="nis" class="form-label">No Induk</label>
              <input class="form-control" type="text" id="nis" name="nis" value="{{ $student->nis }}" readonly="yes" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="name" class="form-label">Nama Lengkap</label>
              <input class="form-control" type="text" id="name" name="name" value="{{ $student->name }}" autofocus />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="nickname" class="form-label">Panggilan</label>
              <input class="form-control" type="text" name="nickname" id="nickname" value="{{ $student->nickname }}" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="birth_place" class="form-label">Tempat Lahir</label>
              <input class="form-control" type="text" id="birth_place" name="birth_place" value="{{ $student->birth_place }}" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="birth_date" class="form-label">Tanggal Lahir</label>
              <input class="form-control" type="text" name="birth_date" id="birth_date" value="{{ $student->birth_date }}" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="own_phone" class="form-label">Telephone</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">ID (+62)</span>
                <input class="form-control" type="text" name="own_phone" id="own_phone" value="{{ $student->own_phone }}" />
              </div>
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="address" class="form-label">Alamat</label>
              <input class="form-control" type="text" id="address" name="address" value="{{ $student->address }}" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="hamlet" class="form-label">Kampung</label>
              <input class="form-control" type="text" name="hamlet" id="hamlet" value="{{ $student->hamlet }}" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="village" class="form-label">Desa/ Kelurahan</label>
              <input class="form-control" type="text" id="village" name="village" value="{{ $student->village }}" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="district" class="form-label">Kecamatan</label>
              <input class="form-control" type="text" name="district" id="district" value="{{ $student->district }}" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="city" class="form-label">Kota/ Kabupaten</label>
              <input class="form-control" type="text" id="city" name="city" value="{{ $student->city }}" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="postal_code" class="form-label">Kode Pos</label>
              <input class="form-control" type="text" name="postal_code" id="postal_code" value="{{ $student->postal_code }}" />
            </div>
          </div>
      </div>
      <hr class="my-0">
      <div class="card-body">
          <div class="row">
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="hobby" class="form-label">Hobby</label>
              <input class="form-control" type="text" name="hobby" id="hobby" value="{{ $student->hobby }}" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="sport" class="form-label">Olahraga</label>
              <input class="form-control" type="text" id="sport" name="sport" value="{{ $student->sport }}" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="ambition" class="form-label">Cita-cita</label>
              <input class="form-control" type="text" name="ambition" id="ambition" value="{{ $student->ambition }}" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
              <label for="role" class="form-label">Role</label>
              <input class="form-control" type="text" name="role" id="role" value="{{ $student->role }}" />
            </div>
            <div class="mb-3 col-md-8">
              <label for="skills" class="form-label">Skill</label>
              <select id="skills" name="skills" class="select2 form-select">
                <option value="{{ $student->skills ?: '' }}">{{ $student->skills ?: 'Select' }}</option>
                <option>Office</option>
                <option>Design</option>
                <option>Editing</option>
                <option>Wordpress</option>
                <option>Frontend</option>
                <option>Backend</option>
                <option>Fullstack</option>
              </select>
            </div>
            <div class="mt-4">
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-label-secondary">Discard</button>
            </div>
        </form>
      </div>
      <!-- /Account -->
    </div>
  </div>
</div>
@endsection
