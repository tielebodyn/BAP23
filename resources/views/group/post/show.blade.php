@vite('resources/js/components/image-slider.js')
<x-app-layout :$group>
  <div class="flex flex-col items-between max-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 w-full">
      <x-post.item :post="$post" :group="$group" :detail="true" />
    </div>

    <ul class=" lg:max-h-96 overflow-y-auto text-sm md:text-base w-full">
      @foreach ($comments as $comment)
        <li>
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-2">
            <div class="bg-white mb-3 rounded-md shadow">
              <div class="flex items-center justify-between border-b gray-200 p-2">
                <a href="{{ route('group.members.show', [$group, $comment->user]) }}">
                  <div class="flex items-center">
                    <img src="{{ asset($comment->user->profile_image) }}" alt="{{ $comment->user->name }}"
                      class="rounded-full mr-2 w-7 h-7 md:w-10 md:h-10">
                    <p>{{ $comment->user->name }}</p>
                  </div>
                </a>
                <div class="flex">
                  @if ($comment->user_id === auth()->user()->id)
                    <form action="{{ route('group.post.comment.destroy', [$group, $post, $comment]) }}" method="POST"
                      class="mr-2">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-500 hover:text-red-700 cursor-pointer">delete</button>
                    </form>
                  @endif
                  {{ $comment->created_at->locale('nl')->diffForHumans() }}
                </div>
              </div>
              <div class="p-5"> {{ $comment->message }} </div>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10 mt-5 w-full">
      <div class="w-full flex flex-col space-y-2 p-5 bg-white shadow rounded-md">
        <x-header title="comment plaatsen" class="ml-2" />
        <form action="{{ route('group.post.comment', [$group, $post]) }}" class="flex w-full items-center space-x-2"
          method="POST">
          @csrf
          @method('POST')
          <x-forms.text-input  placeholder="typ comment" name="comment" type="text" class="cursor-text w-full"
            autocomplete="off" />
          <x-buttons.primary-button class="js-add-tag" type="submit">
            Plaatsen
          </x-buttons.primary-button>
        </form>
        <x-forms.input-error :messages="$errors->get('comment')" class="mt-2" />
        {{-- TODO:  create invitation link with group->invitation_token  --}}
      </div>
    </div>
  </div>

</x-app-layout>
