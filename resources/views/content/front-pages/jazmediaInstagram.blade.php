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

              <!--================== Main Middle instagram ================== -->
              <div class="instagram-container"  id="feeds-load">
                @include('content.front-pages.jazmedia-instagram')
              </div>
              <!--================== Main Middle instagram ==================  -->

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
                      $first_ten = $task->take(7);
                  @endphp
                  @foreach ($first_ten as $item)
                    @php
                      $posted = new DateTime($item->updated_at);
                      $now = new DateTime(date('Y-m-d'));
                      $diff = $now->diff($posted);
                      $days = $diff->days;
                      $formattedDiff = $diff->format('%y years, %m months, %d days');
                    @endphp
                    <div class="message">
                        <div class="profile-picture">
                            <img src="{{ file_exists(public_path('storage/member/' . $item->student_id . '.png')) ? asset('storage/member/' . $item->student_id . '.png') : asset('assets/img/avatars/no.png') }}" alt="">
                            @if ($days == 0)
                              <div class="green-active"></div>
                            @endif
                        </div>
                        <div class="notification-body">
                            @php
                                $parts = explode(' ', $item->student_name);
                            @endphp
                            <b>{{ (strlen($item->student_name) > 20) ? $parts[0] . ' ' . $parts[1] : $item->student_name }}</b> <small class="text-gry">{{ $posted->format('F, j') }}</small>
                            <p>{{ ucwords($item->name) }} <span class="text-gry">{{ $item->date }}</span></p>
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

                    // Inisialisasi ulang embeds Instagram
                    if (window.instgrm) {
                        window.instgrm.Embeds.process();
                    }
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
    document.querySelectorAll('.like-button').forEach(element => {
      element.addEventListener('click', function() {
        var taskId = this.getAttribute('data-task-id'); // Ambil task ID dari atribut data
        var csrfToken = '{{ csrf_token() }}'; // Token CSRF untuk keamanan

        var xhr = new XMLHttpRequest();

        var url = '{{ route('task.like', ['id' => ':id']) }}'.replace(':id', taskId);

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

    document.querySelectorAll('.mark-button').forEach(element => {
      element.addEventListener('click', function() {
        var taskId = this.getAttribute('data-task-id'); // Ambil task ID dari atribut data
        var csrfToken = '{{ csrf_token() }}'; // Token CSRF untuk keamanan

        var xhr = new XMLHttpRequest();

        var url = '{{ route('task.bookmark', ['id' => ':id']) }}'.replace(':id', taskId);

        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // Menetapkan header CSRF

        xhr.onreadystatechange = function() {
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

    // RATING AJAX
    function rateTask(id) {
      document.getElementById('rating-popup').style.display = 'flex';
      var xhr = new XMLHttpRequest();
      xhr.open('GET', '/task/rating/' + id);
      xhr.onload = function() {
        if (xhr.status === 200) {
            try {
                var data = JSON.parse(xhr.responseText);
                var star1 = document.getElementById('star1');
                var star2 = document.getElementById('star2');
                var star3 = document.getElementById('star3');
                var star4 = document.getElementById('star4');
                var star5 = document.getElementById('star5');
                var stars = [star1, star2, star3, star4, star5];
                if (data.accepted){
                  document.getElementById('review').value = data.review;
                  document.getElementById('teacher_id').value = data.teacher_id;
                  document.getElementById('teacher_name').value = data.teacher_name;
                  document.getElementById('status_acceptation').value = 'Completed';
                  document.getElementById('starRate').style.display = 'block';
                  document.getElementById('accepted').value = 1;
                  for (let i=0; i<5; i++) {
                    if (i < data.rate) {
                      stars[i].classList.add('star-color');
                    }else{
                      stars[i].classList.remove('star-color');
                    }
                  }
                }else{
                  document.getElementById('review').value = '';
                  document.getElementById('teacher_id').value = '';
                  document.getElementById('teacher_name').value = '';
                  document.getElementById('starRate').style.display = 'none';
                  document.getElementById('accepted').value = 0;
                  for (let i=0; i<5; i++) {
                    stars[i].classList.remove('star-color');
                  }
                }
            } catch (e) {
                console.error('Error parsing JSON:', e);
            }
        }
      };
      xhr.send();

      let form = document.getElementById('rating-form');
      form.onsubmit = function(event) {
          event.preventDefault();
          var formData = new FormData(form);
          var csrfToken = form.querySelector('input[name="_token"]').value;
          formData.append('_token', csrfToken);
          var actionUrl = '/task/rating/' + id;
          var xhrUpdate = new XMLHttpRequest();
          xhrUpdate.open('POST', actionUrl);
          xhrUpdate.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
          xhrUpdate.onload = function() {
              if (xhrUpdate.status === 200) {
                  var data = JSON.parse(xhrUpdate.responseText);
                  var rate1 = document.querySelector('#feeds-load .star-rating-' +id+ ' .star-1');
                  var rate2 = document.querySelector('#feeds-load .star-rating-' +id+ ' .star-2');
                  var rate3 = document.querySelector('#feeds-load .star-rating-' +id+ ' .star-3');
                  var rate4 = document.querySelector('#feeds-load .star-rating-' +id+ ' .star-4');
                  var rate5 = document.querySelector('#feeds-load .star-rating-' +id+ ' .star-5');
                  var rates = [rate1, rate2, rate3, rate4, rate5];
                  for (let i = 0; i < 5; i++) {
                      if (i < data.task.rate) {
                        rates[i].classList.add('star-color');
                      } else {
                        rates[i].classList.remove('star-color');
                      }
                  }
              } else {
                  alert('Failed to update data: ' + xhrUpdate.statusText);
              }
              document.getElementById('rating-popup').style.display = 'none';
          };
          xhrUpdate.onerror = function() {
              console.error('Request error');
              alert('Request error');
          };
          xhrUpdate.send(formData);
      };
    }

  </script>

@endsection
