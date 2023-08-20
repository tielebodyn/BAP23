<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'RuilVlot!') }}</title>
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @vite('resources/js/components/image-slider.js')
  <link rel="icon" href="{{ Vite::asset('resources/images/logo.png') }}" type="image/x-icon" />
</head>

<body class="font-sans text-gray-900 antialiased">

  <div class="w-full flex justify-center">

    <div class="w-full md:w-1/2 m-5">
      <div class="mb-10">
        <x-app-logo class="md:invisible " />
      </div>
      {{ $slot }}
    </div>



    {{-- <div class="w-1/2 h-screen bg-center hidden md:flex flex-col justify-between p-10"
      style="background-image: url({{ Vite::asset('resources/images/bg-image-login.jpg') }});">
      <x-app-logo class="invisible md:visible" light="{{ true }}" />
      <div class="bg-gray-900 bg-opacity-10 rounded-lg w-fit p-2 shadow">
        <h1 class="text-white text-4xl font-bold mb-1">
          "Top applicatie"
        </h1>
        <p class="text-white">chiro melden</p>
      </div>
    </div> --}}

    <div class="slider w-1/2 h-screen relative overflow-hidden rounded bg-red-100 hidden md:block">
      <div class="slide absolute bg-gray-50 rounded h-full w-full bg-cover flex flex-col justify-between p-10"
        style="background-image: url({{ Vite::asset('resources/images/bg-image-login-1.jpg') }});">
        <x-app-logo class="invisible md:visible" light="{{ true }}" />
        <div class="bg-gray-900 bg-opacity-20 rounded-lg w-fit p-2 shadow">
          <h1 class="text-white text-3xl font-bold mb-1">
            "wat ben ik blij met mijn nieuwe chiro hemd"
          </h1>
          <p class="text-white">Joren Clepkens</p>
        </div>
      </div>


      <div
        class="slide absolute bg-gray-50 rounded h-full w-full   bg-cover bg-center flex flex-col justify-between p-10"
        style="background-image: url({{ Vite::asset('resources/images/bg-image-login-2.jpg') }});">
        <x-app-logo class="invisible md:visible" light="{{ true }}" />

        <div class="bg-gray-900 bg-opacity-50 rounded-lg w-fit p-2 shadow">
          <h1 class="text-white text-3xl font-bold mb-1">
            "Top dat iemand nog een oude gitaar had liggen op de zolder!"
          </h1>
          <p class="text-white">George w.</p>
        </div>
      </div>

      <div
        class="slide absolute bg-gray-50 rounded h-full w-full   bg-cover bg-center flex flex-col justify-between p-10"
        style="background-image: url({{ Vite::asset('resources/images/bg-image-login-3.jpg') }});">
        <x-app-logo class="invisible md:visible" />

        <div class="bg-gray-900 bg-opacity-10 rounded-lg w-fit p-2 shadow">
          <h1 class="text-white text-3xl font-bold mb-1">
            "Gelukkige heb ik snel bijles gevonden via mijn lokale schoolgroep"
          </h1>
          <p class="text-white">Stefaan de ladder</p>
        </div>
      </div>
      <button
        class="shadow btn btn-next absolute md:p-2 p-0.5 rounded-lg h-fit  cursor-pointer bg-white opacity-50 hover:opacity-75 md:top-1/2 bottom-2 right-2 hover:cursor-pointer">
        @include('components.icons.caret-down', ['class' => '-rotate-90 fill-gray-600'])
      </button>
      <button
        class="shadow btn btn-prev btn btn-next absolute md:p-2 p-0.5 rounded-lg h-fit  cursor-pointer opacity-50 hover:opacity-75 bg-white md:top-1/2 bottom-2 left-3 hover:cursor-pointer">
        @include('components.icons.caret-down', ['class' => 'rotate-90 fill-gray-600'])</button>
    </div>

  </div>
</body>

</html>
