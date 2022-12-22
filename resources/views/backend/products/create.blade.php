<x-backend.master>
    <x-slot:title>
        {{ __('Create New Product') }}
    </x-slot:title>



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ __('Products') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('products.index') }}">
                <button type="button" class="btn btn-sm btn-outline-info">
                    <span data-feather="list"></span>
                    {{ __('List') }}
                </button>
            </a>
        </div>
    </div>

    {{-- all error message shown here --}}
    <x-forms.errors />

    <form action=" {{ route('products.store') }} " method="post" enctype="multipart/form-data">
        @csrf

        <x-forms.select name="category_id" required label="Select Category" :options="$categories" />

        <x-forms.input name="name" type="text" label="Product Name" placeholder="give your category name"
            :value="old('name')" />
        <x-forms.input name="price" type="number" label="Price" />
        <x-forms.input name="image" type="file" label="Picture" />

        <x-forms.textarea name='description' :value="old('description')" label="Description" cols="30" rows="5" />

        @php
            $checklist = ['Is Active ?'];
        @endphp

        <x-forms.checkbox name="is_active" :checklist="$checklist" />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-backend.master>
