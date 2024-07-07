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
  <span class="text-muted fw-light">Academy /</span> Awards
</h4>

<!-- Invoice List Table -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="invoice-list-table table border-top">
      <thead>
        <tr>
          <th>No</th>
          <th>Date</th>
          <th>Name</th>
          <th>Subject</th>
          <th>Result</th>
          <th>Certificate</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($awards as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->student }}</td>
            <td>{{ $item->subject .' - '. $item->item }}</td>
            <td>
              <span class="text-warning" style="font-size: 8px;">
                @for ($i = 1; $i <= 5; $i++)
                  @if ($i <= $item->rate)
                      <i class="ti ti-star-filled ti-sm"></i>
                  @else
                      <i class="ti ti-star ti-sm"></i>
                  @endif
                @endfor
              </span>
            </td>
            <td>
              <a href="awards/{{ strtolower($item->subject) }}/{{ $item->id }}" target="_blank" class="btn btn-sm btn-primary">View</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
