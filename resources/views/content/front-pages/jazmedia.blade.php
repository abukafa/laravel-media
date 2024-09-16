@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/jazmediaMaster')

@section('title', 'Dashboard')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/fontawesome-free-6.3.0-web/css/all.css',
  'resources/assets/vendor/libs/Swiper/swiper-bundle.min.css'
])
@endsection

<!-- Page Styles -->
@section('page-style')
@vite('resources/css/jazmedia.css')
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite('resources/assets/vendor/libs/Swiper/swiper-bundle.min.js')
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite([
  'resources/js/jazmedia-main.js'
])
@endsection

<!-- Page Content -->
@section('content')
  <!-- ...................Start Navbar................... -->
  @include('content.front-pages.jazmedia-navbar')
  <!-- ...................Start Navbar................... -->

  <!-- ...................Start Main Section................... -->
  <main>
      <div class="container main-container">


          <!--================== Main Left Start ==================  -->
          @include('content.front-pages.jazmedia-mainLeft')
          <!--==================  Main Left End =================== -->


          <!--================== Main Middle Start================== -->
          <div class="main-middle">

              <div class="middle-container">

                @if (request()->query('bookmarks'))

                <div class="profile-info">
                  <div>
                    <h1>{{ session('participant') ? session('participant')->name : 'Annonimous' }}</h1>
                    <p>{{ session('participant') ? '@' . session('participant')->username : '@jazmedia' }}</p>
                    <div style="display: flex; justify-content: center;" id="my-profile-picture">
                      <img src="{{ file_exists(public_path('storage/' . session('participant')->image)) ? asset('storage/' . session('participant')->image) : asset('assets/img/avatars/no.png') }}" >
                    </div>
                  </div>
                </div>

                <!--...........Start Stories............. -->
                <div class="stories">
                    <div class="stories-wrappper swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="story swiper-slide" style="display: none">
                                <img src="" alt="">
                                <label for="add-story" class="add-story">
                                    <i class="fa fa-add" id="upload"></i>
                                    <p>Add Your <br> Story</p>
                                </label>
                                <input type="file" accept="image/jpg,image/png,image/jpeg" id="add-story">
                            </div>
                            @foreach ($student as $item)
                              <div class="story swiper-slide">
                                  <img src="{{ file_exists(public_path('storage/stories/' . $item->id . '-0.png')) ? asset('storage/stories/' . $item->id . '-0.png') : asset('assets/img/avatars/no.png') }}" alt="" loading="lazy">
                              </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <script>
                  //.................Start Add story................
                  let addStory = document.querySelector('#add-story');

                  addStory.addEventListener('change', () => {
                    document.querySelector('.story img').src = URL.createObjectURL(document.querySelector('#add-story').files[0]);
                    document.querySelector('.add-story').style.display = 'none';
                  });
                </script>
                <!--...........Start Stories............. -->

                @else

                <!--...........Start Stories............. -->
                <div class="stories">
                    <div class="stories-wrappper swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="story swiper-slide" style="display: none">
                                <img src="" alt="">
                                <div class="profile-picture " id="my-profile-picture">
                                    <img src="{{ (session('participant') && file_exists(public_path('storage/' . session('participant')->image))) ? asset('storage/' . session('participant')->image) : asset('assets/img/avatars/no.png') }}" alt="">
                                </div>
                                <label for="add-story" class="add-story">
                                    <i class="fa fa-add" id="upload"></i>
                                    <p>Add Your <br> Story</p>
                                </label>
                                <input type="file" accept="image/jpg,image/png,image/jpeg" id="add-story">
                            </div>

                            @foreach ($student as $item)
                              <div class="story swiper-slide">
                                  <img src="{{ file_exists(public_path('storage/stories/' . $item->id . '-0.png')) ? asset('storage/stories/' . $item->id . '-0.png') : asset('assets/img/avatars/no.png') }}" alt="" loading="lazy">
                                  <div class="profile-picture " >
                                      <img src="{{ file_exists(public_path('storage/member/' . $item->id . '.png')) ? asset('storage/member/' . $item->id . '.png') : asset('assets/img/avatars/no.png') }}" alt="" loading="lazy">
                                  </div>
                                  <p>{{ $item->nickname }}</p>
                              </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <script>
                  //.................Start Add story................
                  let addStory = document.querySelector('#add-story');

                  addStory.addEventListener('change', () => {
                    document.querySelector('.story img').src = URL.createObjectURL(document.querySelector('#add-story').files[0]);
                    document.querySelector('.add-story').style.display = 'none';
                  });
                </script>
                <!--...........Start Stories............. -->

                @endif

                <!--.............. Feed Aria Start............... -->
                <div class="feeds" id="feeds-load">
                  @include('content.front-pages.jazmedia-load')
                </div>
                <!--.............. Feed Aria End............... -->
              </div>

          </div>
          <!--================== Main Middle End==================  -->

          <!--==================  Main Right Start==================  -->
            @include('content.front-pages.jazmedia-mainRight')
          <!--==================  Main Right End================== -->


      </div>
  </main>
  <!-- ...................Start Main Section................... -->

  <!-- ...................Start PopUps Aria................... -->

  <!-- ................Alert-Popup............ -->
  @if (session('success') || session('danger') || $errors->any())
    <div class="popup alert-popup" style="display: flex">
        <div>
            <div class="popup-box alert-popup-box">
                <h3 class="text-bold">
                    {{ session('success') ?: (session('danger') ?: $errors->first()) }}
                </h3>
                <div style="margin-top: 30px">
                    <span class="close btn btn-{{ session('success') ? 'primary' : 'danger' }} btn-sm">OK</span>
                </div>
            </div>
        </div>
    </div>
  @endif
  <!-- ................End Alert-Popup............ -->

  <!-- ................Start Rating-Popup............ -->
  <div class="popup rating-popup" id="rating-popup">
    <div>
      <div class="popup-box rating-popup-box">
        <form method="POST" id="rating-form">
          @csrf
          <div class="serch-bar">
            <select type="text" class="form-select" name="teacher_id" id="teacher_id" onchange="accepter(this.value)" required>
              <option selected disabled value="">Mentor...</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
            <input type="hidden" class="form-control" name="teacher_name" id="teacher_name">
          </div>
          <div class="serch-bar">
            <select type="text" class="form-select" name="accepted" id="accepted" onchange="statusAccepted(this.value)" required>
                <option selected disabled value="">Accepted...</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            <input type="hidden" class="form-control" name="status" id="status_acceptation" value="In Progress">
          </div>
          <div class="stars" id="starRate">
            <span id="star1"><i class="fa-solid fa-star"></i></span>
            <span id="star2"><i class="fa-solid fa-star"></i></span>
            <span id="star3"><i class="fa-solid fa-star"></i></span>
            <span id="star4"><i class="fa-solid fa-star"></i></span>
            <span id="star5"><i class="fa-solid fa-star"></i></span>
          </div>
          <input type="hidden" class="form-control" name="rate" id="rate">

          <div class="serch-bar">
            <textarea type="search" class="form-control" name="review" id="review" placeholder="Review"></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-lg" id="btn-rate">Rate and Review</button>
        </form>
      </div>
      <span class="close"><i class="fa fa-close"></i></span>
    </div>
  </div>
  <!-- ................End Rating-Popup............ -->

  <!-- ................Start Notify-Popup............ -->
  <div class="popup notify-popup">
      <div>
          <div class="popup-box notify-popup-box">
              <!-- ...........Notification Box Start.......... -->
              <div class="messages">
                  <!-- ....Message top..... -->
                  <div class="message-top">
                      <h4>Notification</h4>
                  </div>
                  <!-- ....Searchbar... -->
                  <div class="messge-serch-bar"></div>
                  @php
                      $first_ten = $activities->take(7);
                  @endphp
                  @foreach ($first_ten as $item)
                    @php
                      $posted = new DateTime($item->created_at);
                      $now = new DateTime(date('Y-m-d'));
                      $diff = $now->diff($posted);
                      $days = $diff->days;
                      $formattedDiff = $diff->format('%y years, %m months, %d days');
                    @endphp
                    <div class="message">
                        <div class="profile-picture">
                            <img src="{{ file_exists(public_path('storage/member/' . $item->image)) ? asset('storage/member/' . $item->image) : asset('assets/img/avatars/no.png') }}" alt="">
                            @if ($days == 0)
                              <div class="green-active"></div>
                            @endif
                        </div>
                        <div class="notification-body">
                            @php
                                $parts = explode(' ', $item->name);
                            @endphp
                            <b>{{ (strlen($item->name) > 20) ? $parts[0] . ' ' . $parts[1] : $item->name }}</b> <small class="text-gry">{{ $posted->format('F, j') }}</small>
                            <p><a href="{{ ($item->media == "Instagram" || $item->media == "Tiktok") ? '/instagram?creator=' . $item->task_id : '/?creator=' . $item->task_id }}">{{ ucwords($item->task) }}</a> {{ $item->project_name }}</p>
                        </div>
                    </div>
                  @endforeach
              </div>
              <!-- ...........Notification Box End.......... -->
          </div>
          <span class="close"><i class="fa fa-close"></i></span>
      </div>
  </div>
  <!-- ................End Notify-Popup............ -->

  <!-- ................Start Add Post Popup............ -->
  <div class="popup add-post-popup">
      <div>
          <form class="popup-box add-post-pop">
              <h1>Add New Post</h1>
              <div class="row post-title">
                  <label>Title</label>
                  <input type="text" placeholder="What's on your mind ?" id="title-input">
              </div>
              <div class="row post-img">
                  <img src="" id="postIMg">
                  <label for="feed-pic-upload" class="feed-upload-button">
                      <span><i class="fa fa-add"></i></span>
                      Upload A Picture
                  </label>
                  <input type="file" accept="image/jpg, image/png, image/jpeg" id="feed-pic-upload">
                  <input type="submit" class="btn btn-primary btn-lg bbb" value="Add Post">
              </div>
          </form>
          <span class="close"><i class="fa fa-close"></i></span>
      </div>
  </div>
  <!-- ................End  Add Post Popup............ -->


  <!-- ................Start Theme Customize Popup............ -->
  <div class="popup theme-customize">
      <div>
          <div class="popup-box theme-customize-popup-box">
              <h1>Customize Your Theme</h1>
              <p>Manege Your Font Size, Color, and Background</p>

              <!-- ........Font Size....... -->
              <div class="font-size">
                  <h4>Font Size</h4>
                  <div>
                      <div>
                          <h6>Aa</h6>
                       </div>
                       <div class="choose-size">
                           <span class="font-size-1"></span>
                           <span class="font-size-2 " ></span>
                           <span class="font-size-3 active"></span>
                           <span class="font-size-4"></span>
                           <span class="font-size-5"></span>
                       </div>
                       <div>
                           <h3>Aa</h3>
                       </div>
                  </div>
              </div>
              <!-- ..........Primary Colors........ -->
              <div class="colors">
                  <h4>Color</h4>
                  <div class="choose-color">
                      <span class="color-1 active"></span>
                      <span class="color-2 "></span>
                      <span class="color-3 "></span>
                      <span class="color-4 "></span>
                      <span class="color-5 "></span>
                  </div>
              </div>
              <!-- ...........Background Colors.......... -->
              <div class="background">
                  <h4>Background</h4>
                  <div class="choose-bg">
                      <div class="bg1 active">
                          <span></span>
                          <h5 >Light</h5>
                      </div>
                      <div class="bg2">
                          <span></span>
                          <h5 >Dark</h5>
                      </div>
                  </div>
              </div>
          </div>
          <span class="close"><i class="fa fa-close"></i></span>
      </div>
  </div>
  <!-- ................End   Theme Customize Popup............ -->

  <!-- ...................End PopUps Aria................... -->

  @if ($task instanceof Illuminate\Pagination\LengthAwarePaginator && $task->hasPages())
    <script>
      // LOAD CODE
      document.addEventListener('DOMContentLoaded', function () {
          let nextPageUrl = '{{ $task->nextPageUrl() }}';
          let isLoading = false; // Flag untuk mencegah permintaan berulang

          window.addEventListener('scroll', function () {
              if (window.scrollY + window.innerHeight >= document.documentElement.scrollHeight - 100 && !isLoading) {
                  if (nextPageUrl) {
                      console.log('Pagination triggered. Next page URL:', nextPageUrl); // Debug: pagination triggered
                      loadMorePosts();
                  } else {
                      console.log('No more pages to load.'); // Debug: no more pages
                  }
              }
          });

          function loadMorePosts() {
              isLoading = true; // Set flag untuk mencegah permintaan berulang
              fetch(nextPageUrl, {
                  method: 'GET',
                  headers: {
                      'X-Requested-With': 'XMLHttpRequest' // Deteksi AJAX di server
                  }
              })
              .then(response => response.json())
              .then(data => {
                  console.log('Response received:', data); // Debug: AJAX response
                  if (data.view) {
                      nextPageUrl = data.nextPageUrl;
                      console.log('Posts loaded successfully. Next page URL:', nextPageUrl); // Debug: next page URL
                      document.getElementById('feeds-load').insertAdjacentHTML('beforeend', data.view);
                  } else {
                      console.log('No content received for the next page'); // Debug: no content
                      nextPageUrl = null; // Hentikan jika tidak ada konten lagi
                  }
                  isLoading = false; // Reset flag setelah data dimuat
              })
              .catch(error => {
                  console.error('Error loading more posts:', error); // Debug: error
                  isLoading = false; // Reset flag jika terjadi error
              });
          }
      });
    </script>
  @endif

  <script>
    document.getElementById('starRate').style.display = 'none';

    function accepter(id) {
      const selectedOption = event.target.options[id];
      const teacher_name = selectedOption.text;
      document.getElementById('teacher_name').value = teacher_name;
    }

    function statusAccepted(accept) {
      if (accept == 1) {
        document.getElementById('starRate').style.display = 'block';
        document.getElementById('status_acceptation').value = 'Completed';
      } else {
        document.getElementById('starRate').style.display = 'none';
        document.getElementById('status_acceptation').value = 'In Progress';
      }
    }

  </script>

