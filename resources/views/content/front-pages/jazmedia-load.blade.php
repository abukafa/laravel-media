@foreach ($task as $item)

    @if (isset($item->media) && ($item->media !== "Instagram" && $item->media !== "Tiktok"))

      <div class="feed" id="{{ $item->id }}">
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
            <span class="edit star-rating-{{$item->id}}" @if (session('participant') && session('participant')->role > 1)  onclick="rateTask({{ $item->id }})"  @endif  data-id="{{ $item->id }}" data-rate="{{ $item->rate }}" id="star-rating-md" style="cursor: pointer">
              @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $item->rate)
                  <span class="star-uncolor"><i class="fa-solid star-color fa-star star-{{$i}}"></i></span>
                @else
                  <span class="star-uncolor"><i class="fa-solid fa-star star-{{$i}}"></i></span>
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
              <span class="like-button" onclick="likeTask(event, {{ $item->id }})"><i class="fa fa-heart likes-icon {{ $item->likes()->where('participant_id', session('participant')->id)->exists() ? 'liked' : '' }}"></i></span>
              <span><i class="fa fa-comment-dots"></i></span>
              <span><a href="{{ $item->link }}" target="_blank"><i class="fa fa-link"></i></a></span>
            </div>
            <div class="bookmark">
              <span class="mark-button" onclick="markTask(event, {{ $item->id }})"><i class="fa fa-bookmark marks-icon {{ $item->bookmarks()->where('participant_id', session('participant')->id)->exists() ? 'booked' : '' }}"></i></span>
            </div>
          </div>
        @endif

        <!--.... Liked by.... -->
        <div class="liked-by">
            @php
                $firstLike = $item->likes()->with('participant')->first();
                $firstThreeLikes = $item->likes()->with('participant')->take(3)->get();
            @endphp
            @foreach ($firstThreeLikes as $likey)
                <span><img src="{{ file_exists(public_path('storage/' . $likey->participant->image)) ? asset('storage/' . $likey->participant->image) : asset('assets/img/avatars/no.png') }}" alt=""></span>
            @endforeach
            <p>Liked by <strong class="text-bold likes-first">{{ $firstLike ? $firstLike->participant->name : 'No one yet' }}</strong><p class="likes-count">{{ $item->likes()->count() > 1 ? 'and ' . $item->likes()->count() -1 . ' others' : '' }}</p></p>
        </div>


        <!-- ......Caption...... -->
        <div class="caption">
            <div class="title">{{ $item->project_name .' - '. $item->description }}<span class="hars-tag"> {{ $item->name }}</span></div>
            <span id="star-rating-sm">
              @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $item->rate)
                  <span class="star-uncolor"><i class="fa-solid fa-star star-{{$i}} star-color"></i></span>
                @else
                  <span class="star-uncolor"><i class="fa-solid fa-star star-{{$i}}"></i></span>
                @endif
              @endfor
            </span>
            <p><b>{{ $item->teacher_name }} </b> {{ $item->review }}</p>
        </div>
      </div>

    @endif

  <script>
    function handleIframes() {
      var iframes = document.querySelectorAll('.feed-img iframe');

      iframes.forEach(function(iframe) {
        if (iframe.hasAttribute('width')) {
          iframe.setAttribute('width', '100%');
        } else {
          iframe.setAttribute('width', '100%');
          iframe.setAttribute('height', '480');
          iframe.setAttribute('allow', 'autoplay');
        }
        iframe.classList.add('responsive-iframe');
      });
    }
    handleIframes();
    // LIKE
        function likeTask(event, taskId) {
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
              } else {
                console.error('Error:', xhr.responseText);
              }
            }
          };

          var spanElement = event.currentTarget; // Get the span element that was clicked
          var iconElement = spanElement.querySelector('i.likes-icon'); // Find the i element within the span
          if (iconElement) {
              iconElement.classList.toggle('liked'); // Toggle the class 'liked'
          }

          xhr.send(JSON.stringify({ task_id: taskId }));
        };

      // BOOKMARR
      function markTask(event, taskId) {
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
            } else {
              console.error('Error:', xhr.responseText);
            }
          }
        };

        var spanElement = event.currentTarget; // Get the span element that was clicked
        var iconElement = spanElement.querySelector('i.marks-icon'); // Find the i element within the span
        if (iconElement) {
            iconElement.classList.toggle('booked'); // Toggle the class 'booked'
        }

        xhr.send(JSON.stringify({ task_id: taskId }));
      };
  </script>

@endforeach

@if ($task instanceof Illuminate\Pagination\LengthAwarePaginator && $task->hasPages())
    <div style="display: none;">
        {{ $task->links() }}
    </div>
@endif
