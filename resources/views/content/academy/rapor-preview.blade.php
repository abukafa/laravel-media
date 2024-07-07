@extends('layouts/layoutMaster')

@section('title', 'Preview - Invoice')

@section('vendor-style')
@vite('resources/assets/vendor/libs/flatpickr/flatpickr.scss')
@endsection

@section('page-style')
@vite('resources/assets/vendor/scss/pages/app-invoice.scss')
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/moment/moment.js',
  'resources/assets/vendor/libs/flatpickr/flatpickr.js',
  'resources/assets/vendor/libs/cleavejs/cleave.js',
  'resources/assets/vendor/libs/cleavejs/cleave-phone.js'
])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/offcanvas-add-payment.js',
  'resources/assets/js/offcanvas-send-invoice.js'
])
@endsection


@section('content')
<style>
  @media print {
    html,
body {
  background: white !important;
}

.invoice-print {
  min-width: 768px !important;
  font-size: 15px !important;

  svg {
    fill: #333 !important; /* Assuming $body-color is a shade of gray */
  }
}

.invoice-print * {
  border-color: rgba(0, 0, 0, 0.5) !important;
  color: #333 !important; /* Assuming $body-color is a shade of gray */
}

/* Dark style jika diaktifkan */
.dark-style .invoice-print th {
  color: white !important;
}
  .navbar {
    display: none !important; /* Menyembunyikan navbar saat mencetak */
  }
}
</style>
<div class="row invoice-preview">
  <!-- Invoice -->
  <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
    <div class="card invoice-preview-card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
          <div class="mb-xl-0 mb-4">
            <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
              <div class="app-brand-logo demo">@include('_partials.macros',["height"=>22,"withbg"=>''])</div>
              <span class="app-brand-text fw-bold fs-4">
                {{ $data->school->name }}
              </span>
            </div>
            <p class="mb-2">{{ $data->school->address }}</p>
            <p class="mb-2">{{ $data->school->email }}</p>
            <p class="mb-0">{{ $data->school->phone }}</p>
          </div>
          <div>
            <h4 class="fw-medium mb-2">RAPOR {{ $data->semester }}</h4>
            <div class="mb-2 pt-1">
              <span class="fw-medium">{{ Auth::user()->name }}</span>
            </div>
            <div class="pt-1">
              <span class='ti ti-user me-2'></span>
              <span class="fw-medium">{{ Auth::user()->nis }}</span>
            </div>
            <div class="pt-1">
              <span class='ti ti-calendar me-2'></span>
              <span class="fw-medium">{{ Auth::user()->registered }}</span>
            </div>
          </div>
        </div>
      </div>
      <div class="table-responsive border-top">
        <table class="table">
          <thead>
            <tr>
              <th>SUBJECT</th>
              <th colspan="2">SCORE</th>
              <th>DESCRIPTION</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data->scores as $item)
            @php
              $subject = explode('-', $item->subject);
            @endphp
            <tr>
              <td>
                  <div class="media-body align-self-center">
                      <h6 class="mb-0">{{ trim($subject[0]) }}</h6>
                      <span>{{ trim($subject[1]) }}</span>
                  </div>
              </td>
              <td>{{ $item->month_6 }}</td>
              <td>{{ app('convertToGrade')($item->month_6) }}</td>
              <td style="word-wrap: break-word;">{{ ($item->is_ok_1 ? 'Mampu ' : 'Belum mampu ') . $item->competence_1 . ($item->is_ok_2 ? '. Mampu ' : '. Belum mampu ') . $item->competence_2 }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="card-body mx-3 mt-5">
        <div class="row">
          <div class="col-12">
            <em>Ciamis, {{ date('j M Y') }}</em>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Invoice -->

  <!-- Invoice Actions -->
  <div class="col-xl-3 col-md-4 col-12 invoice-actions">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-label-secondary d-grid w-100 mb-2" href="{{url('academy/dashboard')}}">
          Dashboard
        </a>
        <a class="btn btn-primary d-grid w-100 mb-2" target="_blank" href="{{url('academy/rapor/print')}}">
          Print
        </a>
      </div>
    </div>
  </div>
  <!-- /Invoice Actions -->
</div>

<!-- Offcanvas -->
@include('_partials/_offcanvas/offcanvas-send-invoice')
@include('_partials/_offcanvas/offcanvas-add-payment')
<!-- /Offcanvas -->
@endsection
