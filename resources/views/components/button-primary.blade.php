<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border border-primary rounded-3xl font-semibold text-base text-white bg-primary hover:text-primary hover:bg-white focus:bg-primary active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
