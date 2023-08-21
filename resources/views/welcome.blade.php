<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="icon" href="{{ Vite::asset('resources/images/logo.png') }}" type="image/x-icon" />
</head>

<body class="font-sans text-slate-800 bg-gray-50 antialiased">
  <div class="w-full flex justify-between fixed bg-gray-50 h-20 px-2 md:px-12 items-center">
    <x-app-logo />
    <div class=" items-center ">
      <a href="{{ route('login') }}">
        <x-buttons.primary-button class="ml-4" type="button">
          {{ __('Inloggen') }}
          </x-primary-button>
      </a>
      <a href="{{ route('register') }}">
        <x-buttons.primary-button
          class="ml-1 md:ml-4 bg-transparent border !text-slate-800 border-slate-800 hover:!bg-slate-100  "
          type="button">
          {{ __('Registreren') }}
          </x-primary-button>
      </a>
    </div>
  </div>
  <div class="w-full flex justify-between">
    <div class="lg:w-2/3 mt-12">
      <div class="m-4 w-5/6 mt-20 md:m-12 space-y-4 md:space-y-8 md:w-1/2">

        <h1 class="text-3xl md:text-4xl font-bold ">
          “Ruilen en lokaal handelen met vrienden of in je organisatie”
        </h1>
        <p class="">
          Welkom bij RuilVlot! Ontdek een nieuwe wereld van lokaal ruilen en handelen. Of je nu onder vrienden wilt
          ruilen
          of binnen je eigen organisatie, bij RuilVlot! maken we het makkelijk om waardevolle connecties te leggen en te
          delen wat je hebt.
        </p>
      </div>
      <div class="space-y-20 md:space-y-40 mb-20">
        <x-step-card image="{{ 'welcome-1.png' }}" title="Registreren"
          description="Makkelijk en snel registeren" />
        <x-step-card image="{{ 'welcome-2.png' }}" title="Groep maken"
          description="Eens ingelogd kan je een nieuwe groep aanmaken of je aansluiten bij een bestaande groep" />
        <x-step-card image="{{ 'welcome-3.png' }}" title="Ruilen!"
          description="Je kan snel een vraag / aanbod aanmaken. Op de kaart kan je kijken welke er zich in de buurt bevinden!" />

      </div>
    </div>
    <div class="fixed flex flex-col items-end right-0 top-20">

      <img src="{{ Vite::asset('resources/images/home_mockup.png') }}" alt="home_mockup"
        class="hidden md:block lg:block md:w-3/6 xl:w-2/3" />
    </div>
</body>

</html>
