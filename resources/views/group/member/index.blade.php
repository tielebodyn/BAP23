<x-app-layout :$group>



  <div class="w-full h-40 bg-white border-b border-gray-200 flex justify-center space-x-24 flex-col p-2 md:p-10">
    <form action="{{ route('group.members.search', $group) }}" method="post" class="m-0">
      @csrf
      @method('POST')
      <x-header title="Leden" class="mt-16 sm:mt-4 mb-4" />
      <div class="origin-left scale-90 lg:scale-100 space-x-2 md:space-x-0 w-full flex items-center justify-between">
        <div class="flex items-center">
          <x-forms.search name="search" icon="search" placeholder="Zender, Ontvanger" />
          <x-forms.dropdown name="status" class="ml-1 lg:ml-4">
            <option selected disabled>status</option>
            <option value="">Alle</option>
            <option value="accepted">Actief</option>
            <option value="awaiting"> In Afwachting</option>
            <option value="denied">Geweigerd</option>
          </x-forms.dropdown>
          <x-buttons.primary-button class="ml-1 lg:ml-4">
            Zoeken
          </x-buttons.primary-button>
        </div>
      </div>
    </form>
  </div>
  @if (isset($searchQuery))
    <div class="m-2">
      <span class="text-sm text-gray-500">Zoekresultaten voor: <span class="font-medium">{{ $searchQuery['query'] }}
          {{ $searchQuery['status'] }}</span></span>
      <a href="{{ route('group.members', $group) }}" class="ml-2 text-sm text-gray-500">wis zoekopdracht</a>
    </div>
  @endif
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 h-[75vh] flex flex-col justify-between">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg border max-h-96 md:max-h-[70vh]">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">

              </th>
              <th scope="col" class="px-6 py-3">
                Gebruikersnaam
              </th>
              <th scope="col" class="px-6 py-3">
                email
              </th>
              <th scope="col" class="px-6 py-3">
                punten
              </th>
              <th scope="col" class="px-6 py-3">
                status
              </th>
              <th scope="col" class="px-6 py-3">
                Profiel bekijken
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($members as $member)
              <tr class="bg-white border-b">
                <th scope="row"
                  class="pl-6 py-4 font-medium text-gray-900 whitespace-nowrap flex items-center justify-center">
                  <x-profile.image :user="$member" class="rounded-full xl:mr-2 w-6 h-6 xl:w-8 xl:h-8" />
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                  {{ $member->username }}
                </th>
                <td class="px-6 py-4">
                  {{ $member->email }}
                </td>
                <td class="px-6 py-4">
                  {{ $group->users()->where('user_id', $member->id)->first()->pivot->points }}
                </td>
                <td class="px-6 py-4">
                  @if ($member->pivot->status == 'accepted')
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded ">
                      Actief
                    </span>
                  @elseif ($member->pivot->status == 'awaiting')
                    <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded ">
                      In Afwachting
                    </span>
                  @elseif ($member->pivot->status == 'denied')
                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded ">
                      Geweigerd
                    </span>
                  @endif
                </td>
                <td class="px-6 py-4">
                  <a href="{{ route('group.members.show', [$group, $member]) }}"
                    class="font-medium text-blue-600 hover:underline">Bekijken</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div
        class="relative overflow-x-auto shadow-md sm:rounded-lg border w-full h-32 flex items-center justify-center js-searchbar-wrapper">
        <div class="px-2 w-full lg:px-0 lg:w-1/2 flex items-center flex-col space-y-2 scale-75 lg:scale-100">
          <x-header title="gebruiker uitnodigen" />

          <form action="{{ route('group.members.invite', $group) }}" class="flex w-full space-x-2 items-center"
            method="POST">
            @csrf
            @method('POST')
            <input placeholder="vul hier een email adres in" name="email" type="email"
              class="mt-1 js-tag-input p-2 rounded  cursor-pointer w-full" autocomplete="off" />
            <x-buttons.primary-button class="js-add-tag" type="submit">
              Uitnodigen
            </x-buttons.primary-button>
          </form>
          <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
          {{-- TODO:  create invitation link with group->invitation_token  --}}
        </div>
      </div>
    </div>
  </div>
  </div>

</x-app-layout>
