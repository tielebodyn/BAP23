<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-slate-800 hover:bg-slate-900 py-2 px-8 text-center text-gray-50 rounded-lg']) }}>
    {{ $slot }}
</button>

