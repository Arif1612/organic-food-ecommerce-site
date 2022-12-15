<x-backend.master>
    <x-slot:title>
        Edit Category
    </x-slot:title>



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('categories.index') }}">
                <button type="button" class="btn btn-sm btn-outline-info">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>

    @if (session('message'))
        <span class="text-success">{{ session('message') }}</span>
    @endif

    <form action=" {{ route('categories.update', $category->id) }} " method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <x-forms.input name="name" type="text" :value="old('name', $category->name)" placeholder="give your category name" />


            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        @php

            $checklist = ['Is Active ?'];

            if ($category->is_active) {
                $checkedItems = [0];
            } else {
                $checkedItems = [];
            }

        @endphp

        <x-forms.checkbox name="is_active" :checklist="$checklist" :checkedItems="$checkedItems" />

    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-backend.master>
