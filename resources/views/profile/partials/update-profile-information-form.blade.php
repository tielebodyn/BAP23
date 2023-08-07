<section>
  <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <input type="hidden" name="statusName" value="profile-information">
    <div class=" bg-white shadow sm:rounded-lg">
      <div class="relative">
        @include('profile.partials.update-profile-customisation')
      </div>
    </div>
    <div class="max-w-xl space-y-6 p-4 sm:p-8">
      <div>
        <x-forms.input-label for="name" :value="__('Naam')" />
        <x-forms.text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
          required description autocomplete="name" />
        <x-forms.input-error class="mt-2" :messages="$errors->get('name')" />
      </div>

      <div>
        <x-forms.input-label for="username" :value="__('Gebruikersnaam')" />
        <x-forms.text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)"
          description autocomplete="username" />
        <x-forms.input-error class="mt-2" :messages="$errors->get('username')" />
      </div>

      <div>
        <x-forms.input-label for="email" :value="__('Email')" />
        <x-forms.text-input-disabled class="mt-1 block w-full" :value="old('email', $user->email)" />
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
          <div>
            <p class="text-sm mt-2 text-gray-800">
              {{ __('Your email address is unverified.') }}

              <button form="send-verification"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Click here to re-send the verification email.') }}
              </button>
            </p>

            @if (session('status') === 'verification-link-sent')
              <p class="mt-2 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to your email address.') }}
              </p>
            @endif
          </div>
        @endif
      </div>

      <div class="flex items-center gap-4">
        <x-buttons.secondary-button type="submit">{{ __('Opslaan') }}</x-buttons.secondary-button>
        <a href="{{ route('profile.edit') }}" class="bg-red-500 p-2 rounded-lg"> <x-svg icon="close" size="24"
            stroke="white" /> </a>
        @if (session('status') === 'profile-information-updated')
          <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
            {{ __('Saved.') }}</p>
        @endif


      </div>
    </div>
    </div>
  </form>
</section>
