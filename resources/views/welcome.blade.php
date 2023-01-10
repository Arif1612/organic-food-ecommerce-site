<x-frontend.master>

    <x-frontend.partials.carousel :carousels="$carousels" />


    <!-- Marketing messaging and featurettes
================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
        <br><br><br>

        <!-- Three columns of text below the carousel -->
        <div class="row">

            @foreach ($products as $product)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            @if (substr($product->image, 0, 5) == 'https')
                                <img width="400px" height="400px" src="{{ $product->image }}" alt="{{ $product->name }}">
                            @else
                                <img width="400px" height="400px"
                                    src="{{ asset('storage/products/' . $product->image) }}" />
                            @endif
                        </div>
                        <div class="card-body">
                            <h3>{{ Str::limit($product->name, 20) }}</h3>
                            <p>{{ Str::limit($product->description, 100) }}</p>
                        </div>
                        <div class="card-footer">

                            <a class="btn btn-info btn-sm"
                                href="{{ route('frontend.products.show', $product->id) }}">View details &raquo;</a>
                            <a class="btn btn-primary btn-sm" href="#">Add to Card</a>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
            @endforeach

            {{ $products->links() }}
        </div><!-- /.container -->

</x-frontend.master>
