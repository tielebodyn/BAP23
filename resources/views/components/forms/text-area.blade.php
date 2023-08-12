@props(['value' => ''])
<textarea
  {{ $attributes->merge(['class' => 'w-full resize-none  border-gray-300 focus:border-violet-400 focus:ring-violet-400 rounded-md shadow-sm placeholder:text-gray-400']) }}>{{ $slot }}</textarea>
  