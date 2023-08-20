@vite('resources/js/components/image-slider.js')
<x-app-layout :$group>

  <div class="w-full h-40 bg-white border-b border-gray-200 flex justify-center space-x-24 flex-col p-2 md:p-10">
    <form action="{{ route('group.post.search', $group) }}" method="post" class="m-0">
      @csrf
      @method('POST')
      <x-header title="Ruilen" class="mt-16 sm:mt-4 mb-4" />
      <div class="origin-left scale-90    lg:scale-100 space-x-2 md:space-x-0 w-full flex items-center justify-between">
        <div class="flex  space-x-2 md:space-x-4">
          <x-forms.search name="search" icon="search" placeholder="Piano, Boeken, Brugge, 9000,..r" />
          <x-forms.dropdown name="type">
            <option value="all" selected>Alle</option>
            <option value="vraag">Vraag</option>
            <option value="aanbod">Aanbod</option>
          </x-forms.dropdown>
          <x-buttons.primary-button>
            Zoeken
          </x-buttons.primary-button>
        </div>
        <a href="{{ route('group.post.create', $group) }}"><x-buttons.secondary-button  class="flex">
            <span class="hidden xl:block"> Nieuwe Ruil </span>
            @include('components.icons.plus', ['class' => 'stroke-gray-50 ld:ml-5 w-5 h-5'])
          </x-buttons.secondary-button></a>
      </div>

    </form>
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
      @if (count($activePosts) === 0)
        <div class="flex flex-col justify-center items-center">
          <div class="flex flex-col justify-center items-center space-y-4">
            @include('components.icons.search', ['class' => 'w-24 h-24 fill-gray-500'])
            <span class="text-gray-500 text-2xl">Er zijn nog geen ruilen</span>
            <a href="{{ route('group.post.create', $group) }}" class="text-blue-500 hover:text-blue-700">
              Ruil toevoegen?
            </a>
          </div>
        </div>
      @else
        <ul>
          @foreach ($activePosts as $post)
            <x-post.item :post="$post" :group="$group" />
          @endforeach
        </ul>
      @endif
    </div>
  </div>

</x-app-layout>
