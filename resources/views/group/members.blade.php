<x-app-layout :$group>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
               <h1>This is the members page</h1>
                @foreach ($group->users as $user)
                     <p>{{$user->name}}</p>
                @endforeach
                @dump($group->name)
        </div>
    </div>

     <div class="w-full relative js-searchbar-wrapper mt-2">
            <x-forms.input-label for="name" :value="__('gebruiker toevoegen')" />
            <input placeholder="voeg hier toe" class="mt-1 w-full js-tag-input p-2 rounded  cursor-pointer"
              autocomplete="off" />
            <ul
              class="border border-gray-200 bg-white z-10 absolute  w-full js-tag-list max-h-40 overflow-y-scroll hidden">
              @foreach ($users as $user)
                @if (!$group->users->contains($user))
                  <li class="flex items-center m-2 border-b-2">
                    <img src="{{ asset($user->profile_image) }}" alt="{{ $user->name }}" class="rounded-full mr-2"
                      width="40" height="40">
                    <span>{{ $user->name }}</span>
                  </li>
                @else
                  <li class="flex items-center m-2 border-b-2">
                    <img src="{{ asset($user->profile_image) }}" alt="{{ $user->name }}" class="rounded-full mr-2"
                      width="40" height="40">
                    <span>{{ $user->name }}</span>
                  </li>
                @endif
              @endforeach
            </ul>
          </div>

</x-app-layout>
