<div class="main-left">

    <!-- .......Profile.Start........ -->
    @if (session('participant'))
    <a  class="profile">
        <div class="profile-picture" id="my-profile-picture">
            <img src="{{ file_exists(public_path('storage/' . session('participant')->image)) ? asset('storage/' . session('participant')->image) : asset('assets/img/avatars/no.png') }}" alt="" />
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

        <a href="/" class="menu-item {{ request()->path() === '/' && !request()->query('bookmarks') ? 'active' : '' }}" id="homeMenu">
            <span><img src="{{asset('assets/image/svg/house-door.svg')}}" alt=""></span> <h3>Home</h3>
        </a>

        <a href="/instagram" class="menu-item {{ request()->path() === 'instagram' ? 'active' : '' }}">
            <span><img src="{{asset('assets/image/svg/instagram.svg')}}" alt=""></span> <h3>Instagram</h3>
        </a>

        <a href="/?bookmarks=true" class="menu-item @if(request()->query('bookmarks') == 'true') active @endif" id="bookmarksMenu">
            <span><img src="{{asset('assets/image/svg/bookmarks.svg')}}" alt=""></span> <h3>Bookmarks</h3>
        </a>

        <a  class="menu-item" id="Notify-box">
            <span><img src="{{asset('assets/image/svg/bell.svg')}}" alt=""></span>
            <small class="notfy-counter nt" id="ntCounter1">5</small>
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
