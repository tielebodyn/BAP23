@props(['text', 'route', 'group' => null, 'last' => false, 'image' => false, 'notification' => false])
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
         <x-profile.image :user="auth()->user()" class="w-5 h-5 rounded-full" />
    @else
      @include('components.icons.' . $icon, ['class' => $isActive ? 'fill-slate-900' : 'fill-gray-400'])
    @endif
    <span class="flex-1 ml-3 whitespace-nowrap">{{ $text }}</span>
    @if ($notification )
      <span class="flex items-center justify-center w-4 h-4 text-xs font-semibold text-white bg-red-500 rounded-full ml-2">
        {{ $notification }}
      </span>
    @endif
  </a>
</div>
<div class="pb-4 mr-8 ml-4"></div>
</li>

</div>
