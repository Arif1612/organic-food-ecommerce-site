@props(['name', 'type'])

<div class="mb-3">
    <label name="{{ $name }}" for="{{ $name }}" class="form-label">{{ ucwords($name) }} </label>

    <input name="{{ $name }}" type="{{ $type }}" id="{{ $name }}"
        {{ $attributes->merge(['class' => 'form-control']) }} unique>

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
