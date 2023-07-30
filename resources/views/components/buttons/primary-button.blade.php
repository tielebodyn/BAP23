<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-black py-3 px-16 text-center text-gray1 rounded-lg']) }}>
    {{ $slot }}
</button>
