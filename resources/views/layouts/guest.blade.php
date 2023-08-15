<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'RuilVlot!') }}</title>
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">

  <div class="w-full flex">
    <x-app-logo light={{ true }} />
    <div class="w-full md:w-1/2 m-10">

      {{ $slot }}
    </div>
    <style>
      .bg-image {
        background-image: url({{ Vite::asset('resources/images/bg-image-login.jpg') }})
      }
    </style>

    <div class="bg-image w-1/2 h-screen  bg-center hidden md:block flex flex-col  -between">
      <x-app-logo light={{ true }} />
      <div>
        <h1 class="text-white text-4xl font-bold">
          "Top applicatie"
        </h1>
        <p class="text-white">chiro melden</p>
      </div>
    </div>
  </div>
</body>

</html>
