@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border border-gray-300 focus:border-violet-400 focus:ring-violet-400 rounded-md']) !!}>
