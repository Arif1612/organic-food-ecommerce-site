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

    {{-- all error message shown here --}}
    <x-forms.errors />

    <form action=" {{ route('categories.store') }} " method="post">
        @csrf
        {{-- all type of input expect some we can give from here --}}
        <x-forms.input name="name" type="text" placeholder="give your category name" />
        {{-- checkbox compoent ar jonno --}}
        <x-forms.checkbox name="name" />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-backend.master>
