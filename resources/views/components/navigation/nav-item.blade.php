@props(['text', 'icon', 'route', 'group' => null, 'last' => false])
@php
  $isActive = request()->routeIs($route);
@endphp
<div>
  <div class="flex">
    <div class="{{ !$isActive ? 'invisible' : '' }} rounded-r flex-initial bg-violet-400 w-3 h-10 d-inline flex-1">
    </div>
    <a href={{ route($route, ['group' => $group]) }}
      class="flex items-center p-2  rounded-lg {{ $isActive ? 'slate-900' : 'text-gray-400' }}">
      @include('components.icons.' . $icon, ['class' => $isActive ? 'fill-slate-900' : 'fill-gray-400'])
      <span class="flex-1 ml-3 whitespace-nowrap">{{ $text }}</span>
    </a>
  </div>
  <div class="{{ !$last ? 'border-b  border-gray-200' : '' }} pb-4 mr-8 ml-4"></div>
  </li>

</div>
