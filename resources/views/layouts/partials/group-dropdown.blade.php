      {{-- dropdown start --}}
      <div class="js-dropdown-wrapper group-selection relative m-5">
        <button type="button"
          class="js-dropdown-button w-full self-baseline text-gray-600 flex bg-gray-200 py-3 px-2 justify-between relative z-10">
          @if (isset($newGroup))
            nieuwe groep
          @elseif (!isset($group))
            <span class="pr-5"> selecteer groep </span>
            @include('components.icons.caret-down', ['class' => 'fill-gray-600 stroke-gray-600'])
          @else
            <img class="w-6 rounded" src={{ asset($group->logo) }}><img /><span class="pr-5">
              {{ $group->name }}
            </span>
            @include('components.icons.caret-down', ['class' => 'fill-gray-600 stroke-gray-600'])
          @endif
        </button>
        <div class="js-dropdown-menu shadow-lg bg-gray-100 absolute w-full hidden">
          <input placeholder="zoeken" class="js-group-input border-0 bg-transparent w-full p-2 cursor-pointer"
            autocomplete="off" />
          <div class="dropdown relative max-h-32 overflow-y-scroll no-scrollbar">
            <ul class="shadow-inner js-group-list">
              @foreach (auth()->user()->groups->where('pivot.status', 'accepted') as $userGroup)
                <li>
                  <a href="{{ route('group.dashboard', $userGroup) }}"
                    class="self-baseline text-gray-600 flex py-3 px-2 justify-start space-x-3 relative z-10 border-b-2 mt-1 hover:bg-white"><img
                      class="w-6 rounded" src={{ asset($userGroup->logo) }}><img /><span class="pr-5">
                      {{ $userGroup->name }}
                    </span>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
          <a href="{{ route('group.create') }}"
            class="self-baseline  text-gray-600 flex py-3 w-full  justify-between relative z-10 py-3 px-2 hover:bg-white">
            nieuwe groep
            </span>
            @include('components.icons.plus', ['class' => 'stroke-gray-600'])
          </a>
        </div>
      </div>
      {{-- dropdown end --}}
