<button {{ $attributes->merge(['type' => 'button', 'class' => 'bg-accent  py-3 px-16 text-center text-gray1 rounded-lg']) }}>
    {{ $slot }}
</button>
