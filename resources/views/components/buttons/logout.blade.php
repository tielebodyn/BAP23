 <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
            @csrf
            <button type="submit" class="bg-black m-5 py-3 px-16 text-center text-gray1 rounded-lg">
                {{ __('uitloggen') }}
            </button>
        </form>

