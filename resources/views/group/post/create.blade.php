@vite('resources/js/pages/create-post.js')
@vite('resources/js/components/upload-image.js')
<x-app-layout :$group>
  <form method="post" action="{{ route('group.post.store', $group) }}" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="max-w-7xl mx-auto sm:p-6 lg:p-8 space-y-6 overflow-auto">
      <div class="p-4 sm:p-8 shadow sm:rounded-lg bg-white shadow">
        <x-header title="Ruil toevoegen"
          description="hier kan je een ruil toevoegen aan de groep. je kan kiezen tussen vraag of aanbod." />
        <div class="max-w-xl  p-4 sm:p-4">
          <x-forms.input-label for="name" :value="__('Titel')" />
          <x-forms.text-input name="title" type="text" class="mt-1 block w-full" required description />
          <x-forms.input-error class="mt-2" :messages="$errors->get('title')" />
        </div>
        <div class="max-w-xl  p-4 sm:p-4">
          <x-forms.input-label for="name" :value="__('type')" />
          <x-forms.dropdown name="type" required class="js-type-select">
            <option value="vraag">Vraag</option>
            <option value="aanbod">Aanbod</option>
          </x-forms.dropdown>
          <x-forms.input-error class="mt-2" :messages="$errors->get('type')" />
        </div>
        <div class="max-w-xl  p-4 sm:p-4">
          <x-forms.input-label for="name" class="js-description" :value="__('Beschrijving')" />
          <x-forms.text-area name="description" rows="6" required />
          <x-forms.input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
      </div>
      <div class="js-trade-options p-4 sm:p-8 shadow sm:rounded-lg bg-white shadow hidden">

        {{-- image upload --}}
        <div class="max-w-xl  p-4 sm:p-4 ">
          <div class="w-full js-image-select hidden">
            <x-header title="Afbeeldingen" description="Hier voeg je afbeeldingen toe van je aanbod. max(4) " />
            <x-forms.input-image name="images[]" count="2" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('images')" />
          </div>
        </div>
        <div class="max-w-xl  p-4 sm:p-4">
          <div class="w-full">
            <x-header title="Waarvoor wil je ruilen?"
              description="kies hier waarvoor je wil ruilen, dit kunnen categoriëen zijn, maar ook {{ $group->unit }}" />
            <div class="w-full h-40  overflow-auto rounded border p-2">
              <ul class="js-selected-categories  flex flex-wrap  rounded bg-gray-50 w-full h-full">
              </ul>
            </div>
            <div class="w-full relative js-searchbar-wrapper mt-2 ">
              {{-- searchbar --}}
              <x-forms.text-input placeholder="voeg hier toe"
                class="mt-1 w-full js-category-input p-2 rounded  cursor-pointer" autocomplete="off" />
              {{-- results --}}
              <ul
                class="border border-gray-200 bg-white z-10 absolute  w-full js-category-list max-h-40 overflow-y-scroll hidden">
                @foreach ($categories as $category)
                  <li data-category-id="{{ $category->id }}"
                    style="background-color: rgba({{ $category->color }},0.2); color:  rgba({{ $category->color }},1"
                    class="js-category w-fit h-fit text-white p-2 m-2 rounded cursor-pointer">
                    {{ $category->icon }} {{ $category->name }}
                    <input class="hidden js-category-{{ $category->id }}" type="checkbox" value="{{ $category->id }}"
                      name="categories[]">
                  </li>
                  <x-forms.input-error class="mt-2" :messages="$errors->get('categories')" />
                @endforeach
              </ul>


            </div>
          </div>
        </div>
        <div class="max-w-xl  p-4 sm:p-4 js-price-input">
          <x-forms.input-label for="name" value="prijs in {{ $group->unit }}" />
          <x-forms.text-input name="price" type="number" class="mt-1 block w-full" required />
          <x-forms.input-error class="mt-2" :messages="$errors->get('price')" />
        </div>
      </div>
      <div class="p-4 sm:p-8 shadow sm:rounded-lg bg-white shadow">

        <x-header title="locatie kiezen"
          description="Geef hier het adres in van je zoekertje. De locatie zal niet exact worden weergegeven op de kaart" />
        <div class="max-w-xl  p-4 sm:p-4">
          <div id="map" class="block w-full h-96"></div>
          <input type="hidden" required name="long" class="js-long-input">
          <input type="hidden" required name="lat" class="js-lat-input">
          <input type="hidden" required name="place" class="js-place-input">
          <x-forms.input-error class="mt-2" :messages="$errors->get('place')" />
        </div>
        <div class="max-w-xl  p-4 sm:p-4">
          <div class="flex items-center gap-4">
            <x-buttons.secondary-button type="submit">{{ __('Ruil plaatsen') }}</x-buttons.secondary-button>
            <a href="{{ route('group.create') }}" class="bg-red-500 p-2 rounded-lg">
              @include('components.icons.close', ['class' => 'stroke-white'])
            </a>
            @if (session('status') === 'profile-information-updated')
              <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">
                {{ __('Saved.') }}</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </form>
</x-app-layout>
