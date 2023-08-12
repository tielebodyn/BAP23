
<x-app-layout :$newGroup>
@vite('resources/js/components/upload-image.js')
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
          <form method="post" action="{{ route('group.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="max-w-xl space-y-6 p-4 sm:p-8">
              <div>
                <x-forms.input-label for="name" :value="__('Logo')" />
                {{-- <input name="logo"
                  class="mt-1 file:cursor-pointer file:p-2 file:text-white file:bg-violet-400 file:border-none file:rounded-lg block text-sm text-black rounded-lg cursor-pointer bg-gray-200 focus:outline-none"
                  aria-describedby="file_input_help" id="file_input" accept=".jpeg, .png, .jpg, .gif, .svg"
                  type="file"> --}}
                <x-forms.input-image name="logo" count="1"/>
                <x-forms.input-error class="mt-2" :messages="$errors->get('logo')" />
              </div>
              <div>
                <x-forms.input-label for="name" :value="__('Kleur')" />
                <input type="color" name="color" id="">
                <x-forms.input-error class="mt-2" :messages="$errors->get('color')" />
              </div>

              <div>
                <x-forms.input-label for="name" :value="__('Naam')" />
                <x-forms.text-input name="name" type="text" class="mt-1 block w-full" />
                <x-forms.input-error class="mt-2" :messages="$errors->get('name')" />
              </div>
              <div>
                <x-forms.input-label for="name" :value="__('Beschrijving')" />
                <x-forms.text-input name="description" type="text" class="mt-1 block w-full" required description />
                <x-forms.input-error class="mt-2" :messages="$errors->get('description')" />
              </div>
              <div>
                <x-forms.input-label for="name" :value="__('Eenheid')" />
                <x-forms.text-input name="unit" type="text" class="mt-1 block w-full" required description
                  autocomplete="name" />
                <x-forms.input-error class="mt-2" :messages="$errors->get('name')" />
              </div>

              <div class="flex items-center gap-4">
                <x-buttons.secondary-button type="submit">{{ __('Opslaan') }}</x-buttons.secondary-button>
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
        </form>
      </div>
    </div>
  </div>
  </div>
</x-app-layout>
