 <div {{$attributes->merge(['class' => 'flex items-center content-center'])}}>
   @include('components.icons.logo', ['class' => ''])
   <span class="ml-2 mb-1 text-sm md:text-lg font-semibold @if(isset($light)) text-white @endif">RuilVlot!</span>
 </div>
