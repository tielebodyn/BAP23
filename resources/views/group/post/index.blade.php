<x-app-layout :$group>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <h1>This is the Trade page</h1>
    <a href="{{ route('group.post.create', $group) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create new post</a>
      <ul>
        @foreach ($activePosts as $post)
          <li class="bg-gray-200 mb-3 rounded">
           <div class="flex">
            <img src="{{ asset($post->user->profile_image) }}" alt="{{ $post->user->name }}" class="rounded-full mr-2"
              width="40" height="40">
            <p>{{ $post->user->name }}</p>
            </div>
            <p>{{ $post->title }}</p>
            <p>{{ $post->description }}</p>
            <ul class="flex">
              @foreach ($post->categories as $category)
                <li class="bg-blue-200 rounded m-2 w-fit">{{ $category->name }}</li>
              @endforeach
            </ul>
            <p>{{ $post->price }} {{ $post->group->unit }} </p>
          </li>
        @endforeach
      </ul>

    </div>
  </div>
</x-app-layout>
