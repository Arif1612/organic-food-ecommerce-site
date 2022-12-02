<x-backend.master>
    <x-slot:title>
        Create New Category
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

    {{--
    @if (session('message'))
        <span class="text-success">{{ session('message') }}</span>
    @endif --}}


    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action=" {{ route('categories.store') }} " method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror "
                id="name" unique >
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3 form-check">
            <input name="is_active" type="checkbox" class="form-check-input" id="is_active">
            <label class="form-check-label" for="is_active">Is Active</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-backend.master>
