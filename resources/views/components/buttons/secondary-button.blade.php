<button {{ $attributes->merge(['type' => 'button', 'class' => 'bg-violet-400 hover:bg-violet-500  py-2 px-8 text-center text-gray-50 rounded-lg']) }}>
    {{ $slot }}
</button>
