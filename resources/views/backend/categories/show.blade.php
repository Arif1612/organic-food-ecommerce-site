<x-backend.master>

    <x-slot:title>
        Categories Show
    </x-slot:title>
    <h1>Category Name: {{ $category->name }} </h1>
    <h1>Is Active: {{ $category->is_active ? 'Yes' : 'No' }} </h1>


</x-backend.master>
