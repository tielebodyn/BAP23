<x-app-layout :$newGroup>
  @vite('resources/js/pages/group/create.js')
  @vite('resources/js/components/upload-image.js')
  <div class="py-12">
    <form method="post" action="{{ route('group.store') }}" enctype="multipart/form-data">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
         <x-buttons.back href="{{ route('group.start') }}" class="pb-4" />
          <div class="max-w-xl">
            @csrf
            @method('post')
            <x-header title="Algemene informatie"
              description=" Vul hier de algemene informatie in van je groep. Deze informatie kan je later nog aanpassen." />
            <div class="max-w-xl space-y-6 p-4 sm:p-8">
              <div>
                <x-forms.input-label for="name" :value="__('Groepsnaam')" />
                <x-forms.text-input name="name" type="text" class="mt-1 block w-full"
                  placeholder="vul de groepsnaam in" />
                <x-forms.input-error class="mt-2" :messages="$errors->get('name')" />
              </div>
              <div>
                <x-forms.input-label for="unit" :value="__('Eenheid')" />
                <x-forms.text-input name="unit" type="text" class="mt-1 block w-full" required
                  placeholder="vul hier de eenheid van je groep in" />
                <x-forms.input-error class="mt-2" :messages="$errors->get('unit')" />
              </div>
              <div class="py-5">
                <x-forms.input-label for="logo" :value="__('Groeps Afbeelding')" class="mb-1" />
                <x-forms.input-image name="logo" count="1" />
                <x-forms.input-error :messages="$errors->get('logo')" />
              </div>
              <div>
                <x-forms.input-label for="body" :value="__('Groepskleur')" />
                <div class="flex flex-col">
                  <input type="color" name="color" id="body" class="w-20 h-20 my-1">
                  <label for="body" class="w-fit py-2 px-4 bg-violet-400 text-white rounded cursor-pointer hover:bg-violet-500" > kies
                      kleur</label>
                </div>
                <x-forms.input-error class="mt-1" :messages="$errors->get('color')" />
              </div>
              <div>
              </div>
            </div>
          </div>
        </div>


        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <x-header title="Beschrijving van je groep"
            description="hier kom verdere informatie over je groep. Deze is zichtbaar op het dashboard"
            class="m-2" />
          <textarea name="description" id="edit" class="max-w-xl"></textarea>
          <x-forms.input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <x-header title="Locatie" description="Hier kan je de locatie van je groep selecteren" class="m-2" />
          <div class="max-w-xl  p-4 sm:p-4">
            <div id="map" class="block w-full h-96"></div>
            <input type="hidden" required name="long" class="js-long-input">
            <input type="hidden" required name="lat" class="js-lat-input">
            <input type="hidden" required name="place" class="js-place-input">
            <x-forms.input-error class="mt-2" :messages="$errors->get('place')" />
          </div>


          <div class="flex items-center gap-4">
            <x-buttons.secondary-button type="submit">{{ __('Groep aanmaken') }}</x-buttons.secondary-button>
            <a href="{{ route('group.create') }}" class="bg-red-500 p-2 rounded-lg">
              @include('components.icons.close', ['class' => 'stroke-white'])
            </a>

          </div>
        </div>
      </div>
    </form>
  </div>
</x-app-layout>
