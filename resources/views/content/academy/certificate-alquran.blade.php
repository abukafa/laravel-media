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
    padding-top: 19.2em;
  }
  .juz {
    padding-right: 8.3em;
  }
  .nama {
    padding-top: 2.8em;
    padding-right: 1em;
  }
  .nomor {
    padding-right: 2.1em;
  }
  .hasil {
    padding-top: 7.7em;
    padding-left: 27em;
  }
  .mentor {
    padding-top: 13.5em;
    padding-right: 19.5em;
  }
</style>

<div class="invoice-print">
  @php
    $subject = strtolower($data->subject) . ' ' . strtolower(substr($data->item,0,5));
    $fileName = str_replace(' ', '-', $subject);
    $number = str_replace('-', '', $data->date) . str_pad($data->id, 3, '0', STR_PAD_LEFT);
  @endphp
  <img src="{{ file_exists(public_path('storage/sertifikat/' . $fileName . '.png')) ? asset('storage/sertifikat/' . $fileName . '.png') : asset('assets/img/avatars/no.png') }}" class="background-image" />
  <div class="container content">
    <h1 class="display-1 text-center juz"><strong>{{ substr($data->item,6,2) }}</strong></h1>
    <h1 class="text-end nama">{{ $data->student }}</h1>
    <p class="text-end pt-2 nomor">{{ 'NO : ' . $number  }}</p>
    <h5 class="text-center hasil"><strong>{{ $data->result }}</strong></h5>
    <h5 class="text-end mentor">{{ $data->mentor }}</h5>
  </div>
</div>
@endsection
