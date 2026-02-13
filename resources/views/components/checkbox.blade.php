@props([
    'name',
    'label',
])

<div class="mb-4">
    <input
        type="checkbox"
        value="1"
        id="{{ $name }}"
        name="{{ $name }}"
    />
    <label
        class="text-gray-700"
        for="{{ $name }}">
        {{ $label }}
    </label>
</div>
