
@props(['post', 'group'])
<div class="bg-white mb-1 rounded w-80 md:w-96">

  <div class="flex items-center justify-between border-b gray-200 p-2">
    <div class="flex items-center">

      <p>{{ $post->user->name }}</p>
    </div>
    <div class="mr-2">
      {{ $post->created_at->locale('nl')->diffForHumans() }}

      @if ($post->type == 'aanbod')
        <span class="bg-green-500 text-white rounded px-2 py-1 text-xs font-bold mx-2">Aanbod</span>
      @endif
      @if ($post->type == 'vraag')
        <span class="bg-red-500 text-white rounded px-2 py-1 text-xs font-bold mx-2">Vraag</span>
      @endif
    </div>
  </div>
  <div class="p-2">
    <div class="flex items-center justify-between mb-1">
      <h1 class="text-lg  font-bold text-gray-600">{{ $post->title }}</h1>
      <a href="{{ route('group.post.show', [$group, $post]) }}" class="flex items-center">bekijken
        @include('components.icons.caret-down', ['class' => '-rotate-90 fill-gray-600']) </a>

    </div>

    <div class="flex  h-32 ">
      <div class="w-6/12 h-full">
        <!-- slider container -->
        <div class="{{ $post->type == 'aanbod' ? 'slider' : '' }} slider w-full h-full relative overflow-hidden rounded">
          @if ($post->type == 'aanbod')
            <img src="{{ asset($post->images->first()->image_path) }}"
              class="slide absolute bg-gray-50 rounded h-full w-full object-contain">
          @endif
          @if ($post->type == 'vraag')
            <div class="bg-gray-50 rounded h-full w-full p-5">
                {{ $post->description }}
            </div>
            @endif
        </div>
      </div>

      <div class="w-6/12 h-full bg-gray-50 rounded grid  grid-cols-2 grid-rows-2  gap-1 ">
        <div
          class="rounded h-full border-4 text-violet-500 border-violet-500  border-opacity-20  items-center  flex flex-col  w-full cursor-pointer">
          @if ($post->price != 0)
            <span class=" text-2xl">
              {{ $post->price }}
            </span>
            <span class="hidden lg:block scale-75 md:text-lg text-xs mb-1">
              {{ $group->unit }}
            </span>
          @endif
          @if ($post->price == 0)
            <span class="hidden scale-75 ">
              {{ $group->unit }}
            </span>
          @endif
        </div>



        @foreach ($post->categories as $category)
          <div style="border: 6px solid rgba({{ $category->color }},0.2); color:  rgba({{ $category->color }},0.8"
            class=" h-full border-4 border-gray-400 rounded-lg justify-center items-center  flex flex-col  w-full cursor-pointer">
            <span class=" text-2xl">
              {{ $category->icon }}
            </span>
            <span class="hidden scale-75 mt-1">
              {{ $category->name }}
            </span>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
