@props(['post', 'group', 'detail' => false])
<div class="bg-white mb-3 rounded-md shadow">
  <div class="flex items-center justify-between border-b gray-200 p-2">
    <div class="flex items-center">
      <img src="{{ asset($post->user->profile_image) }}" alt="{{ $post->user->name }}" class="rounded-full mr-2"
        width="34" height="34">
      <p>{{ $post->user->name }}</p>
    </div>

    <div>
      {{ $post->created_at->locale('nl')->diffForHumans() }}

      @if ($post->type == 'aanbod')
        <span class="bg-green-500 text-white rounded px-2 py-1 text-xs font-bold mx-4">Aanbod</span>
      @endif
      @if ($post->type == 'vraag')
        <span class="bg-red-500 text-white rounded px-2 py-1 text-xs font-bold mx-4">Vraag</span>
      @endif
    </div>
  </div>
  <div class="p-5">
    <div class="flex items-center justify-between mb-3">
      <x-header title="{{ $post->title }}" />
      @if (!$detail)
        <a href="{{ route('group.post.show', [$group, $post]) }}" class="flex">bekijken @include('components.icons.caret-down', ['class' => '-rotate-90 fill-gray-600'])
        </a>
      @endif
    </div>

    <div class="flex md:h-80 h-40 items-center">
      <div class="w-6/12 h-full">
        <!-- slider container -->
        <div class="{{ $post->type == 'aanbod' ? 'slider' : '' }} w-full h-full relative overflow-hidden rounded">
          @if ($post->type == 'aanbod')
            @foreach ($post->images as $image)
              <img src="{{ asset($image->image_path) }}"
                class="slide absolute bg-gray-50 rounded h-full w-full object-contain">
            @endforeach
            <button
              class="shadow btn btn-next absolute md:p-2 p-0.5 rounded h-fit  cursor-pointer bg-white opacity-50 md:top-1/3 bottom-2 right-2">
              @include('components.icons.caret-down', ['class' => '-rotate-90 fill-gray-600'])
            </button>
            <button
              class="shadow btn btn-prev btn btn-next absolute md:p-2 p-0.5 rounded h-fit  cursor-pointer opacity-50 bg-white md:top-1/3 bottom-2 left-3">
              @include('components.icons.caret-down', ['class' => 'rotate-90 fill-gray-600'])</button>
          @endif
          @if ($post->type == 'vraag')
            <div class="bg-gray-50 rounded h-full w-full p-5">
              {{ $post->description }}
            </div>
          @endif
        </div>
      </div>
         @include('components.icons.trade', ['class' => 'fill-gray-200 m-2'])
      <div
        class="w-6/12 h-full bg-gray-50 rounded grid  grid-cols-2 grid-rows-2 lg:py-4 lg:px-10 md:py-2 lg:gap-y-5 xl:gap-x-10 gap-1">

        <div
          class="border-4 text-violet-500 border-violet-500  border-opacity-20 h-full rounded-lg justify-center items-center  flex flex-col  w-full cursor-pointer">
          @if ($post->price != 0)
            <span class="md:text-5xl text-2xl">
              {{ $post->price }}
            </span>
            <span class="hidden lg:block scale-75 md:text-lg text-xs mt-2">
              {{ $group->unit }}
            </span>
          @endif
          @if ($post->price == 0)
            <span class="md:text-2xl text-2xl text-bold">
              {{ $group->unit }}
            </span>
          @endif
        </div>

        @foreach ($post->categories as $category)
          <div style="border: 4px solid rgba({{ $category->color }},0.2); color:  rgba({{ $category->color }},0.8"
            class=" h-full border-4 border-gray-400 rounded-lg justify-center items-center  flex flex-col  w-full cursor-pointer">
            <span class="md:text-5xl text-2xl">
              {{ $category->icon }}
            </span>
            <span class="hidden lg:block scale-75 md:text-lg text-xs mt-2">
              {{ $category->name }}
            </span>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
