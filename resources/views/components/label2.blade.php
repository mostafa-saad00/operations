@props(['value'])

<label {{ $attributes->merge(['class' => 'font-medium  text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>
