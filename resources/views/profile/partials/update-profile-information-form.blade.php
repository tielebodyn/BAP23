<section>


  <form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
  </form>

  <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <input type="hidden" name="statusName" value="profile-information">
    <div class=" bg-white shadow sm:rounded-lg">
      <div class="relative">
        <div style="background-color: {{ $user->profile_color }}"
          class="h-36 w-100 rounded rounded-b-none mb-20 flex justify-end items-start">
          <input type="color" name="profile_color" value="{{ old('profile_color', $user->profile_color) }}"
            class="m-5">
        </div>
        <div class="absolute  m-5 top-10  bg-center bg-no-repeat bg-cover w-40 h-40 rounded-full bg-gray1"
          style="background-image: url('{{ asset(old('profile_image', $user->profile_image)) }}')">
        </div>
        <div class="p-x4 sm:px-8">
          <label for="files">Afbeelding Kiezen</label>
          <input name="profile_image"
            class="mt-1 file:cursor-pointer file:p-2 file:text-white file:bg-accent file:border-none file:rounded-lg block text-sm text-black rounded-lg cursor-pointer bg-gray2 focus:outline-none"
            aria-describedby="file_input_help" id="file_input" accept=".jpeg, .png, .jpg, .gif, .svg" type="file">
          <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
        </div>
      </div>
      <div class="max-w-xl space-y-6 p-4 sm:p-8">
        <div>
          <x-input-label for="name" :value="__('Naam')" />
          <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
            required description autocomplete="name" />
          <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
          <x-input-label for="username" :value="__('Gebruikersnaam')" />
          <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)"
            description autocomplete="username" />
          <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input-disabled class="mt-1 block w-full" :value="old('email', $user->email)" />
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
          <a href="{{ route('profile.edit') }}" class="bg-danger p-3 rounded-lg"> <x-svg icon="trash" size="24"
              fill="white" /> </a>
          @if (session('status') === 'profile-information-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
              class="text-sm text-gray-600">{{ __('Saved.') }}</p>
          @endif


        </div>
      </div>
    </div>
  </form>
</section>
