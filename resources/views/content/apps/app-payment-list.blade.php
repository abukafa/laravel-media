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
  <span class="text-muted fw-light">Finance /</span> Payment
</h4>

<!-- Invoice List Table -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="invoice-list-table table border-top">
      <thead>
        <tr>
          <th>No</th>
          <th>Date</th>
          <th>Invoice</th>
          <th>Month</th>
          <th>Period</th>
          <th>Items</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($payments as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->date }}</td>
              <td>{{ $item->invoice }}</td>
              <td>{{ $item->billing }}</td>
              <td>{{ $item->period }}</td>
              <td>{{ $item->items }}</td>
              <td>PAID</td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
