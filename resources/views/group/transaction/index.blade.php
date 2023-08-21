<x-app-layout :$group>

  <div class="w-full h-40 bg-white border-b border-gray-200 flex justify-center space-x-24 flex-col p-2 md:p-10">
    <form action="{{ route('group.transactions.search', $group) }}" method="post" class="m-0">
      @csrf
      @method('POST')
      <x-header title="Transacties" class="mt-16 sm:mt-4 mb-4" />
      <div class=" origin-left scale-90 lg:scale-100 space-x-2 md:space-x-0 w-full flex items-center justify-between ">
        <div class="flex  space-x-2 md:space-x-4">
          <x-forms.search name="search" icon="search" placeholder="Zender, Ontvanger" />
          <x-buttons.primary-button class="ml-4">
            Zoeken
          </x-buttons.primary-button>
        </div>
        <a href="{{ route('group.transactions.create', $group) }}"><x-buttons.secondary-button>
            <span class="hidden xl:block">Nieuwe Transactie</span>
            <span class="xl:hidden text-sm md:text-base">Toevoegen</span>

          </x-buttons.secondary-button></a>
      </div>
    </form>
  </div>
  @if ($transactions->count() == 0)
    <div class="flex flex-col justify-center items-center mt-12">
      <div class="flex flex-col justify-center items-center space-y-4">
        @include('components.icons.search', ['class' => 'w-24 h-24 fill-gray-500 '])
        <span class="text-gray-500 text-2xl">Er zijn nog geen transacties</span>
        <a href="{{ route('group.transactions.create', $group) }}" class="text-blue-500 hover:text-blue-700">
          Transactie toevoegen?
        </a>
      </div>
    </div>
  @else
    <div class="py-12">
      @if (isset($searchQuery))
        <div class="m-2">
          <span class="text-sm text-gray-500">Zoekresultaten voor: {{ $searchQuery }}</span></span>
          <a href="{{ route('group.transactions', $group) }}" class="ml-2 text-sm text-gray-500">wis zoekopdracht</a>
        </div>
      @endif

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 h-[75vh] flex flex-col justify-between">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border max-h-96 md:max-h-[70vh]">
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>

                <th scope="col" class="px-6 py-3">
                  Zender
                </th>
                <th scope="col" class="px-6 py-3">
                  punten
                </th>
                <th scope="col" class="px-6 py-3">
                  ontvanger
                </th>

                <th scope="col" class="px-6 py-3">
                  beschrijving
                </th>
                <th scope="col" class="px-6 py-3"> datum </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactions as $transaction)
                <tr class="bg-white border-b">
                  <th scope="row" class="px-6 py-4 whitespace-nowrap font-normal">
                    {{ $transaction->users()->wherePivot('owner', true)->first()->name }}
                  </th>
                  <td class="px-6 py-4">
                    {{ $transaction->amount }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $transaction->users()->wherePivot('owner', false)->first()->name }}
                  </td>

                  <td class="px-6 py-4 ">
                    <div class="min-w-[15rem] md:w-unset">
                      {{ $transaction->description }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    @if (isset($transaction->created_at))
                      {{ $transaction->created_at->locale('nl')->diffForHumans() }}
                    @endif

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @endif
  </div>

</x-app-layout>
