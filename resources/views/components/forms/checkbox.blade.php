@props(['name' => '', 'checklist', 'checkedItems' => []])

@foreach ($checklist as $key => $item)
    <div class="mb-3 form-check">
        <input name="{{ $name }}" type="checkbox" id="{{ $key }}Input"
            {{ $attributes->merge(['class' => 'form-check-input']) }} @if (in_array($key, $checkedItems)) checked @endif>

        <label class="form-check-label" for="{{ $key }}Input"> {{ $item }} </label>
    </div>
@endforeach
