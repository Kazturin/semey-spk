@props(['disabled' => false, 'required' => false])

<input @disabled($disabled) {{ $required ? 'required' : '' }} {{ $attributes->merge(['class' => 'placeholder-gray-600 w-full px-4 py-2.5 text-base transition duration-500 border border-gray-400 ease-in-out transform rounded-lg bg-gray-200  focus:border-secondary focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-2 ring-secondary']) }}>
