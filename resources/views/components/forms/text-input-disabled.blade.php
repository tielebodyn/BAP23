@props(['disabled' => false])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-200 border-gray-400 focus:border-violet-400 focus:ring-violet-400 rounded-md shadow-sm']) !!} disabled>
