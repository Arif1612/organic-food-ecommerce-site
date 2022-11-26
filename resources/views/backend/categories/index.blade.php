<table border="1" style="width: 500px">
    <thead>
        <tr>
            <th>$SL</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $category->name }} </td>
                <td>
                    <a href="">Show |</a>
                    <a href="">Edit | </a>
                    <a href="">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
