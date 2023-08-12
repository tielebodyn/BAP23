@vite('resources/js/pages/post/index.js')
<x-app-layout :$group>
  <div class="w-full h-40 bg-white border-b border-gray-200 flex justify-center items-center space-x-24">
    <form action="{{ route('group.post.search', $group) }}" method="post" class="m-0">
      @csrf
      @method('POST')
      <div class="w-full flex items-center space-x-2">
        <x-forms.search  name="search" icon="search" placeholder="Piano, Boeken, Brugge, 9000,..." />
        <x-forms.dropdown name="straal">
          <option hidden selected disabled>Afstand</option>
          <option value="1">1 km</option>
          <option value="2">2 km</option>
          <option value="5">5 km</option>
          <option value="10">10 km</option>
          <option value="20">20 km</option>
          <option value="40">40 km</option>
          <option value="60">60 km</option>
          <option value="80">80 km</option>
          <option value="100">100 km</option>
          <option value="250">250 km</option>
        </x-forms.dropdown>
        <x-forms.dropdown name="straal js-type-select">
          <option value="vraag">Vraag</option>
          <option value="aanbod" selected>Aanbod</option>
        </x-forms.dropdown>
        <x-buttons.primary-button class="ml-2">
          Zoeken
        </x-buttons.primary-button>
      </div>
    </form>

    <a href="{{ route('group.post.create', $group) }}">
      <x-buttons.secondary-button class="flex ">
        <span> Ruil Maken</span>
        @include('components.icons.plus', ['class' => 'stroke-gray-50 ml-5'])
      </x-buttons.secondary-button>
    </a>

  </div>
  @if (isset($searchQuery))
    <div class="m-2">
      <span class="text-sm text-gray-500">Zoekresultaten voor: <span
          class="font-medium">{{ $searchQuery }}</span></span>
      <a href="{{ route('group.post.index', $group) }}" class="ml-2 text-sm text-gray-500">wis zoekopdracht</a>
    </div>
  @endif
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <ul>
        @foreach ($activePosts as $post)
          <x-post.item :post="$post" :group="$group" />
        @endforeach
      </ul>
    </div>
  </div>

</x-app-layout>
