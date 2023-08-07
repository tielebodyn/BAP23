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
</x-app-layout>
