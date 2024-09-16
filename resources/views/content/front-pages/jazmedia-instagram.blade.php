@foreach ($task as $item)

    @if ($item->media == "Instagram" || $item->media == "Tiktok")

      <div style="display: flex; justify-content: center; padding-bottom: 10px;">
        <span class="{{ session('participant') && session('participant')->role > 1 ? 'star-rating' : '' }}" data-id="{{ $item->id }}" data-rate="{{ $item->rate }}">
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

@endforeach

@if ($task instanceof Illuminate\Pagination\LengthAwarePaginator && $task->hasPages())
    <div style="display: none;">
        {{ $task->links() }}
    </div>
@endif
