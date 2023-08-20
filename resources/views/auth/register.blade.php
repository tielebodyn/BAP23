<x-guest-layout>

  <form method="POST" action="{{ route('register') }} " class="lg:m-16">
    @csrf
    <div class="flex flex-col items-center justify-center text-xl m-4 space-y-2">
      <x-header title="Registreren" class="" />
    </div>
    <!-- Name -->
    <div>
      <x-forms.input-label for="name" :value="__('Naam')" />
      <x-forms.text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
        required autofocus autocomplete="name" />
      <x-forms.input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <!-- Username -->
    <div class="mt-4">
      <x-forms.input-label for="username" :value="__('Gebruikersnaam')" />
      <x-forms.text-input id="usernzme" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
        required autofocus autocomplete="username" />
      <x-forms.input-error :messages="$errors->get('username')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <x-forms.input-label for="email" :value="__('Email')" />
      <x-forms.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
        required autocomplete="username" />
      <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-forms.input-label for="password" :value="__('Wachtwoord')" />

      <x-forms.text-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="new-password" />

      <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <x-forms.input-label for="password_confirmation" :value="__('Wachtwoord herhalen')" />

      <x-forms.text-input id="password_confirmation" class="block mt-1 w-full" type="password"
        name="password_confirmation" required autocomplete="new-password" />

      <x-forms.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>


    <div class="w-full mt-4 flex justify-center">
      <x-buttons.primary-button class="w-4/5 lg:w-2/3">
        Registreren
        </x-primary-button>
    </div>
    <div class="flex justify-center text-sm mt-2">Al een account? <a href="{{ route('login') }}"
        class="ml-2 text-blue-500 hover:text-blue-700 hover:cursor-pointer">Inloggen</a></div>
  </form>
</x-guest-layout>
