<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-red-500 hover:bg-red-600 py-2 px-8 text-center text-gray-50 rounded-lg']) }}>
    {{ $slot }}
</button>
{{-- py-2 px-8 text-center text-gray-50 rounded-lg --}}
