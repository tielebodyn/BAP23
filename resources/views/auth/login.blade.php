<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />
  <form method="POST" action="{{ route('login') }}" class="lg:m-16">
    @csrf
    <div class="flex flex-col items-center justify-center text-xl m-4 space-y-2">
      <x-header title="Inloggen" class="" />
    </div>
    <!-- Email Address -->
    <div>
      <x-forms.input-label for="input_type" value="Email / Gebruikersnaam" />
      <x-forms.text-input id="input_type" class="block mt-1 w-full" name="input_type" :value="old('email')" autofocus
        autocomplete="username" />
      <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
      <x-forms.input-error :messages="$errors->get('username')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-forms.input-label for="password" value="wachtwoord" />

      <x-forms.text-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="current-password" />

      <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
      <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
          class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <span class="ml-2 text-sm text-gray-600">{{ __('Onthoud mij') }}</span>
      </label>
    </div>

    <div class="w-full mt-4 flex justify-center">
      <x-buttons.primary-button class="w-4/5 lg:w-2/3">
        Inloggen
        </x-primary-button>
    </div>
    <div class="flex justify-center text-sm mt-2">Nog geen account? <a href="{{ route('register') }}"
        class="ml-2 text-blue-500 hover:text-blue-700 hover:cursor-pointer">Registeren</a></div>
  </form>
</x-guest-layout>
