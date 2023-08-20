@props(['disabled' => false, 'icon', 'name', 'placeholder' => 'zoeken'])
<div class="relative">
  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
    @include('components.icons.' . $icon, ['class' => 'fill-slate-800 w-5 h-5'])
  </div>
  <input type="search" name="{{ $name }}" id="default-search" autocomplete="off"
    class="w-40 lg:w-96 block  border-none pl-10 text-slate-800 bg-gray-200 focus:ring-violet-400 focus:border-violet-400 rounded-md shadow-sm placeholder-gray-400 text-sm"
    placeholder="{{$placeholder}}">
</div>
