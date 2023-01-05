<x-backend.master>
    <x-slot:title>
        Color Create
        </x-slot>

        @if (session('message'))
            <span class="text-success">{{ session('message') }}</span>
        @endif

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Colors</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('colors.index') }}">
                    <button type="button" class="btn btn-sm btn-outline-info">
                        <span data-feather="list"></span>
                        List
                    </button>
                </a>
            </div>
        </div>

        <x-forms.errors />

        <form action="{{ route('colors.store') }}" method="post">
            @csrf

            <x-forms.input type="text" name="name" placeholder="Enter Name" required label="Name" />

            <x-forms.input type="color" name="color_code" required label="Color Code" />

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

</x-backend.master>
