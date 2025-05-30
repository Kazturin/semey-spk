@props(['disabled' => false, 'required' => false])

<textarea @disabled($disabled) {{ $required ? 'required' : '' }} {{ $attributes->merge(['class' => 'placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border border-gray-400 rounded-lg bg-gray-200  focus:border-primary focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-2 ring-secondary']) }}>
{{ $slot }}    
</textarea>
