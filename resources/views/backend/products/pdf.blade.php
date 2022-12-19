<table class="table">
    <thead>
        <tr>
            <th>$SL</th>
            <th>Name</th>
            <th>Image</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $product->name }} </td>
                <td> <img width="200px" src="{{ public_path('storage/products/' . $product->image) }}" alt="">
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
