<x-backend.master>

    <x-slot:title>
        Categories SoftDelete Show
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

    <h1>Category Name: {{ $category->name }} </h1>
    <h1>Is Active: {{ $category->is_active ? 'Yes' : 'No' }} </h1>
    <img width="200px" src="{{ asset('storage/categories/' . $category->image) }}" alt="">




</x-backend.master>
