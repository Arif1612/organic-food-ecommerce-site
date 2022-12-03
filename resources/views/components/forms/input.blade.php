@props(['name'])

<div class="mb-3">
    <label name=" {{ $name }} " for=" {{ $name }} " class="form-label">Name</label>
    <input name=" {{ $name }} " type="text" id="{{ $name }} "
        {{ $attributes->merge(['class' => 'form-control']) }} unique>

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
