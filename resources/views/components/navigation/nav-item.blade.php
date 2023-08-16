@props(['text', 'icon', 'route', 'group' => null, 'last' => false, 'image' => false])
@php
  $isActive = request()->routeIs($route);
@endphp
<div>
  <div class="js-wrapper flex">
    @if ($isActive)
      <div class="rounded-r flex-initial bg-violet-400 w-3 h-10 d-inline flex-1">
      @else
        <div class="js-hover rounded-r flex-initial  opacity-50 w-3 h-10 d-inline flex-1">
    @endif
  </div>
  <a href={{ route($route, ['group' => $group]) }}
    class="flex items-center p-2  rounded-lg {{ $isActive ? 'text-slate-800' : 'text-gray-400' }}">
    @if ($image)
      <img src="{{ asset($icon) }}" alt="" class="w-6 h-6 rounded-full">
    @else
      @include('components.icons.' . $icon, ['class' => $isActive ? 'fill-slate-900' : 'fill-gray-400'])
    @endif
    <span class="flex-1 ml-3 whitespace-nowrap">{{ $text }}</span>
  </a>
</div>
<div class="{{ !$last ? 'border-b  border-gray-200' : '' }} pb-4 mr-8 ml-4"></div>
</li>

</div>
