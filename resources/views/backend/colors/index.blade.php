<x-backend.master>
    <x-slot:title>
        Color List
        </x-slot>

        <x-forms.message />
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Colors</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ route('colors.pdf') }}">
                        <button type="button" class="btn btn-sm btn-outline-secondary">PDF</button>
                    </a>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Excel</button>
                    <a href="{{ route('colors.trash') }}">
                        <button type="button" class="btn btn-sm btn-outline-danger">Trash</button>
                    </a>
                </div>
                <a href="{{ route('colors.create') }}">
                    <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="plus"></span>
                        Add New
                    </button>
                </a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Title</th>
                    <th>Color</th>
                    <th width="180">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $color)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $color->name }}</td>
                        <td>
                            <div style="background-color: {{ $color->color_code }}">{{ $color->color_code }}</div>
                        </td>

                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('colors.show', $color->id) }}">Show</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('colors.edit', $color->id) }}">Edit</a>
                            <form action="{{ route('colors.destroy', $color->id) }}" method="post"
                                style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure want to delete')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</x-backend.master>
