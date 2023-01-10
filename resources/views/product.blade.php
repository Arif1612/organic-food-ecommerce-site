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

        <section>
            @auth
                <form action="{{ route('products.comments.store', $product->id) }}" method="post">
                    @csrf
                    <x-forms.textarea name="body" label="Your Comment" />
                    <button class="btn btn-info" type="submit">Submit</button>
                </form>
            @else
                <a href="{{ route('login') }}"><button class="btn btn-info">Login To Comment</button></a>
            @endauth
        </section>

        <section>
            <h2>Comments</h2>
            <ul>
                @foreach ($product->comments as $comment)
                    <li>
                        <div>
                            <h4>{{ $comment->commnetedBy->name }}
                                <small><mark>{{ $comment->created_at->diffForHumans() }}</mark></small>
                            </h4>
                            <p>{{ $comment->body }}</p>

                        </div>

                    </li>
                @endforeach
            </ul>
        </section>


</x-frontend.master>
