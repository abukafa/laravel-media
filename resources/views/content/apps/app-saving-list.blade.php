@extends('layouts/layoutMaster')

@section('title', 'Invoice List - Pages')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss'
])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/moment/moment.js',
  'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'
])
@endsection

@section('page-script')
@vite('resources/assets/js/app-invoice-list.js')
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Finance /</span> Saving
</h4>

<!-- Invoice List Widget -->

<div class="card mb-4">
  <div class="card-widget-separator-wrapper">
    <div class="card-body card-widget-separator">
      <div class="row gy-4 gy-sm-1">
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
            <div>
              <h3 class="mb-1">{{ $total['expenses'] }}</h3>
              <p class="mb-0">Expenses</p>
            </div>
            <span class="avatar me-sm-4">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti ti-user ti-md"></i></span>
            </span>
          </div>
          <hr class="d-none d-sm-block d-lg-none me-4">
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
            <div>
              <h3 class="mb-1">{{ number_format($total['credit'], '0', '.', ',') }}</h3>
              <p class="mb-0">Credits</p>
            </div>
            <span class="avatar me-lg-4">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti ti-file-invoice ti-md"></i></span>
            </span>
          </div>
          <hr class="d-none d-sm-block d-lg-none">
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
            <div>
              <h3 class="mb-1">{{ number_format($total['debit'], '0', '.', ',') }}</h3>
              <p class="mb-0">Debits</p>
            </div>
            <span class="avatar me-sm-4">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti ti-checks ti-md"></i></span>
            </span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h3 class="mb-1">{{ number_format($total['balance'], '0', '.', ',') }}</h3>
              <p class="mb-0">Balance</p>
            </div>
            <span class="avatar">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti ti-circle-off ti-md"></i></span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Invoice List Table -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="invoice-list-table table border-top">
      <thead>
        <tr>
          <th>No</th>
          <th>Date</th>
          <th>Credit</th>
          <th>Debit</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($savings as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ date('M j, Y', strtotime($item->date)) }}</td>
              <td class="text-end">{{ number_format($item->credit, '0', '.', ',') ?: 0 }}</td>
              <td class="text-end">{{ number_format($item->debit, '0', '.', ',') ?: 0 }}</td>
              <td>{{ $item->note }}</td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
