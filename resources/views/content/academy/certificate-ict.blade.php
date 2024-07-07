@extends('layouts/layoutMaster')

@section('title', 'Invoice (Print version) - Pages')

@section('page-style')
@vite('resources/assets/vendor/scss/pages/app-invoice-print.scss')
@endsection

@section('page-script')
@vite('resources/assets/js/app-invoice-print.js')
@endsection

@section('content')

<style>
  .background-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    /* height: 100%; */
    object-fit: cover;
    z-index: 1; /* Menempatkan elemen di bawah semua elemen lainnya */
  }
  .content {
    position: relative; /* Menjaga elemen konten tetap di atas */
    z-index: 2; /* Memastikan elemen konten tetap di atas */
    margin: 0;
    padding-top: 15em;
  }
  .nama {
    margin-left: 14.5em;
  }
  .nomor {
    margin-left: 34.2em;
  }
  .hasil {
    margin-top: 8.8em;
    margin-left: 28.5em;
  }
  .mentor {
    margin-top: 10.5em;
    margin-left: 42.7em;
  }
</style>

<div class="invoice-print">
  @php
    $subject = strtolower($data->subject) . ' ' . strtolower($data->item);
    $fileName = str_replace(' ', '-', $subject);
    $number = str_replace('-', '', $data->date) . str_pad($data->id, 3, '0', STR_PAD_LEFT);
  @endphp
  <img src="{{ file_exists(public_path('storage/sertifikat/' . $fileName . '.png')) ? asset('storage/sertifikat/' . $fileName . '.png') : asset('assets/img/avatars/no.png') }}" class="background-image" />
  <div class="container content">
    <h1 class="text-center nama">{{ $data->student }}</h1>
    <p class="text-center pt-2 nomor">{{ 'NO : ' . $number  }}</p>
    <h5 class="text-center hasil">Predicate: <strong>{{ $data->result }}</strong></h5>
    <h5 class="mentor">{{ $data->mentor }}</h5>
  </div>
</div>
@endsection
