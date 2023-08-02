@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray3 focus:border-accent focus:ring-accent rounded-md shadow-sm']) !!}>
