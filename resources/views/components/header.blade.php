@props(['title' => null, 'description' => null])
<div {{ $attributes->merge(['class' => 'flex flex-col']) }} >
  @if ($title)
    <h1 class="title text-lg md:text-2xl font-bold text-gray-600">{{ $title }}</h1>
  @endif
  @if ($description)
    <p class="description text-gray-600">{{ $description }}</p>
  @endif
</div>
