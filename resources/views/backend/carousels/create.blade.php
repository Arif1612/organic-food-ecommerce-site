<x-backend.master>
    <x-slot:title>
        Create New Carousel Item
    </x-slot:title>



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Carousels</h1>
        {{-- <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('categories.index') }}">
                <button type="button" class="btn btn-sm btn-outline-info">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div> --}}
    </div>

    {{-- all error message shown here --}}
    <x-forms.errors />

    <form action=" {{ route('carousels.store') }} " method="post" enctype="multipart/form-data">
        @csrf

        <x-forms.input name="name" type="text" label="Carousel Name" placeholder="give your carousel name"
            :value="old('name')" />
        <x-forms.textarea name='description' :value="old('description')" label="Description" cols="30" rows="5" />

        <x-forms.input name="image" type="file" label="Picture" />



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-backend.master>
