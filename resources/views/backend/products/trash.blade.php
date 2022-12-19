<x-backend.master>

    <x-slot:title>
        Category List
    </x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

                {{-- <a href="{{ route('products.pdf') }}"> --}}
                <button type="button" class="btn btn-sm btn-outline-success">PDF</button>
                </a>

                <button type="button" class="btn btn-sm btn-outline-secondary">Excel</button>
                <a href="{{ route('products.index') }}">
                    <button type="button" class="btn btn-sm btn-outline-info">List</button>
                </a>
            </div>
            <a href="{{ route('products.create') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="plus"></span>
                    Add New
                </button>
            </a>
        </div>
    </div>

    {{-- Message shown here --}}
    <x-forms.message />

    <table class="table">
        <thead>
            <tr>
                <th>$SL</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $product->name }} </td>
                    <td>
                        <a class="btn btn-success"
                            href=" {{ route('products.softDeleteShow', $product->id) }} ">Show</a> |
                        <a class="btn btn-warning" href="{{ route('products.restore', $product->id) }}">Restore </a>
                        |

                        <form action=" {{ route('products.delete', $product->id) }} " method="post"
                            style="display: inline" enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('File will be permanently deleted')">Delete</button>

                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-backend.master>
