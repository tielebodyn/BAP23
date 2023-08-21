@vite('resources/js/pages/group/dashboard.js')
<x-app-layout :$group>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div style="background-color: {{ $group->color }}"
        class='h-36 w-100 rounded rounded-b-none flex justify-end items-start relative'>
        <img src="{{ asset($group->logo) }}" alt="{{ $group->name }}"
          class="bg-gray-50 rounded-full mr-2 absolute left-6 -bottom-8 shadow-lg w-24 h-24">
      </div>
      <div class="p-4 sm:p-8 bg-white shadow rounded-b-lg">
        <div class="w-full flex justify-between items-center">
          <h1 class="font-bold mt-2">{{ $group->name }}</h1>
          @if ($group->users()->where('user_id', auth()->user()->id)->first()->pivot->role == 'admin')
            <a href="{{ route('group.edit', $group) }}" class="btn btn-primary"><x-buttons.primary-button> aanpassen
                </x-primary-button></a>
          @endif
        </div>
        <h2 class="text-lg"><span class="font-bold">eenheid:</span> {{ $group->unit }}</h2>
        <div class="bg-gray-50 shadow rounded-lg p-6 mt-5">
          {!! $group->description !!}
        </div>
      </div>
      <div class="p-4 sm:p-8 bg-white shadow rounded-lg mt-6">
        <x-header title="locatie:" description="dit locatie waar de groep is gebaseerd" class="mb-2" />
        <div class="js-group-location w-full lg:w-1/2 h-80 !cursor-default" data-long="{{ $group->long }}"
          data-lat="{{ $group->lat }}"></div>
      </div>
      <div class="p-4 sm:p-8 bg-white shadow rounded-b-lg mt-6">
        <x-header title="Oprichter:" />
        <div class="flex items-center  space-x-4  mt-2">
          <x-profile.image :user="$groupOwner" class="shadow bg-gray-50 rounded-full w-8 h-8" />
          <p>{{ $groupOwner->name }}</p>
        </div>
        <p>{{ $groupOwner->email }}</p>
        <a href="mailto:{{ $groupOwner->email }}"><x-buttons.primary-button
            class="mt-4">contacteer</x-primary-button></a>
      </div>
    </div>
  </div>
</x-app-layout>
