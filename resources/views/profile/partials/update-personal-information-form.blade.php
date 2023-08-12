<section class="js-personal-section">
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Persoonlijke informatie') }}
    </h2>
  </header>

  <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')
    <input type="hidden" name="statusName" value="personal-information">
    <div>
      {{-- FIXME: form not submitting when description is empty --}}
      <x-forms.input-label for="name" :value="__('Beschrijving')" />
      <x-forms.text-area rows="6" name="description">{{ old('description', $user->description) }}</x-forms.text-area>

      <div class="tags my-6">
        {{-- current tags --}}
        <x-forms.input-label for="name" :value="__('interesses')" class="mb-2" />
        <div class="h-40 bg-gray-50  p-2 overflow-auto">
          <ul class="js-selected-tags  flex flex-wrap  rounded">
            @foreach ($user->tags as $tag)
              <x-tag :tag="$tag" :close="true" :selected="true" />
            @endforeach
          </ul>
        </div>
        <div class="w-full relative js-searchbar-wrapper mt-2">
          {{-- searchbar --}}
          <x-forms.input-label for="name" :value="__('interesse toevoegen')" />

            <x-forms.text-input  class="w-1/2 js-tag-input"  placeholder="voeg hier toe"   />
          {{-- results --}}
          <ul
            class="border border-gray-200 bg-white z-10 absolute  w-full js-tag-list max-h-40 overflow-y-scroll hidden">
            @foreach ($tags as $tag)
              @if (!$user->tags->contains($tag))
                <x-tag :tag="$tag" :close="true" />
              @endif
            @endforeach
          </ul>
        </div>

        <x-forms.input-error class="mt-2" :messages="$errors->get('tags')" />
      </div>
      <div class="flex items-center gap-4">
        <x-buttons.secondary-button type="submit">{{ __('Opslaan') }}</x-buttons.secondary-button>
        <a href="{{ route('profile.edit') }}" class="bg-red-500 p-2 rounded-lg">
          @include('components.icons.close', ['class' => 'stroke-white'])
        </a>
        @if (session('status') === 'personal-information-updated')
          <p id="'personal-information-updated" x-data="{ show: true }" x-show="show" x-transition
            x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
        @endif
      </div>
    </div>
  </form>
</section>
@if ($errors->get('tags') || session('status') === 'personal-information-updated')
  <script>
    document.querySelector('.js-personal-section').scrollIntoView({
      behavior: 'smooth',
      block: 'center'
    });
  </script>
@endif
