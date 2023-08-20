@vite('resources/js/pages/group/dashboard.js')
@vite('resources/js/components/image-slider.js')
<x-app-layout :$group>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div style="background-color: {{ $user->profile_color }}"
        class='h-36 w-100 rounded rounded-b-none flex justify-end items-start relative'>
        <x-profile.image :user="$user"
          class="bg-gray-50 rounded-full mr-2 absolute left-6 -bottom-8 shadow-lg w-24 h-24" />
      </div>
      <div class="p-4 sm:p-8 bg-white shadow rounded-b-lg">
        <div class="w-full flex justify-between items-center">
          <h1 class="font-bold mt-2">{{ $user->username }}</h1>
        </div>
        <div class="space-y-2 pt-2">
          <div>
            <span class="font-bold">email</span>
            {{ $user->email }}
          </div>
          <div>
            <span class="font-bold"> naam: </span>
            {{ $user->name }}
          </div>
          <div>
            <span class="font-bold">hoeveelheid {{ $group->unit }}:</span>
            {{ $group->users()->where('user_id', $user->id)->first()->pivot->points }}
          </div>
        </div>
        <div class="bg-gray-50 shadow rounded-lg p-6 mt-5">
          <div class="font-bold mb-1"> Beschrijving: </div>
          {{ $user->description }}
          <div class="mt-2">
            <div class="font-bold mb-1"> Interesses: </div>
            <ul class="flex">
              @foreach ($user->tags as $tag)
                <x-tag :tag="$tag" :close="false" :selected="true" />
                </span>
              @endforeach
            </ul>
          </div>
        </div>
        <div>
          <x-header title="Actieve Ruilen" class="mt-4 mb-2" />
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
