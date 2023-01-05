<x-master>
    <x-slot:title>
        {{ __('Category List') }}
    </x-slot>

    <x-forms.message />
    <x-forms.errors />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ __('Categories Trash') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('categories.index') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="list"></span>
                    {{ __('List') }}
                </button>
            </a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>{{ __('SL#') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->title }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('categories.show', $category->id) }}">Show</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('categories.restore', $category->id) }}">Restore</a>
                    <form action="{{ route('categories.delete', $category->id) }}" method="post" style="display:inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete')" title="Permanent Delete">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-master>