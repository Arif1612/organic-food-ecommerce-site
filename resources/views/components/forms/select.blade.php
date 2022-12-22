@props(['name', 'type', 'label' => null, 'value' => '', 'options' => []])

<div class="mb-3">
    @if ($label)
        <label name="{{ $name }}" for="{{ $name }}" class="form-label">{{ $label }} </label>
    @endif

    <select name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}>

        <option value="">Select One</option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>


    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