@endsection



{{-- <script>
  // LIKE
  document.querySelectorAll('.like-button').forEach(element => {
      element.addEventListener('click', function() {
        var taskId = this.getAttribute('data-task-id'); // Ambil task ID dari atribut data
        var csrfToken = '{{ csrf_token() }}'; // Token CSRF untuk keamanan

        var xhr = new XMLHttpRequest();

        var url = '{{ route('task.like', ['id' => ':id']) }}'.replace(':id', taskId);
        console.log(url);

        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // Menetapkan header CSRF

        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4) {
            if (xhr.status === 200) {
              var response = JSON.parse(xhr.responseText);

              var actionButton = element.closest('.action-button');
              var likesCountElement = actionButton.nextElementSibling.querySelector('.likes-count');
              var likesFirstElement = actionButton.nextElementSibling.querySelector('.likes-first');
              var likesIcon = element.querySelector('.likes-icon');

              if (likesCountElement && likesIcon) {
                likesFirstElement.innerText = response.first_like;
                likesCountElement.innerText = response.likes_count;
                likesIcon.classList.toggle('liked');
              }
            } else {
              console.error('Error:', xhr.responseText);
            }
          }
        };

        xhr.send(JSON.stringify({ task_id: taskId }));
      });
    });

    // BOOKMARR
    document.querySelectorAll('.mark-button').forEach(element => {
      element.addEventListener('click', function () {
        var taskId = this.getAttribute('data-task-id'); // Ambil task ID dari atribut data
        var csrfToken = '{{ csrf_token() }}'; // Token CSRF untuk keamanan

        var xhr = new XMLHttpRequest();

        var url = `/task/${taskId}/bookmark`;

        console.log(url);

        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // Menetapkan header CSRF

        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4) {
            if (xhr.status === 200) {
              var response = JSON.parse(xhr.responseText);

              var marksIcon = element.querySelector('.marks-icon');
              if (marksIcon) {
                marksIcon.classList.toggle('booked');
              }
            } else {
              console.error('Error:', xhr.responseText);
            }
          }
        };

        xhr.send(JSON.stringify({ task_id: taskId }));
      });
    });
</script> --}}
