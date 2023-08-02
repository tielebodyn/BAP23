<section>
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
      <textarea class="resize-none mb-4 w-full" name="description" id="txtid" rows="3" maxlength="200">{{ old('description', $user->description) }}</textarea>


      <div class="flex items-center gap-4">
        <x-buttons.primary-button>{{ __('Opslaan') }}</x-buttons.primary-button>


        @if (session('status') === 'personal-information-updated')
          <p id="'personal-information-updated" x-data="{ show: true }" x-show="show" x-transition
            x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
        @endif
      </div>
  </form>
</section>
