<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-slate-900 py-2 px-16 text-center text-gray-50 rounded-lg']) }}>
    {{ $slot }}
</button>
