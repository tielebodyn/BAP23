<button {{ $attributes->merge(['type' => 'button', 'class' => 'bg-gray2 m-5 py-3 px-16 text-center text-black rounded-lg']) }}>
    {{ $slot }}
</button>
