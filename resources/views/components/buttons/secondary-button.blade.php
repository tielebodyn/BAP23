<button {{ $attributes->merge(['type' => 'button', 'class' => 'bg-violet-400 hover:bg-violet-500  py-2 px-3 md:px-8 text-center text-sm md:text-md text-gray-50 rounded-lg']) }}>
    {{ $slot }}
</button>
