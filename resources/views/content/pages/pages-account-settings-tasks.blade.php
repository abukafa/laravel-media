@php
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Account settings - Pages')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/select2/select2.scss',
  'resources/assets/vendor/libs/@form-validation/form-validation.scss',
  'resources/assets/vendor/libs/animate-css/animate.scss',
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss',
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss'
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
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.js',
  'resources/assets/vendor/libs/moment/moment.js',
  'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite([
  'resources/assets/js/pages-pricing.js',
  'resources/assets/js/pages-account-settings-billing.js',
  'resources/assets/js/app-invoice-list.js',
  'resources/assets/js/modal-edit-cc.js'
])
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Tasks
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-row mb-4 justify-content-center justify-content-md-start">
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-account')}}"><i class="ti-xs ti ti-users me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-security')}}"><i class="ti-xs ti ti-lock me-1"></i> Security</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-file-description me-1"></i> Tasks</a></li>
    </ul>
    <div class="card mb-4">
      <!-- Billing Address -->
      <h5 class="card-header">Project Tasks</h5>
      <div class="card-body">
        <form id="formAccountSettings" onsubmit="return false">
          <div class="row">
            <div class="mb-3 col-sm-6 col-lg-3">
              <label for="date" class="form-label">Date</label>
              <input type="text" id="date" name="date" class="form-control" />
            </div>
            <div class="mb-3 col-sm-6 col-lg-3">
              <label for="semester" class="form-label">Semester</label>
              <select id="semester" class="form-select select2" name="semester">
                <option>Select</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
              </select>
            </div>
            <div class="mb-3 col-sm-6 col-lg-6">
              <label for="project_id" class="form-label">Project Theme</label>
              <select id="project_id" class="form-select select2" name="project_id">
                <option>Select</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
              </select>
              <input type="hidden" id="project_name" name="project_name" class="form-control" />
            </div>
            <div class="mb-3 col-sm-6 col-lg-3">
              <label for="deadline" class="form-label">Deadline</label>
              <input class="form-control" type="text" id="deadline" name="deadline" />
            </div>
            <div class="mb-3 col-sm-6 col-lg-3">
              <label for="status" class="form-label">Status</label>
              <select id="status" class="form-select select2" name="status">
                <option>Not Started</option>
                <option>In Progress</option>
                <option>Completed</option>
                <option>On Hold</option>
                <option>Canceled</option>
              </select>
            </div>
            <div class="mb-3 col-sm-6 col-lg-6">
              <label for="name" class="form-label">Task Name</label>
              <input type="text" id="name" name="name" class="form-control" />
            </div>
            <div class="mb-3 col-sm-6 col-lg-8">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" type="text" id="description" name="description" ></textarea>
            </div>
            <div class="mb-3 col-sm-6 col-lg-4">
              <label for="link" class="form-label">Link</label>
              <textarea class="form-control" type="text" id="link" name="link" ></textarea>
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            <button type="reset" class="btn btn-label-secondary">Discard</button>
          </div>
        </form>
      </div>
      <!-- /Billing Address -->
    </div>
    <div class="card">
      <!-- History -->
      <h5 class="card-header">My Tasks History</h5>
      <div class="card-datatable table-responsive">
        <table class="invoice-list-table table border-top">
          <thead>
            <tr>
              <th>No</th>
              <th>Date</th>
              <th>Project</th>
              <th>Task</th>
              <th>Status</th>
              <th><i class='ti ti-trending-up'></i></th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tasks as $item)
            <tr>
              <th>{{ $loop->iteration }}</th>
              <th>{{ $item->date }}</th>
              <th>{{ $item->project_name }}</th>
              <th>{{ $item->name }}</th>
              <th>{{ $item->status }}</th>
              <th></th>
              <th></th>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!--/ History -->
    </div>
  </div>
</div>

<!-- Modal -->
@include('_partials/_modals/modal-pricing')
<!-- /Modal -->

@endsection
