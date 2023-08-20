<x-app-layout :$group>
  @vite('resources/js/pages/group/createTransaction.js')
  <div class="py-12">
    <form method="post" action="{{ route('group.transactions.store', $group) }}" enctype="multipart/form-data">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <x-buttons.back href="{{ route('group.transactions', $group) }}" class="pb-4" />
          <div class="max-w-xl">
            @csrf
            @method('post')
            <x-header title="Nieuwe Transactie"
              description=" Hier kun je een nieuwe transactie aanmaken voor je groep." />
            <div class="max-w-xl space-y-6 p-4 sm:p-8">
              <div>
                <x-forms.input-label for="name" :value="__('Gever (Ik)')" />
                <x-forms.text-input-disabled class="mt-1 block w-full" value="{{ auth()->user()->name }}" />
                <x-forms.input-error class="mt-2" :messages="$errors->get('name')" />
              </div>
              <div>

              </div>

              <div class="w-full relative js-searchbar-wrapper mt-2">
                <x-forms.input-label for="reciever" :value="__('Ontvanger')" />
                <x-forms.text-input name="reciever" type="text" class="mt-1 block w-full  js-search-input"
                  placeholder="vul de naam van de ontvanger in" autocomplete="off" />
                <x-forms.input-error class="mt-2" :messages="$errors->get('reciever')" />
                {{-- results --}}
                <ul
                  class="border border-gray-200 bg-white z-10 absolute  w-full js-search-results hidden max-h-40 overflow-y-scroll ">
                  @foreach ($users as $user)
                    <li class="p-2 hover:bg-gray-100 cursor-pointer">{{ $user->email }}</li>
                  @endforeach
                </ul>
              </div>
              <div>
                <x-forms.input-label for="amount" value='hoeveel {{ $group->unit }} wil je overschrijven?' />
                <x-forms.text-input name="amount" type="number" class="mt-1 block w-full" required
                  placeholder="getal" />
                <x-forms.input-error class="mt-2" :messages="$errors->get('amount')" />
              </div>
              <div>
                <x-forms.input-label for="description" value='omschrijving' />
                <x-forms.text-area name="description" type="text" class="mt-1 block w-full" required
                  placeholder="beschrijf hier waarom je de kruisjes overschrijft" />
                <x-forms.input-error class="mt-2" :messages="$errors->get('description')" />
              </div>
              <div>
              </div>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <x-buttons.secondary-button type="submit">{{ __('Transactie aanmaken') }}</x-buttons.secondary-button>
            <a href="{{ route('group.transactions.create', $group) }}" class="bg-red-500 p-2 rounded-lg">
              @include('components.icons.close', ['class' => 'stroke-white'])
            </a>

          </div>
        </div>



      </div>
  </div>
  </form>
  </div>
</x-app-layout>
