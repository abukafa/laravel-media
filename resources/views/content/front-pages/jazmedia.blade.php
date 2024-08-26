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
@vite('resources/assets/vendor/scss/jazmedia.scss')
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite('resources/assets/vendor/libs/Swiper/swiper-bundle.min.js')
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite([
  'resources/js/jazmedia-main.js',
  'resources/js/jazmedia-home.js'
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
          <div class="serch-bar">
              <i class="fa fa-search"></i>
              <input type="search" placeholder="Serch For Creators">
          </div>
          <div class="add-post">
              <div class="profile-picture" id="my-profile-picture">
                  <img src="{{asset('assets/image/img/profile-1.jpeg')}}" alt="">
              </div>
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
              <a  class="profile">
                  <div class="profile-picture" id="my-profile-picture">
                      <img src="{{asset('assets/image/img/profile-1.jpeg')}}" alt="" />
                  </div>
                  <div class="profile-handle">
                      <h4>Hijaz Abdullah</h4>
                      <p class="text-gry">
                          @ijaz.1453
                      </p>
                  </div>
              </a>
               <!-- .......Profile.End........ -->



              <!-- .........Start Aside Bar.......... -->
              <aside>

                  <a href="/" class="menu-item {{ request()->getRequestUri() === '/' ? 'active' : '' }}" id="homeMenu">
                      <span><img src="{{asset('assets/image/svg/house-door.svg')}}" alt=""></span> <h3>Home</h3>
                  </a>

                  <a class="menu-item" id="instagramMenu">
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
                  <a href="/login" class="btn btn-primary btn-lg">Member Area</a>


              </aside>
              <!-- ..........End Aside Bar........... -->



          </div>
          <!--==================  Main Left End =================== -->


          <!--================== Main Middle Start================== -->
          <div class="main-middle">
            <div class="middle-container">

              @if (request()->query('bookmarks'))
              <div class="profile-info">
                <div>
                    <h1>Beg Joker</h1>
                    <p>@thebegjoker</p>
                    <div>
                        <img src="{{asset('assets/image/img/profile-1.jpeg')}}" >
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
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/f4.jpg')}}" alt="">
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/st6.jpg')}}" alt="">
                          </div>

                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/st1.jpg')}}" alt="">
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/st3.jpg')}}" alt="">
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/st2.jpeg')}}" alt="">
                          </div>

                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/m1.jpg')}}" alt="">
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/service-img')}}-14.png" alt="">
                          </div>

                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/n3.png')}}" alt="">
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/st5.jpg')}}" alt="">
                          </div>

                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/team2.png')}}" alt="">
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/m3.jpg')}}" alt="">
                          </div>
                      </div>
                  </div>
              </div>
              <!--...........Start Stories............. -->

              @else

              <!--...........Start Stories............. -->
              <div class="stories">
                  <div class="stories-wrappper swiper mySwiper">
                      <div class="swiper-wrapper">
                          <div class="story swiper-slide">
                              <img src="" alt="">
                              <div class="profile-picture " id="my-profile-picture">
                                  <img src="{{asset('assets/image/img/profile-1.jpeg')}}" alt="">
                              </div>
                              <label for="add-story" class="add-story">
                                  <i class="fa fa-add" id="upload"></i>
                                  <p>Add Your <br> Story</p>
                              </label>
                              <input type="file" accept="image/jpg,image/png,image/jpeg" id="add-story">
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/f4.jpg')}}" alt="">
                              <div class="profile-picture " >
                                  <img src="{{asset('assets/image/img/f2.jpg')}}" alt="">
                              </div>
                              <p> Dnne Danele</p>
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/st6.jpg')}}" alt="">
                              <div class="profile-picture " >
                                  <img src="{{asset('assets/image/img/s5.jpg')}}" alt="">
                              </div>
                              <p>Wiliam Jems</p>
                          </div>

                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/st1.jpg')}}" alt="">
                              <div class="profile-picture " >
                                  <img src="{{asset('assets/image/img/s1.jpg')}}" alt="">
                              </div>
                              <p>Evrahim Alli</p>
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/st3.jpg')}}" alt="">
                              <div class="profile-picture " >
                                  <img src="{{asset('assets/image/img/s3.jpg')}}" alt="">
                              </div>
                              <p>Furkan Syal</p>
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/st2.jpeg')}}" alt="">
                              <div class="profile-picture " >
                                  <img src="{{asset('assets/image/img/s2.jpg')}}" alt="">
                              </div>
                              <p>Maria Nivi</p>
                          </div>

                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/m1.jpg')}}" alt="">
                              <div class="profile-picture " >
                                  <img src="{{asset('assets/image/img/s4.jpg')}}" alt="">
                              </div>
                              <p>Alexa Lisa</p>
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/service-img')}}-14.png" alt="">
                              <div class="profile-picture " >
                                  <img src="{{asset('assets/image/img/n4.png')}}" alt="">
                              </div>
                              <p>Kistopar Cky </p>
                          </div>

                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/n3.png')}}" alt="">
                              <div class="profile-picture " >
                                  <img src="{{asset('assets/image/img/st5.jpg')}}" alt="">
                              </div>
                              <p>Anny Walkers</p>
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/st5.jpg')}}" alt="">
                              <div class="profile-picture " >
                                  <img src="{{asset('assets/image/img/s7.jpg')}}" alt="">
                              </div>
                              <p>Wiliam Smith</p>
                          </div>

                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/team2.png')}}" alt="">
                              <div class="profile-picture " >
                                  <img src="{{asset('assets/image/img/n5.png')}}" alt="">
                              </div>
                              <p>Jhon Milar</p>
                          </div>
                          <div class="story swiper-slide">
                              <img src="{{asset('assets/image/img/m3.jpg')}}" alt="">
                              <div class="profile-picture " >
                                  <img src="{{asset('assets/image/img/s3.jpg')}}" alt="">
                              </div>
                              <p>Dvid mark</p>
                          </div>
                      </div>
                  </div>
              </div>
              <!--...........Start Stories............. -->

              @endif

              <!-- .........Post Input.......... -->
              <form class="add-post input-post">
                  <div id="add-new-post">
                      <i class="fa fa-add"></i>
                  </div>
                  <input type="text" placeholder="What's on your mind ?" id="add-post">
                  <input type="submit" value="post" class="btn btn-primary">
              </form>

               <!--.............. Feed Aria Start............... -->
               <div class="feeds">
                <div class="feed">
                    <!-- ....Feed Top.... -->
                    <div class="feed-top">
                        <div class="user">
                            <div class="profile-picture">
                                <img src="{{asset('assets/image/img/s9 (1).png')}}" alt="">
                            </div>
                            <div class="info">
                                <h3>Irfan Habib</h3>
                                <div class="time text-gry">
                                    <small> PAKISTAN, <span>1 DAYS AGO</span> </small>
                                </div>
                            </div>
                        </div>
                        <span class="edit">
                            <img src="{{asset('assets/image/svg/three-dots.svg')}}" >
                        </span>
                    </div>
                    <!-- ...Feed Img.... -->
                    <div class="feed-img">
                        <img src="{{asset('assets/image/img/feed1.jpeg')}}" alt="">
                    </div>
                    <!-- ...Feed Action Aria... -->
                    <div class="action-button">
                        <div class="interaction-button">
                            <span><i class="fa fa-heart"></i></span>
                            <span><i class="fa fa-comment-dots"></i></span>
                            <span><i class="fa fa-link"></i></span>
                        </div>
                        <div class="bookmark">
                            <i class="fa fa-bookmark"></i>
                        </div>
                    </div>

                    <!--.... Liked by.... -->
                    <div class="liked-by">
                        <span><img src="{{asset('assets/image/img/n2.png')}}" alt=""></span>
                        <span><img src="{{asset('assets/image/img/n3.png')}}" alt=""></span>
                        <span><img src="{{asset('assets/image/img/n4.png')}}" alt=""></span>
                        <p>Liked by <b>Jhon Wiliams</b> and <b>77 comments other</b></p>
                    </div>


                    <!-- ......Caption...... -->
                    <div class="caption">
                        <div class="title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa aliquid placeat ipsum repudiandae alias voluptatibus unde fugiat aut, doloribus qui.</div>
                        <p><b>Lana White </b>Lorem ipsum dolor sit amet consectetur adipisicing.
                        <span class="hars-tag">#lifestyle</span></p>
                    </div>

                    <!-- ........Comments...... -->
                    <div class="comments text-gry">
                        View all comments
                    </div>

                </div>
                <div class="feed">
                    <!-- ....Feed Top.... -->
                    <div class="feed-top">
                        <div class="user">
                            <div class="profile-picture">
                                <img src="{{asset('assets/image/img/m5.jpg')}}" alt="">
                            </div>
                            <div class="info">
                                <h3>Esmael Alli</h3>
                                <div class="time text-gry">
                                    <small> LONDON, <span>3 DAYS AGO</span> </small>
                                </div>
                            </div>
                        </div>
                        <span class="edit">
                            <img src="{{asset('assets/image/svg/three-dots.svg')}}" alt="">
                        </span>
                    </div>
                    <!-- ...Feed Img.... -->
                    <div class="feed-img">
                        <img src="{{asset('assets/image/img/feed8.jpg')}}" alt="">
                    </div>
                    <!-- ...Feed Action Aria... -->
                    <div class="action-button">
                        <div class="interaction-button">
                            <span><i class="fa fa-heart"></i></span>
                            <span><i class="fa fa-comment-dots"></i></span>
                            <span><i class="fa fa-link"></i></span>
                        </div>
                        <div class="bookmark">
                            <i class="fa fa-bookmark"></i>
                        </div>
                    </div>

                    <!--.... Liked by.... -->
                    <div class="liked-by">
                        <span><img src="{{asset('assets/image/img/n2.png')}}" alt=""></span>
                        <span><img src="{{asset('assets/image/img/n3.png')}}" alt=""></span>
                        <span><img src="{{asset('assets/image/img/n4.png')}}" alt=""></span>
                        <p>Liked by <b>Maria Bron</b> and <b>140 comments other</b></p>
                    </div>


                    <!-- ......Caption...... -->
                    <div class="caption">
                        <div class="title">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto, id.</div>
                        <p><b>Lana White </b>Lorem ipsum dolor sit amet consectetur adipisicing.
                        <span class="hars-tag">#lifestyle</span></p>
                    </div>

                    <!-- ........Comments...... -->
                    <div class="comments text-gry">
                        View all comments
                    </div>

                </div>
                 <div class="feed">
                    <!-- ....Feed Top.... -->
                    <div class="feed-top">
                        <div class="user">
                            <div class="profile-picture">
                                <img src="{{asset('assets/image/img/s8 (1).png')}}" alt="">
                            </div>
                            <div class="info">
                                <h3>Glira Ema</h3>
                                <div class="time text-gry">
                                    <small> RUSIA, <span>1 HOUR AGO</span> </small>
                                </div>
                            </div>
                        </div>
                        <span class="edit">
                            <img src="{{asset('assets/image/svg/three-dots.svg')}}" alt="">
                        </span>
                    </div>
                    <!-- ...Feed Img.... -->
                    <div class="feed-img">
                        <img src="{{asset('assets/image/img/feed2.jpg')}}" alt="">
                    </div>
                    <!-- ...Feed Action Aria... -->
                    <div class="action-button">
                        <div class="interaction-button">
                            <span><i class="fa fa-heart"></i></span>
                            <span><i class="fa fa-comment-dots"></i></span>
                            <span><i class="fa fa-link"></i></span>
                        </div>
                        <div class="bookmark">
                            <i class="fa fa-bookmark"></i>
                        </div>
                    </div>

                    <!--.... Liked by.... -->
                    <div class="liked-by">
                        <span><img src="{{asset('assets/image/img/st6.jpg')}}" alt=""></span>
                        <span><img src="{{asset('assets/image/img/s3.jpg')}}" alt=""></span>
                        <span><img src="{{asset('assets/image/img/s6.jpg')}}" alt=""></span>
                        <p>Liked by <b>David Mark</b> and <b>77 comments other</b></p>
                    </div>


                    <!-- ......Caption...... -->
                    <div class="caption">
                        <div class="title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa aliquid placeat ipsum repudiandae alias voluptatibus unde fugiat aut, doloribus qui.</div>
                        <p><b>Jia Glisa </b>Lorem ipsum dolor sit amet consectetur adipisicing.
                        <span class="hars-tag">#lifestyle</span></p>
                    </div>

                    <!-- ........Comments...... -->
                    <div class="comments text-gry">
                        View all comments
                    </div>

                </div>
               </div>
               <!--.............. Feed Aria End............... -->
            </div>
            <!--================== Main Middle instagram ================== -->
            <div class="instagram-container" style="display:none">
              <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/reel/C1HHmc3JX7x/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/reel/C1HHmc3JX7x/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/reel/C1HHmc3JX7x/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Abdul Aziz Abu Kafa (@hikam.abukafa)</a></p></div></blockquote>
              <script async src="//www.instagram.com/embed.js"></script>

              <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/C0f01o-pDlo/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/C0f01o-pDlo/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/C0f01o-pDlo/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Abdul Aziz Abu Kafa (@hikam.abukafa)</a></p></div></blockquote>
              <script async src="//www.instagram.com/embed.js"></script>

              <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/CzN1HTjRg6M/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/CzN1HTjRg6M/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CzN1HTjRg6M/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Abdul Aziz Abu Kafa (@hikam.abukafa)</a></p></div></blockquote>
              <script async src="//www.instagram.com/embed.js"></script>

              <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/reel/Cp64HduJF3L/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/reel/Cp64HduJF3L/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/reel/Cp64HduJF3L/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Abdul Aziz Abu Kafa (@hikam.abukafa)</a></p></div></blockquote>
              <script async src="//www.instagram.com/embed.js"></script>
            </div>
            <!--================== Main Middle instagram ==================  -->
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
                  <div class="message">
                      <div class="profile-picture">
                          <img src="{{asset('assets/image/img/s9 (1).png')}}" alt="">
                          <div class="green-active"></div>
                      </div>
                      <div class="message-body">
                          <h5>Irfan Habib</h5>
                          <p class="text-gry">
                             Lorem ipsum dolor sit amet.
                          </p>
                      </div>
                  </div>
                  <div class="message">
                      <div class="profile-picture">
                          <img src="{{asset('assets/image/img/s9 (2).png')}}" alt="">
                          <div class="green-active"></div>
                      </div>
                      <div class="message-body">
                          <h5>Lana White</h5>
                          <p class="text-gry">
                             Lorem ipsum dolor sit amet.
                          </p>
                      </div>
                  </div>
                  <div class="message">
                      <div class="profile-picture">
                          <img src="{{asset('assets/image/img/m (7).png')}}" alt="">

                      </div>
                      <div class="message-body">
                          <h5>Alyxa Jia</h5>
                          <p class="text-gry">
                             Lorem ipsum dolor sit amet.
                          </p>
                      </div>
                  </div>
                  <div class="message">
                      <div class="profile-picture">
                          <img src="{{asset('assets/image/img/Fedd0.jpg')}}" alt="">

                      </div>
                      <div class="message-body">
                          <h5>Prince Adam</h5>
                          <p class="text-gry">
                             Lorem ipsum dolor sit amet.
                          </p>
                      </div>
                  </div>
                  <div class="message">
                      <div class="profile-picture">
                          <img src="{{asset('assets/image/img/f1.jpg')}}" alt="">

                      </div>
                      <div class="message-body">
                          <h5>David Lewo</h5>
                          <p class="text-gry">
                             Lorem ipsum dolor sit amet.
                          </p>
                      </div>
                  </div>
              </div>

              <!-- ..............End Message............ -->


              <!-- ..............Start Firend Request............ -->
              <div class="firend-rquest">
                  <h4>Request</h4>
                  <div class="request">
                      <div class="info">
                          <div class="profile-picture">
                              <img src="{{asset('assets/image/img/f4.jpg')}}" alt="">
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
                              <img src="{{asset('assets/image/img/f2.jpg')}}" alt="">
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
                              <img src="{{asset('assets/image/img/f3.jpg')}}" alt="">
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
  <!-- ................Start Profile-Popup............ -->
  <div class="popup profile-popup">
      <div>
          <div class="popup-box profile-popup-box">
              <h1>Beg Joker</h1>
              <p>@thebegjoker</p>
              <div id="my-profile-picture">
                  <img src="{{asset('assets/image/img/profile-1.jpeg')}}" >
              </div>
              <label for="profile-upload" class="btn btn-primary btn-lg">Update Profile Picture</label>
              <input type="file" accept="image/jpg, image/png, image/jpeg" id="profile-upload">
              <button class="btn btn-primary btn-lg">Log Out</button>
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
              <div class="notification-box">
                  <!-- ....Message top..... -->
                  <div class="message-top">
                      <h4>Notification</h4>
                  </div>
                  <!-- ....Searchbar... -->
                  <div class="messge-serch-bar"></div>
                  <div>
                      <div class="profile-picture">
                          <img src="{{asset('assets/image/img/n1.jpg')}}" alt="">
                      </div>
                      <div class="notification-body">
                          <b>Maria Lily</b> accepted your firend request
                          <small class="text-gry">1 DAYS AGO</small>
                      </div>
                  </div>
                  <div>
                      <div class="profile-picture">
                          <img src="{{asset('assets/image/img/n2.png')}}" alt="">
                      </div>
                      <div class="notification-body">
                          <b>Jhon Evan</b> commented on your post
                          <small class="text-gry">2 HOUR AGO</small>
                      </div>
                  </div>
                  <div>
                      <div class="profile-picture">
                          <img src="{{asset('assets/image/img/n3.png')}}" alt="">
                      </div>
                      <div class="notification-body">
                          <b>Emaliy Benjamin</b> liked on your post
                          <small class="text-gry">JUST NOW</small>
                      </div>
                  </div>
                  <div>
                      <div class="profile-picture">
                          <img src="{{asset('assets/image/img/n4.png')}}" alt="">
                      </div>
                      <div class="notification-body">
                          <b>Mark Trump</b> and <b>10 other</b> liked on your post
                          <small class="text-gry">2 HOUR AGO</small>
                      </div>
                  </div>
                  <div>
                      <div class="profile-picture">
                          <img src="{{asset('assets/image/img/n5.png')}}" alt="">
                      </div>
                      <div class="notification-body">
                          <b>Evrahim Alli</b> and <b>5 other</b> commented on your post
                          <small class="text-gry">3 DAYS AGO</small>
                      </div>
                  </div>
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

@endsection
