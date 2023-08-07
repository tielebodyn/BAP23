@props(['icon', 'size' => 24, 'fill' => false, 'stroke' => false])
<svg {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600'])}}

width="{{$size}}" height="{{$size}}" fill="{{$fill ? $fill : '#495057'}}" stroke="{{$stroke}}">
    {{include('storage/icons/' . $icon . '.svg')}}
</svg>
