<div>
  <li>
    <div class="flex">
      <div class="{{ !$isActive() ? 'invisible' : '' }} rounded-r flex-initial bg-accent w-3 h-10 d-inline flex-1"></div>
      <a
        href={{route($route)}} class="flex items-center p-2  rounded-lg {{ $isActive() ? 'black' : 'text-gray3' }}">
        <x-svg icon="{{ $icon }}" size="24" fill="{{ $isActive() ? '#212429' : '#7C7D7E' }}" />
        <span class="flex-1 ml-3 whitespace-nowrap">{{ $text }}</span>
      </a>
    </div>
      <div class="{{!$last ? 'border-b  border-gray2' : ''}} pb-4 mr-8 ml-4"></div>
  </li>

</div>
