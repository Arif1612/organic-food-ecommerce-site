@props(['name', 'type', 'label' => null, 'value' => ''])

<div class="mb-3">
    @if ($label)
        <label name="{{ $name }}" for="{{ $name }}" class="form-label">{{ $label }} </label>
    @endif


    <input name="{{ $name }}" type="{{ $type }}" id="{{ $name }} " value="{{ $value }}"
        {{ $attributes->merge(['class' => 'form-control']) }} unique>

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
