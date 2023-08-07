<button {{ $attributes->merge(['type' => 'button', 'class' => 'bg-violet-400  py-2 px-16 text-center text-gray-50 rounded-lg']) }}>
    {{ $slot }}
</button>
