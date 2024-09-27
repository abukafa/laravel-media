<nav>
  <div class="container nav-container">
      <div class="logo">
          <a href="{{ !config('variables.ourWebsite') ?: config('variables.ourWebsite') }}" target="_blank"><h3>JAZ <span>ACADEMY</span></h3></a>
      </div>
      <form action="" method="GET" class="serch-bar">
          <i class="fa fa-search"></i>
          <input type="search" id="searchInput" name="creator" placeholder="Search For Creators">
      </form>
      <div class="add-post">
        @if (session('participant'))
          <div class="profile-picture" id="my-profile-picture">
            <img src="{{ file_exists(public_path('storage/' . session('participant')->image)) ? asset('storage/' . session('participant')->image) : asset('assets/img/avatars/no.png') }}" alt="">
          </div>
        @else
          <a class="btn btn-primary btn-sm signIn">Sign In</a>
        @endif
      </div>
  </div>
</nav>

  <!-- ................SignIn-Popup............ -->
  <div class="popup signin-popup">
    <div>
      <div class="popup-box signin-popup-box">
        <form action="/signin" method="post">
          @csrf
          <div class="serch-bar">
            <input type="text" placeholder="Username" name="username" required>
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
            <input type="text" placeholder="Name" name="name" id="name" required>
          </div>
          <div class="serch-bar username">
            <input type="text" placeholder="Username" name="username" id="username" required>
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

    <!-- ................Start Profile-Popup............ -->
    <div class="popup profile-popup">
      <div>
        <div class="popup-box profile-popup-box">
          <h1>{{ session('participant') ? session('participant')->name : 'Annonimous' }}</h1>
          <p>{{ session('participant') ? '@' . session('participant')->username : '@jazmedia' }}</p>
          <div id="my-profile-picture">
              <img src="{{ (session('participant') && file_exists(public_path('storage/' . session('participant')->image))) ? asset('storage/' . session('participant')->image) : asset('assets/img/avatars/no.png') }}" id="profile-picture-img">
          </div>
          <label for="profile-upload" class="btn btn-primary btn-lg">Update Profile Picture</label>
          <input type="file" accept="image/jpg, image/png, image/jpeg" id="profile-upload">
          <a href="/signout" class="btn btn-primary btn-lg">Log Out</a>
        </div>
        <span class="close"><i class="fa fa-close"></i></span>
      </div>
  </div>
  <!-- ................End Profile-Popup............ -->

  <script>
    let myProfilePictureImg = document.querySelectorAll('#my-profile-picture img');
    let ProfileUploader = document.querySelector('#profile-upload');
    ProfileUploader.addEventListener('change', () => {
      let formData = new FormData();
      formData.append('profile_picture', document.querySelector('#profile-upload').files[0]);

      fetch('{{ route('profile.upload') }}', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}' // Pastikan CSRF token disertakan
        },
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          myProfilePictureImg.forEach(AllMyProfileImg => {
            AllMyProfileImg.src = data.file_path; // Update gambar di halaman
          });
          alert(data.success);
        } else {
          alert(data.error);
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
    });
  </script>
