@extends('layouts/layoutMaster')

@section('title', 'Invoice (Print version) - Pages')

@section('page-style')
@vite('resources/assets/vendor/scss/pages/app-invoice-print.scss')
@endsection

@section('page-script')
@vite('resources/assets/js/app-invoice-print.js')
@endsection

@section('content')
<div class="invoice-print p-5">

  <div class="d-flex justify-content-between flex-row">
    <div class="mb-4">
      <div class="d-flex svg-illustration mb-3 gap-2">
        <div class="app-brand-logo demo">@include('_partials.macros',["height"=>22,"withbg"=>''])</div>
        <span class="app-brand-text fw-bold">
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

  <div class="table-responsive">
    <table class="table mt-5">
      <thead class="table-light">
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
          <td style="word-wrap: break-word;">{{ ($item->competence_1 == '' ? '' : ($item->is_ok_1 == true ? 'Mampu ' : 'Belum mampu ') . $item->competence_1) . ($item->competence_2 == '' ? '' : ($item->is_ok_2 == true ? '. Mampu ' : '. Belum mampu ') . $item->competence_2) . ($item->competence_3 == '' ? '' : ($item->is_ok_3 == true ? '. Mampu ' : '. Belum mampu ') . $item->competence_3) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="row mt-5">
    <div class="col-12">
      <em>Ciamis, {{ date('j M Y') }}</em>
    </div>
  </div>
</div>
@endsection
