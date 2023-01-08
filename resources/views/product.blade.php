<x-frontend.master>

    <div class="container marketing">
        <br><br><br>

        <!-- Three columns of text below the carousel -->
        <div class="row">

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
                </div>
            </div><!-- /.col-lg-4 -->

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ Str::limit($product->name, 20) }}</h3>
                        <p>{{ Str::limit($product->description, 100) }}</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary btn-sm" href="#">Add to Card</a>
                    </div>
                </div>
            </div>
            {{-- {{ $products->links() }} --}}
        </div><!-- /.container -->

</x-frontend.master>
