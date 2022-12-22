<x-backend.master>
    <x-slot:title>
        Edit Product
    </x-slot:title>



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('products.index') }}">
                <button type="button" class="btn btn-sm btn-outline-info">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>

    <x-forms.errors />

    <form action=" {{ route('products.update', $product->id) }} " method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <x-forms.input name="name" label="Products Name" type="text" :value="old('name', $product->name)"
                placeholder="give your product name" />

            <x-forms.input name="price" type="number" label="Price" :value="old('price', $product->price)" />

            @if (substr($product->image, 0, 5) == 'https')
                <img width="200px" src="{{ $product->image }}" alt="">
            @else
                <img width="200px" src="{{ asset('storage/products/' . $product->image) }}" />
            @endif

            <x-forms.input name="image" type="file" label="Picture" />
            <x-forms.textarea name='description' label="Description" :value="old('description', $product->description)" cols="30" rows="5" />

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        @php

            $checklist = ['Is Available ?'];

            if ($product->is_active) {
                $checkedItems = [0];
            } else {
                $checkedItems = [];
            }

        @endphp

        <x-forms.checkbox name="is_active" :checklist="$checklist" :checkedItems="$checkedItems" />


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-backend.master>
