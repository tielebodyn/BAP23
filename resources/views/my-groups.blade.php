<x-app-layout :$group>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
          <x-header title="groepen" description="dit zijn de groepen waar je lid van bent of waar je bent uitgenodigd"
            class="mb-5" />
          <h1 class="text-lg font-semibold">mijn groepen ({{ count($groups) }})</h1>
          @if (count($groups) == 0)
            <div class="flex space-x-1">
              <p>je bent nog geen lid van een groep, je kan hier </p>
              <a href="{{ route('group.create') }}" class="btn btn-primary text-blue-500 hover:text-blue-700"> een groep maken</a>
            </div>
          @endif
          @foreach ($groups as $group)
            {{-- list of invited groups with accept and deny button --}}
            <a href="{{ route('group.dashboard', $group) }}">
              <li class="list-none bg-gray-100 flex p-2 rounded justify-between items-center  hover:shadow mb-2">
                <div class="flex items-center space-x-4">
                  <img src="{{ asset($group->logo) }}" alt="" class="w-8 h-8 rounded-full">
                  <p>{{ $group->name }}</p>
                </div>
              </li>
            </a>
          @endforeach
        </div>
        <div class="p-6">
          <h1 class="text-lg font-semibold">uitgenodigde groepen ({{ count($invitedGroups) }})</h1>
          @if (count($invitedGroups) == 0)
            <p>je bent niet uitgenodigd voor een groep</p>
          @endif
          <ul>
            @foreach ($invitedGroups as $group)
              {{-- list of invited groups with accept and deny button --}}
              <li class="list-none bg-gray-100 flex p-2 rounded justify-between items-center shadow m">
                <div class="flex items-center space-x-4">
                  <img src="{{ asset($group->logo) }}" alt="" class="w-8 h-8 rounded-full">
                  <p>{{ $group->name }}</p>
                </div>
                <div class="flex items-center space-x-2">
                  <form action="{{ route('group.accept', $group) }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="bg-green-400 rounded-full p-1">@include('components.icons.check', [
                        'class' => 'stroke-green-50 fill-green-50 w-7 h-7',
                    ])</button>
                  </form>
                  <form action="{{ route('group.decline', $group) }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="bg-red-400 rounded-full p-1">@include('components.icons.close', ['class' => 'stroke-red-50 fill-red-50 w-7 h-7'])</button>
                  </form>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
