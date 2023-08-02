@props(['disabled' => false])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray2 border-gray3 focus:border-accent focus:ring-accent rounded-md shadow-sm']) !!} disabled>
