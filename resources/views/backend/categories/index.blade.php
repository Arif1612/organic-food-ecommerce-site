<x-backend.master>

    <x-slot:title>
        Category List
    </x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

                {{-- <a href="{{ route('categories.pdf') }}"> --}}
                <button type="button" class="btn btn-sm btn-outline-success">PDF</button>
                </a>

                <button type="button" class="btn btn-sm btn-outline-secondary">Excel</button>
                {{-- <a href="{{ route('categories.trash') }}"> --}}
                <button type="button" class="btn btn-sm btn-outline-danger">Trash</button>
                </a>
            </div>
            <a href="{{ route('categories.create') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="plus"></span>
                    Add New
                </button>
            </a>
        </div>
    </div>

    @if (session('message'))
        <p class="text-success"> {{ session('message') }}</p>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>$SL</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $category->name }} </td>
                    <td>
                        <a href=" {{ route('categories.show', $category->id) }} ">Show |</a>
                        <a href="">Edit | </a>
                        <a href=" {{ route('categories.destroy', $category->id) }} ">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-backend.master>
