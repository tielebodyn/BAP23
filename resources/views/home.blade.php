<x-app-layout :$group>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
          <h1 class="text-lg font-semibold">mijn groepen</h1>

        </div>
        <div class="p-6">
          <h1 class="text-lg font-semibold">uitgenodigde groepen</h1>
          <ul>
            @foreach ($invitedGroups as $group)
              {{-- list of invited groups with accept and deny button --}}
              <li class="list-none bg-gray-100 flex p-2 rounded justify-between items-center shadow m">
                <div class="flex items-center space-x-4">
                <img src="{{asset($group->logo)}}" alt="" class="w-8 h-8">
                <p>{{ $group->name }}</p> </div>
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
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
