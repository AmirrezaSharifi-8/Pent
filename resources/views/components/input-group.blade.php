@props([
    'name',
    'type' => 'text',
    'label' => false,
    'placeholder' => '',
    'autofocus' => false
])

<div class="mb-4">
    @if($label)
        <label for="email" class="inline-block mb-1 text-gray-700">{{ $label }}</label>
    @endif
    <div>
        <input
            type="{{ $type }}"
            class="focus:outline-2 transition w-full rounded-lg py-2 px-4 border-1 shadow-xs @error($name) focus:outline-red-200 border-red-300 @else focus:outline-gray-400 border-gray-300 @enderror"
            placeholder="{{ $placeholder }}"
            id="{{ $name }}"
            name="{{ $name }}"
            autocomplete="new-{{ $name }}"
            required
            @if($autofocus) autofocus @endif
        />

        @error($name)
        <span class="text-red-500 mt-2 inline-block text-sm">{{ $message }}</span>
        @enderror
    </div>
</div>
