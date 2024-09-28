@php
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Account settings - Pages')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/select2/select2.scss',
    'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
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
    'resources/assets/vendor/libs/flatpickr/flatpickr.js',
  'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite([
  'resources/assets/js/pages-account-settings-billing.js',
])
@endsection

@section('content')
@if (session()->has('success') || session()->has('danger'))
<div class="alert alert-{{ session('success') ? 'success' : 'danger' }} d-flex align-items-center py-3 mb-4" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
  <div class="ms-2">
    {{ session('success') ?: session('danger') }}.
  </div>
</div>
@else
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Tasks
</h4>
@endif

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
        <form action="{{ $task ? route('pages-account-settings-tasks-update', ['id' => $task->id]) : route('pages-account-settings-tasks-store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="mb-3 col-sm-6 col-lg-3">
              <label for="date" class="form-label">Date</label>
              <input type="text" id="date" name="date" class="form-control" value="{{ $task ? $task->date : '' }}" required />
            </div>
            <div class="mb-3 col-sm-6 col-lg-3">
              <label for="semester" class="form-label">Semester</label>
              <select id="semester" class="form-select" name="semester" required>
                <option selected {{ $task ? '' : 'disabled' }} value="{{ $task ? $task->semester : '' }}">{{ $task ? $task->semester : 'Select' }}</option>
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
              <select id="project_id" class="form-select select2" name="project_id" onchange="showProject(this.value)" required>
                <option selected {{ $task ? '' : 'disabled' }} value="{{ $task ? $task->project_id : '' }}">{{ $task ? $task->project_name : 'Select' }}</option>
                @foreach ($projects as $item)
                    <option value="{{ $item->id }}">{{ $item->subject .' - '. $item->theme }}</option>
                @endforeach
              </select>
              <input type="hidden" id="project_name" name="project_name" class="form-control" value="{{ $task ? $task->project_name : '' }}" />
            </div>
            <div class="mb-3 col-sm-6 col-lg-3">
              <label for="deadline" class="form-label">Deadline</label>
              <input class="form-control" type="text" id="deadline" name="deadline" value="{{ $task ? $task->deadline : '' }}"/>
            </div>
            <div class="mb-3 col-sm-6 col-lg-3">
              <label for="status" class="form-label">Status</label>
              <select id="status" class="form-select" name="status">
                <option selected {{ $task ? '' : 'disabled' }} value="{{ $task ? $task->status : '' }}">{{ $task ? $task->status : 'Select' }}</option>
                <option>Not Started</option>
                <option>In Progress</option>
                <option>Completed</option>
                <option>On Hold</option>
                <option>Canceled</option>
              </select>
            </div>
            <div class="mb-3 col-sm-6 col-lg-3">
              <label for="name" class="form-label">Task Name</label>
              <input type="text" id="name" name="name" class="form-control" value="{{ $task ? $task->name : '' }}" required/>
            </div>
            <div class="mb-3 col-sm-6 col-lg-3">
              <label for="media" class="form-label">Media</label>
              <select id="media" class="form-select" name="media">
                <option selected {{ $task ? '' : 'disabled' }} value="{{ $task ? $task->media : '' }}">{{ $task ? $task->media : 'Select' }}</option>
                <option>Google Drive</option>
                <option>Youtube</option>
                <option>Instagram</option>
                <option>Tiktok</option>
              </select>
            </div>
            <div class="mb-3 col-sm-6 col-lg-4">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" type="text" id="description" name="description" cols="30" rows="4">{{ $task ? $task->description : '' }}</textarea>
            </div>
            <div class="mb-3 col-sm-6 col-lg-4">
              <label for="embed" class="form-label">Embed</label>
              <textarea class="form-control" type="text" id="embed" name="embed" cols="30" rows="4">{{ $task ? $task->embed : '' }}</textarea>
            </div>
            <div class="mb-3 col-sm-6 col-lg-4">
              <label for="link" class="form-label">Link</label>
              <textarea class="form-control" type="text" id="link" name="link" cols="30" rows="4">{{ $task ? $task->link : '' }}</textarea>
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
              <th>ID</th>
              <th>Date</th>
              <th>Project</th>
              <th>Task</th>
              <th>Rating</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tasks as $item)
            <tr class="{{ $task && $task->id == $item->id ? 'table-active' : '' }}">
              <td>{{ $item->id }}</td>
              <td>{{ $item->date }}</td>
              <td>{{ $item->project_name }}</td>
              <td>{{ $item->name }}</td>
              <td>
                  <div class="text-warning" style="font-size: 8px;">
                    @for ($i = 1; $i <= 5; $i++)
                      @if ($i <= $item->rate)
                          <i class="ti ti-star-filled ti-sm"></i>
                      @else
                          <i class="ti ti-star ti-sm"></i>
                      @endif
                    @endfor
                  </div>
              </td>
              <td>
                <a class="btn btn-sm btn-success" href="{{ $item->link }}" target="_blank"><i class="ti-xs ti ti-link me-1"></i></a>
                <a class="btn btn-sm btn-primary" href="{{ route('pages-account-settings-tasks', ['id' => $item->id]) }}"><i class="ti-xs ti ti-pencil me-1"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!--/ History -->
    </div>
  </div>
</div>

<script>
  function showProject(id) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            document.getElementById('project_name').value = data.project.subject + ' - ' + data.project.theme;
            document.getElementById('deadline').value = data.project.end_date;
            document.getElementById('status').value = data.project.status;
            document.getElementById('description').value = data.project.description;
    console.log(data.project.status);
        }
    };
    xhr.open('GET', '/data/project/' + id, true);
    xhr.send();
  }
</script>

<!-- Modal -->
@include('_partials/_modals/modal-pricing')
<!-- /Modal -->

@endsection
