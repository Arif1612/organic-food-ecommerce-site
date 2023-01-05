<x-master>
    <x-slot:title>
        Category Create
        </x-slot>

        @if(session('message'))
        <span class="text-success">{{ session('message') }}</span>
        @endif

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

        <x-forms.errors />
        
        <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <x-forms.input 
                type="text" 
                name="title" 
                :value="old('title', $category->title)"
                placeholder="Enter title" 
                required 
            />

            <img src="{{ asset('storage/categories/'.$category->image) }}" height="250" />

            <x-forms.input type="file" name="image" label='Picture' />

            @php
                $checklist = ['Is Active ?'];

                if($category->is_active){
                    $checkedItems = [0];
                } else {
                    $checkedItems = [];
                }
            @endphp

            <x-forms.checkbox :checklist="$checklist" :checkedItems="$checkedItems" />

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

</x-master>