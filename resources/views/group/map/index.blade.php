@vite('resources/js/map.js')
<x-app-layout :$group>

  <title>Display a map on a webpage</title>
  <style>
    .mapboxgl-popup-close-button{
    margin: 4px;
    }
    .mapboxgl-popup{
        display: flex;
        justify-content: center;
        align-items: center;
        width: fit-content;
        max-width: fit-content;

    }
    .mapboxgl-popup-content {
      padding: 10px;
      background-color: transparent;
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
      <li class="" data-long="{{ $post->long }}" data-lat="{{ $post->lat }}">
            <x-post.item-small :$post :$group />
      </li>
    @endforeach
  </ul>

</x-app-layout>
