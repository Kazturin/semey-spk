@props(['value','required' => false])

<label {{ $attributes->merge(['class' => 'block text-gray-600 font-medium mb-2']) }}>
    {{ $value ?? $slot }}
    @if ($required)
        <sup class="text-red-600 dark:text-red-400 font-medium">*</sup>
    @endif
</label>
