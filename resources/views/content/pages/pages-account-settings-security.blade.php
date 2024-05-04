@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Account settings - Security')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/select2/select2.scss',
  'resources/assets/vendor/libs/@form-validation/form-validation.scss'
])
@endsection

<!-- Page Styles -->
@section('page-style')
@vite(['resources/assets/vendor/scss/pages/page-account-settings.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/select2/select2.js',
  'resources/assets/vendor/libs/@form-validation/popular.js',
  'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
  'resources/assets/vendor/libs/@form-validation/auto-focus.js',
  'resources/assets/vendor/libs/cleavejs/cleave.js',
  'resources/assets/vendor/libs/cleavejs/cleave-phone.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite([
  'resources/assets/js/pages-account-settings-security.js',
  'resources/assets/js/modal-enable-otp.js'
])
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
  <span class="text-muted fw-light">Account Settings /</span> Security
</h4>
@endif

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-row mb-4 justify-content-center justify-content-md-start">
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-account')}}"><i class="ti-xs ti ti-users me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-lock me-1"></i> Security</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-tasks')}}"><i class="ti-xs ti ti-file-description me-1"></i> Tasks</a></li>
    </ul>
  </div>
  <!-- Change Password -->
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Change Password</h5>
      <div class="card-body">
        <form action="{{ route('pages-account-settings-security-password') }}" method="POST">
          @csrf
          <div class="row">
            <div class="mb-3 col-12 form-password-toggle">
              <label class="form-label" for="currentPassword">Current Password</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required/>
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-12 form-password-toggle">
              <label class="form-label" for="newPassword">New Password</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" id="newPassword" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required/>
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>

            <div class="mb-3 col-12 form-password-toggle">
              <label class="form-label" for="confirmPassword">Confirm New Password</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required/>
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
            <div class="col-12 mb-4">
              <h6>Password Requirements:</h6>
              <ul class="ps-3 mb-0">
                <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                <li class="mb-1">At least one lowercase character</li>
                <li>At least one number, symbol, or whitespace character</li>
              </ul>
            </div>
            <div>
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-label-secondary">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--/ Change Password -->

  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Change Username</h5>
      <div class="card-body">
        <form action="{{ route('pages-account-settings-security-username') }}" method="POST">
          @csrf
          <div class="row">
            <div class="mb-3 col-12">
              <label class="form-label" for="email">Email</label>
              <input class="form-control" type="email" name="email" id="email" value="{{ $student->email }}" required/>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-12">
              <label class="form-label" for="instagram">Instagram</label>
              <input class="form-control" type="text" id="instagram" name="instagram" value="{{ $student->instagram }}" required/>
            </div>
            <div class="col-12 mb-4">
              <h6>Username Requirements:</h6>
              <ul class="ps-3 mb-0">
                <li class="mb-1">Minimum 4 characters long - the more, the better</li>
                <li class="mb-1">Don't use space in your username</li>
                <li>Must be unique from other user</li>
              </ul>
            </div>
            <div>
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-label-secondary">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
