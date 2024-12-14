@foreach ($task as $item)

    @if ($item->media == "Instagram" || $item->media == "Tiktok")

      <div style="display: flex; justify-content: center; padding-bottom: 10px; cursor: pointer">
        <span class="edit star-rating-{{$item->id}}" @if (session('participant') && session('participant')->role > 1)  onclick="rateTask({{ $item->id }})"  @endif data-id="{{ $item->id }}" data-rate="{{ $item->rate }}">
          @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $item->rate)
              <span class="star-uncolor"><i class="fa-solid star-color fa-star star-{{$i}}"></i></span>
            @else
              <span class="star-uncolor"><i class="fa-solid fa-star star-{{$i}}"></i></span>
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
