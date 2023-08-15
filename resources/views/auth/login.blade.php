<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="flex items-center justify-center text-xl m-4">
      <span>inloggen</span>
    </div>
    <!-- Email Address -->
    <div>
      <x-forms.input-label for="input_type" :value="__('Email/Username')" />
      <x-forms.text-input id="input_type" class="block mt-1 w-full" name="input_type" :value="old('email')" autofocus
        autocomplete="username" />
      <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
      <x-forms.input-error :messages="$errors->get('username')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-forms.input-label for="password" :value="__('Password')" />

      <x-forms.text-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="current-password" />

      <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
      <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
          class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
      </label>
    </div>

    <div class="flex items-center justify-end mt-4">
      @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          href="{{ route('password.request') }}">
          {{ __('Forgot your password?') }}
        </a>
      @endif

      <x-buttons.primary-button class="ml-3">
        {{ __('Log in') }}
        </x-primary-button>

    </div>
    <div class="flex justify-center"><a href="registreren">registeren?</a></div>

  </form>

</x-guest-layout>
