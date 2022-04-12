<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-3 bg-black border border-transparent rounded-md font-semibold text-lg text-white active:bg-black focus:outline-none focus:border-orange-500 focus:ring ring-orange-400 disabled:opacity-25 transition ease-in-out duration-50']) }}>
    {{ $slot }}
</button>