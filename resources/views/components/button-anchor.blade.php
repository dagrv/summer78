<a {{ $attributes->merge(['href' => '#', 'class' => 'inline-flex items-center px-4 py-3 bg-black border border-transparent rounded-md font-semibold text-lg text-white hover:bg-green-500 active:bg-black focus:outline-none focus:border-gray-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>