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
  <nav>
      <div class="container nav-container">
          <div class="logo">
              <h3>JAZ <span>ACADEMY</span></h3>
          </div>
          <form action="" method="GET" class="serch-bar">
              <i class="fa fa-search"></i>
              <input type="search" id="searchInput" placeholder="Search For Creators">
          </form>
          <div class="add-post">
            @if (session('participant'))
              <div class="profile-picture" id="my-profile-picture">
                <img src="{{ asset('assets/img/avatars/no.png') }}" alt="">
              </div>
            @else
              <a class="btn btn-primary btn-sm signIn">Sign In</a>
            @endif
          </div>
      </div>
  </nav>
  <!-- ...................Start Navbar................... -->

  <!-- ...................Start Main Section................... -->
  <main>
      <div class="container main-container">


          <!--================== Main Left Start ==================  -->
          <div class="main-left">


              <!-- .......Profile.Start........ -->
              @if (session('participant'))
                <a  class="profile">
                  <div class="profile-picture" id="my-profile-picture">
                      <img src="{{ asset('assets/img/avatars/no.png') }}" alt="" />
                  </div>
                  <div class="profile-handle">
                      <h4>{{ session('participant')->name }}</h4>
                      <p class="text-gry">
                        {{ '@' . session('participant')->username }}
                      </p>
                  </div>
                </a>
              @endif
              <!-- .......Profile.End........ -->



              <!-- .........Start Aside Bar.......... -->
              <aside>

                  <a href="/" class="menu-item {{ request()->getRequestUri() === '/' ? 'active' : '' }}" id="homeMenu">
                      <span><img src="{{asset('assets/image/svg/house-door.svg')}}" alt=""></span> <h3>Home</h3>
                  </a>

                  <a href="?instagram=true" class="menu-item @if(request()->query('instagram') == 'true') active @endif" id="instagramMenu">
                      <span><img src="{{asset('assets/image/svg/instagram.svg')}}" alt=""></span> <h3>Instagram</h3>
                  </a>

                  <a href="?bookmarks=true" class="menu-item @if(request()->query('bookmarks') == 'true') active @endif" id="bookmarksMenu">
                      <span><img src="{{asset('assets/image/svg/bookmarks.svg')}}" alt=""></span> <h3>Book Marks</h3>
                  </a>

                  <a  class="menu-item" id="Notify-box">
                      <span><img src="{{asset('assets/image/svg/bell.svg')}}" alt=""></span>
                      <small class="notfy-counter nt" id="ntCounter1">7+</small>
                       <h3>Notifications</h3>
                  </a>

                  <a  class="menu-item" id="theme">
                      <span><img src="{{asset('assets/image/svg/palette.svg')}}" alt=""></span> <h3>Theme</h3>
                  </a>


                  <!-- ...........Add Post Btn......... -->
                  <a href="/pages/profile-user" class="btn btn-primary btn-lg">Member Area</a>


              </aside>
              <!-- ..........End Aside Bar........... -->



          </div>
          <!--==================  Main Left End =================== -->


          <!--================== Main Middle Start================== -->
          <div class="main-middle">

            @if (request()->query('instagram'))

            <!--================== Main Middle instagram ================== -->
            <div class="instagram-container">
                @foreach ($task as $item)
                  @if ($item->media == "Instagram" || $item->media == "Tiktok")
                    @if ( $item->embed <> '' )
                      <div style="display: flex; justify-content: center; padding-bottom: 10px;">
                        <span class="{{ session('participant') && session('participant')->role > 1 ? 'star-rating' : '' }}" data-id="{{ $item->rate }}">
                          @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $item->rate)
                              <span><i class="fa-solid fa-star star-color"></i></span>
                            @else
                              <span><i class="fa-solid fa-star star-uncolor"></i></span>
                            @endif
                          @endfor
                        </span>
                      </div>
                      {!! $item->embed !!}
                    @endif
                  @endif
                @endforeach
            </div>
            <!--================== Main Middle instagram ==================  -->

            @else

            <div class="middle-container">

              @if (request()->query('bookmarks'))

              <div class="profile-info">
                <div>
                  <h1>{{ session('participant') ? session('participant')->name : 'Annonimous' }}</h1>
                  <p>{{ session('participant') ? '@' . session('participant')->username : '@jazmedia' }}</p>
                  <div style="display: flex; justify-content: center;" id="my-profile-picture">
                    <img src="{{ asset('assets/img/avatars/no.png') }}" >
                  </div>
                </div>
              </div>

              <!--...........Start Stories............. -->
              <div class="stories">
                  <div class="stories-wrappper swiper mySwiper">
                      <div class="swiper-wrapper">
                          <div class="story swiper-slide">
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
                          <div class="story swiper-slide">
                              <img src="" alt="">
                              <div class="profile-picture " id="my-profile-picture">
                                  <img src="{{ asset('assets/img/avatars/no.png') }}" alt="">
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
                                @php
                                    $parts = explode(' ', $item->name);
                                @endphp
                                <p>{{ (strlen($item->name) > 20) ? $parts[0] . ' ' . $parts[1] : $item->name }}</p>
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
              <div class="feeds">
                @foreach ($task as $item)
                  @if ($item->media <> "Instagram" && $item->media <> "Tiktok")
                      <div class="feed" id="{{ $item->id }}">
                        <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                          <span class="{{ session('participant') && session('participant')->role > 1 ? 'star-rating' : '' }}" data-id="{{ $item->rate }}" id="star-rating-sm">
                            @for ($i = 1; $i <= 5; $i++)
                              @if ($i <= $item->rate)
                                <span><i class="fa-solid fa-star star-color"></i></span>
                              @else
                                <span><i class="fa-solid fa-star star-uncolor"></i></span>
                              @endif
                            @endfor
                          </span>
                        </div>
                        <!-- ....Feed Top.... -->
                        <div class="feed-top">
                            <div class="user">
                                <div class="profile-picture">
                                    <img src="{{ file_exists(public_path('storage/member/' . $item->student_id . '.png')) ? asset('storage/member/' . $item->student_id . '.png') : asset('assets/img/avatars/no.png') }}" alt="" loading="lazy">
                                </div>
                                <div class="info">
                                    <h3>{{ $item->student_name }}</h3>
                                    <div class="time text-gry">
                                        @php
                                            $date_post = new DateTime($item->date);
                                        @endphp
                                        <small>{{ $date_post->format('l, j F Y') }}</small>
                                    </div>
                                </div>
                            </div>
                            <span class="edit {{ session('participant') && session('participant')->role > 1 ? 'star-rating' : '' }}" data-id="{{ $item->rate }}" id="star-rating-md" style="cursor: pointer">
                              @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $item->rate)
                                  <span><i class="fa-solid fa-star star-color"></i></span>
                                @else
                                  <span><i class="fa-solid fa-star star-uncolor"></i></span>
                                @endif
                              @endfor
                            </span>
                        </div>
                        <!-- ...Feed Img.... -->
                        <div class="feed-img">
                          {!! $item->embed !!}
                        </div>
                        <!-- ...Feed Action Aria... -->
                        @if (session('participant'))
                          <div class="action-button">
                            <div class="interaction-button">
                              <span class="like-button" data-task-id="{{ $item->id }}"><i class="fa fa-heart likes-icon {{ $item->likes()->where('participant_id', session('participant')->id)->exists() ? 'liked' : '' }}"></i></span>
                              <span><i class="fa fa-comment-dots"></i></span>
                              <span><a href="{{ $item->link }}" target="_blank"><i class="fa fa-link"></i></a></span>
                            </div>
                            <div class="bookmark">
                              <i class="fa fa-bookmark {{ $item->bookmarks()->where('participant_id', session('participant')->id)->exists() ? 'booked' : '' }}"></i>
                            </div>
                          </div>
                        @endif

                        <!--.... Liked by.... -->
                        <div class="liked-by">
                            <span><img src="{{ asset('assets/img/avatars/no.png') }}" alt=""></span>
                            <span><img src="{{ asset('assets/img/avatars/no.png') }}" alt=""></span>
                            <span><img src="{{ asset('assets/img/avatars/no.png') }}" alt=""></span>
                            @php
                                $firstLike = $item->likes()->with('participant')->first();
                            @endphp
                            <p>Liked by <strong class="text-bold likes-first">{{ $firstLike ? $firstLike->participant->name : 'No one yet' }}</strong><p class="likes-count">{{ $item->likes()->count() > 1 ? 'and ' . $item->likes()->count() -1 . ' others' : '' }}</p></p>
                        </div>


                        <!-- ......Caption...... -->
                        <div class="caption">
                            <div class="title">{{ $item->project_name .' - '. $item->description }}<span class="hars-tag"> {{ $item->name }}</span></div>
                            <p><b>{{ $item->teacher_name }} </b>{{ $item->review }}</p>
                        </div>

                        <!-- ........Comments...... -->
                        <div class="comments text-gry">
                            View all comments
                        </div>

                    </div>
                  @endif
                @endforeach
              </div>
              <!--.............. Feed Aria End............... -->
            </div>

            @endif

          </div>
          <!--================== Main Middle End==================  -->

          <!--==================  Main Right Start==================  -->
          <div class="main-right">
              <!-- ..............Start Message............ -->

              <div class="messages">
                  <!-- ....Message top..... -->
                  <div class="message-top">
                      <h4>Activities</h4>
                  </div>
                  <!-- ....Searchbar... -->
                  <div class="messge-serch-bar"></div>
                  <!-- ......Message..... -->
                  @php
                      $first_ten = $task->take(15);
                  @endphp
                  @foreach ($first_ten as $item)
                    <div class="message">
                        <div class="profile-picture">
                            <img src="{{ file_exists(public_path('storage/member/' . $item->student_id . '.png')) ? asset('storage/member/' . $item->student_id . '.png') : asset('assets/img/avatars/no.png') }}" alt="">
                        </div>
                        <div class="message-body">
                            <h5>{{ $item->student_name }}</h5>
                            <p>{{ ucwords($item->name) }} <span class="text-gry"> {{ ucwords($item->date) }}</span></p>
                        </div>
                    </div>
                  @endforeach
              </div>

              <!-- ..............End Message............ -->


              <!-- ..............Start Firend Request............ -->
              <div class="firend-rquest" style="display: none">
                  <h4>Request</h4>
                  <div class="request">
                      <div class="info">
                          <div class="profile-picture">
                              <img src="{{ asset('assets/img/avatars/no.png') }}" alt="">
                          </div>
                          <div>
                              <h5>Dnne Danele</h5>
                              <p class="text-gry">
                                  4 mutual firend
                              </p>
                              <small class="text-gry alert" >You have accepted request</small>
                          </div>
                      </div>
                      <div class="action">
                          <div class="btn btn-primary" id="Accept">
                              Accept
                          </div>
                          <div class="btn btn-danger" id="Delete">
                              Delete
                          </div>
                      </div>
                  </div>
                  <div class="request">
                      <div class="info">
                          <div class="profile-picture">
                              <img src="{{ asset('assets/img/avatars/no.png') }}" alt="">
                          </div>
                          <div>
                              <h5>Hija Binte</h5>
                              <p class="text-gry">
                                  2 mutual firend
                              </p>
                              <small class="text-gry alert" >You have accepted request</small>
                          </div>
                      </div>
                      <div class="action">
                          <div class="btn btn-primary" id="Accept">
                              Accept
                          </div>
                          <div class="btn btn-danger" id="Delete">
                              Delete
                          </div>
                      </div>
                  </div>
                  <div class="request">
                      <div class="info">
                          <div class="profile-picture">
                              <img src="{{ asset('assets/img/avatars/no.png') }}" alt="">
                          </div>
                          <div>
                              <h5>Even loise</h5>
                              <p class="text-gry">
                                  4 mutual firend
                              </p>
                              <small class="text-gry alert" >You have accepted request</small>
                          </div>
                      </div>
                      <div class="action">
                          <div class="btn btn-primary" id="Accept">
                              Accept
                          </div>
                          <div class="btn btn-danger" id="Delete">
                              Delete
                          </div>
                      </div>
                  </div>
              </div>
              <!-- ..............End Firend Request............ -->

          </div>
          <!--==================  Main Right End================== -->


      </div>
  </main>
  <!-- ...................Start Main Section................... -->




  <!-- ...................Start PopUps Aria................... -->

  <!-- ................Alert-Popup............ -->
  @if (session('success') || session('danger'))
    <div class="popup alert-popup" style="display: flex">
      <div>
        <div class="popup-box alert-popup-box">
          <h3 class="text-bold">{{ session('success') ? session('success') : session('danger') }}</h3>
          <div style="margin-top: 30px">
            <span class="close btn btn-{{ session('success') ? 'primary' : 'danger' }} btn-sm">OK</span>
          </div>
        </div>
      </div>
    </div>
  @endif
  <!-- ................End Alert-Popup............ -->

  <!-- ................SignIn-Popup............ -->
  <div class="popup signin-popup">
    <div>
      <div class="popup-box signin-popup-box">
        <form action="/signin" method="post">
          @csrf
          <div class="serch-bar">
            <input type="search" placeholder="Username" name="username" required>
          </div>
          <div class="serch-bar">
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-lg">Sign In for Participant</button>
        </form>
        <div style="margin-top: 20px">
          <p>Not Registered yet? <b><a href="#" class="signUp">Sign Up</a></b></p>
        </div>
      </div>
      <span class="close"><i class="fa fa-close"></i></span>
    </div>
  </div>
  <!-- ................End SignIn-Popup............ -->

  <!-- ................SignUp-Popup............ -->
  <div class="popup signup-popup">
    <div>
      <div class="popup-box signup-popup-box">
        <form action="/signup" method="post">
          @csrf
          <div class="serch-bar">
            <input type="search" placeholder="Name" name="name" id="name" required>
          </div>
          <div class="serch-bar username">
            <input type="search" placeholder="Username" name="username" id="username" required>
          </div>
          <div class="serch-bar password">
            <input type="password" placeholder="Password" name="password" id="password" required>
          </div>
          <div class="serch-bar">
            <input type="password" placeholder="Retype Password" id="retype" required>
          </div>
          <button type="submit" class="btn btn-primary btn-lg">Sign Up for Participant</button>
        </form>
        <div style="margin-top: 20px">
          <p>Already Registered? <b><a href="#" class="signIn">Sign In</a></b></p>
        </div>
      </div>
      <span class="close"><i class="fa fa-close"></i></span>
    </div>
  </div>
  <!-- ................End SignUp-Popup............ -->

  <!-- ................Start Rating-Popup............ -->
  <div class="popup rating-popup">
    <div>
      <div class="popup-box rating-popup-box">
        <div class="serch-bar">
          <input type="search" placeholder="Mentor" list="options">
          <datalist id="options">
            <option value="Abukafa">
            <option value="Adam Rabbani">
            <option value="Ms. Tia">
          </datalist>
        </div>
        <div class="serch-bar">
          <textarea type="search" placeholder="Review"></textarea>
        </div>
        <div class="stars">
          <span id="star1"><i class="fa-solid fa-star"></i></span>
          <span id="star2"><i class="fa-solid fa-star"></i></span>
          <span id="star3"><i class="fa-solid fa-star"></i></span>
          <span id="star4"><i class="fa-solid fa-star"></i></span>
          <span id="star5"><i class="fa-solid fa-star"></i></span>
        </div>
        <button class="btn btn-primary btn-lg" id="btn-rate">Rate!</button>
      </div>
      <span class="close"><i class="fa fa-close"></i></span>
    </div>
  </div>
  <!-- ................End Rating-Popup............ -->

  <!-- ................Start Profile-Popup............ -->
  <div class="popup profile-popup">
      <div>
        <div class="popup-box profile-popup-box">
          <h1>{{ session('participant') ? session('participant')->name : 'Annonimous' }}</h1>
          <p>{{ session('participant') ? '@' . session('participant')->username : '@jazmedia' }}</p>
          <div id="my-profile-picture">
              <img src="{{ asset('assets/img/avatars/no.png') }}" >
          </div>
          <label for="profile-upload" class="btn btn-primary btn-lg">Update Profile Picture</label>
          <input type="file" accept="image/jpg, image/png, image/jpeg" id="profile-upload">
          <a href="/signout" class="btn btn-primary btn-lg">Log Out</a>
        </div>
        <span class="close"><i class="fa fa-close"></i></span>
      </div>
  </div>
  <!-- ................End Profile-Popup............ -->

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
                      $first_ten = $task->take(10);
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
                            <b>{{ $item->student_name }}</b> <small class="text-gry">{{ $posted->format('F, j') }}</small>
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

  <script>
    const currentUrl = new URL(window.location.href);
    const params = currentUrl.searchParams;
    const searchInput = document.getElementById('searchInput');
    if (params.toString()) {
      const queryName = params.keys().next().value;
      searchInput.name = (queryName == 'instagram' ? 'instagram' : 'creator');
    } else {
      searchInput.name = 'creator';
    }

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


  </script>

@endsection
