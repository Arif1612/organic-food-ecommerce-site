<table class="table">
    <thead>
        <tr>
            <th>$SL</th>
            <th>Name</th>
            <th>Image</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $category->name }} </td>
                <td> <img width="200px" src="{{ public_path('storage/categories/' . $category->image) }}" alt="">
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
