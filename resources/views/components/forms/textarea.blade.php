@props(['name', 'type', 'cols' => '', 'rows' => '', 'label' => null, 'value' => ''])

<div class="mb-3">
    @if ($label)
        <label name="{{ $name }}" for="{{ $name }}" class="form-label">{{ $label }} </label>
    @endif

    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}" cols="{{ $cols }}"
        {{ $attributes->merge(['class' => 'form-control']) }}>{{ $value }}</textarea>


    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
