@extends('layouts/layoutMaster')

@section('title', 'Academy Course Details - Apps')

@section('vendor-style')
<link href="https://vjs.zencdn.net/7.21.1/video-js.css" rel="stylesheet" />

@section('vendor-script')
<script src="https://vjs.zencdn.net/7.21.1/video.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/videojs-youtube/dist/Youtube.min.js"></script>
@endsection

@section('content')
<h4 class="pt-3 mb-0">
  <span class="text-muted fw-light">Academy /</span> Course Details
</h4>

<div class="card g-3 mt-5">
  <div class="card-body row g-3">
    <div class="col-lg-8">
      <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
        <div class="me-1">
          <h5 class="mb-1">{{ $item->name }}</h5>
          <p class="mb-1"><span class="fw-medium">Jaz Academy</span></p>
        </div>
        <div class="d-flex align-items-center">
          <span class="badge bg-label-danger">{{ $item->subject }}</span>
          <i class='ti ti-share ti-sm mx-4'></i>
          <i class='ti ti-bookmarks ti-sm'></i>
        </div>
      </div>
      <div class="card academy-content shadow-none border">
        <div class="p-2">
          <!-- VIDEOJS -->
          <div class="cursor-pointer">
            @php
              $videoUrl = $item->video_url;
              if (Str::contains($videoUrl, 'youtube.com') || Str::contains($videoUrl, 'youtu.be')) {
                  preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoUrl, $matches);
                  $youtubeId = $matches[1] ?? null;
                  $src = "https://www.youtube.com/embed/$youtubeId";
                  $type = "video/youtube"; 
              } else {
                  $src = $videoUrl; 
                  $type = "video/mp4"; 
              }
            @endphp
            <video
            class="video-js w-100"
            controls
            preload="auto"
            height="360"
            data-setup='{}'>
              <source src="{{ $src }}" type="{{ $type }}">
            </video>
          </div>
        </div>
        <div class="card-body">
          <h5 class="mb-2">About this course</h5>
          <p class="mb-0 pt-1">{{ $item->note }}</p>
          <hr class="my-4">
          <div class="d-flex flex-wrap">
            <div class="me-5">
              <p class="text-nowrap"><i class='ti ti-checks ti-sm me-2 mt-n2'></i>Skill level: All Levels</p>
              <p class="text-nowrap"><i class='ti ti-flag ti-sm me-2 mt-n2'></i>Languages: English</p>
            </div>
            <div>
              <p class="text-nowrap"><i class='ti ti-pencil ti-sm me-2 mt-n2'></i>Lectures: {{ count($items) }}</p>
              <p class="text-nowrap "><i class='ti ti-clock ti-sm me-2 mt-n2'></i>Durasi: {{ $item->video_duration }}</p>
            </div>
          </div>
          <hr class="mb-4 mt-2">
          <h5>Description</h5>
          <p class="mb-4">
            {{ $item->description }}
          </p>
          <hr class="my-4">
          <h5>Instructor</h5>
          <div class="d-flex justify-content-start align-items-center user-name">
            <div class="avatar-wrapper">
              <div class="avatar me-2"><img src="{{asset('assets/img/avatars/11.png')}}" alt="Avatar" class="rounded-circle"></div>
            </div>
            <div class="d-flex flex-column">
              <span class="fw-medium">Unknown</span>
              <small class="text-muted">Developer and Teacher</small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="accordion stick-top accordion-bordered" id="courseContent">
        @foreach ($items->groupBy('section') as $section => $sectionItems)
            <div class="accordion-item">
                <div class="accordion-header" id="heading{{ $loop->index }}">
                    <button type="button" class="accordion-button bg-lighter rounded-0 {{ $loop->first ? '' : 'collapsed' }}"
                            data-bs-toggle="collapse"
                            data-bs-target="#chapter{{ $loop->index }}"
                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                            aria-controls="chapter{{ $loop->index }}">
                        <span class="d-flex flex-column">
                            <span class="h5 mb-1">{{ $section }}</span>
                            <span class="fw-normal text-body">{{ count($sectionItems) }} | {{ $sectionItems->sum('duration') }} min</span>
                        </span>
                    </button>
                </div>
                <div id="chapter{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#courseContent">
                    <div class="accordion-body py-3 border-top">
                        @foreach ($sectionItems as $item)
                            <div class="form-check d-flex align-items-center mb-3">
                                <input class="form-check-input" type="checkbox" id="check{{ $item->id }}" />
                                <label for="check{{ $item->id }}" class="form-check-label ms-3">
                                    <a href="/academy/course/{{ $item->id }}" class="mb-0 h6">{{ $item->title }}</a>
                                    <span class="text-muted d-block">{{ $item->duration }} min</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection
