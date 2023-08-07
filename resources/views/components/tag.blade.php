@props(['tag', 'close' => false, 'selected' => false, 'disabled' => false])
<li data-tag-id="{{ $tag->id }}" class="js-tag  w-fit flex align-center p-2 rounded m-1 r-3 cursor-pointer"
  style="background-color: rgba({{ $tag->color }},0.2); color:  rgba({{ $tag->color }},1">
  {{ $tag->name }}
  <input class="hidden js-tag-{{ $tag->id }}" type="checkbox" @if($selected) checked @endif value="{{ $tag->id }}" name="tags[]">
  @if ($close)
    <button type="button" class="js-remove-tag ml-3">
      <x-svg icon="close" size="24" fill="black" stroke="rgba({{ $tag->color }},1"/>
    </button>
  @endif

</li>
