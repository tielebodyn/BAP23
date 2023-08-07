@vite('resources/js/map.js')
<x-app-layout :$group>

  <title>Display a map on a webpage</title>
  <style>
    .mapboxgl-popup-content {
      padding: 10px;
      background-color: rgba(209, 213, 219, 0.8);
        box-shadow: none;

    }

    .mapboxgl-popup-close-button {
      padding: 10px;

    }

    .mapboxgl-popup-tip {
      display: none
    }
  </style>
  <div id="map" class="!absolute top-0 bottom-0 w-full"></div>
  <ul class="js-active-posts hidden">
    @foreach ($activePosts as $post)
      <li class="bg-gray-200 mb-3 rounded" data-long="{{ $post->long }}" data-lat="{{ $post->lat }}">

        <div class="flex">
          <img src="{{ asset($post->user->profile_image) }}" alt="{{ $post->user->name }}" class="rounded-full mr-2"
            width="40" height="40">
          <p>{{ $post->user->name }}</p>
        </div>
        <p>{{ $post->title }}</p>
        <p>{{ $post->description }}</p>
        <ul class="flex">
          @foreach ($post->categories as $category)
            <li class="bg-blue-200 rounded m-2 w-fit">{{ $category->name }}</li>
          @endforeach
        </ul>
        <p>{{ $post->price }} {{ $post->group->unit }} </p>
        <a href="{{ route('group.post.show', [$group, $post]) }}" class="bg-blue-200 rounded m-2 w-fit">bekijken</a>
        <div class="relative flex justify-center">
          <div class="absolute rounded-full bg-violet-400 w-5 h-5 center drop-shadow-lg"></div>
        </div>
      </li>
    @endforeach
  </ul>

</x-app-layout>
