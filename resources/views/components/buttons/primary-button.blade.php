<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-slate-800 hover:bg-slate-900 py-2 px-3 md:px-8 text-center text-sm md:text-md text-gray-50 rounded-lg']) }}>
    {{ $slot }}
</button>

