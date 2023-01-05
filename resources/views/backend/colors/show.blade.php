<x-master>
    <x-slot:title>
        Category Details
        </x-slot>

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('categories.index') }}">
                    <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="list"></span>
                        List
                    </button>
                </a>
            </div>
        </div>

        <h1>Name: {{ $category->name }}</h1>

        <img src="{{ asset('storage/categories/' . $category->image) }}" />

        <p>Is Active ?: {{ $category->is_active ? 'Yes' : 'No' }}</p>

        <h1>Products</h1>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category->products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->title }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</x-master>
