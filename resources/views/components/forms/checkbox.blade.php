@props(['name' => '', 'checklist' => [], 'checkedItems' => [], 'label' => null, 'id' => null])

<label class="form-check-label"> {{ $label }} </label>

@foreach ($checklist as $key => $item)
    <div class="mb-3 form-check">
        <input name="{{ $name }}" type="checkbox" id="{{ $key . $id }}Input" value="{{ $key }}"
            {{ $attributes->merge(['class' => 'form-check-input']) }} @if (in_array($key, $checkedItems)) checked @endif>

        <label class="form-check-label" for="{{ $key . $id }}Input"> {{ $item }} </label>
    </div>
@endforeach
