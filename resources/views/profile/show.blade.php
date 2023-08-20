@vite('resources/js/components/image-slider.js')
<x-app-layout :$group>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div
        @if ($user->profile_color) style="background-color: {{ $user->profile_color }}" @else style="background-color: #808080" @endif
        class='h-36 w-100 rounded rounded-b-none flex justify-end items-start relative'>
        <x-profile.image :user="$user"
          class="bg-gray-50 rounded-full mr-2 absolute left-6 -bottom-8 shadow-lg w-24 h-24" />

      </div>
      <div class="p-4 sm:p-8 bg-white shadow rounded-b-lg">
        <div class="w-full flex justify-between items-center">
          <h1 class="font-bold mt-2">{{ $user->username }}</h1>
          <a href="{{ route('profile.edit', $group) }}" class="btn btn-primary"><x-buttons.primary-button> aanpassen
              </x-primary-button></a>
        </div>
        <div class="space-y-2 pt-2">
          <div>
            <span class="font-bold">E-mail:</span>
            {{ $user->email }}
          </div>
          <div>
            <span class="font-bold"> naam: </span>
            {{ $user->name }}
          </div>

          @if (isset($group))
            <div>
              <span class="font-bold">hoeveelheid {{ $group->unit }}:</span>
              {{ $group->users()->where('user_id', $user->id)->first()->pivot->points }}
            </div>
          @endif
        </div>
        <div class="bg-gray-50 shadow rounded-lg p-6 mt-5">
          @if ($user->description == null)
            <div class="text-gray-500">geen beschrijving</div>
          @endif
        <div class="font-bold mb-1">
            beschrijving:
        </div>
          {{ $user->description }}
          <div class="mt-2">
            <div class="font-bold mb-1"> interesses: </div>
            @if ($user->tags->count() == 0)
              geen interesses
            @endif
            <ul class="flex">
              @foreach ($user->tags as $tag)
                <x-tag :tag="$tag" :close="false" :selected="true" />
                </span>
              @endforeach
            </ul>
          </div>
        </div>
        <div>
          @if ($posts)
            <div class="flex items-center space-x-2 my-2">
              <x-header title="mijn ruilen ({{ $posts->count() }})" class="" />
              <a href="{{ route('profile.show') }}" class="text-blue-500 hover:text-blue-700">alles</a>
              <span>/</span>
              <a href="{{ route('profile.show') }}?status=active" class="text-blue-500 hover:text-blue-700">actief</a>
              <span>/</span>
              <a href="{{ route('profile.show') }}?status=inactive"
                class="text-blue-500 hover:text-blue-700">inactief</a>
            </div>
          @else
            <x-header title="mijn ruilen (0)" class="mt-4 mb-2" />
          @endif
          @if ($posts)
            @foreach ($posts as $post)
              <x-post.item :$post :$group />
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
