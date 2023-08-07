 <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
            @csrf
            <button type="submit" class="bg-slate-900 m-5 py-3 px-16 text-center text-gray-50 rounded-lg">
                {{ __('uitloggen') }}
            </button>
        </form>

