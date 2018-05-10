<div class="card product text-left">
    @if (Auth::check() && Auth::user()->id == $product->user_id)
        <div class="absolute actions">
            <a href="{{ url('products/' . $product->id . '/edit') }}">Editar</a>
            @include('products.delete', ['product' => $product])
        </div>
    @endif

    <h1>{{ $product->title }}</h1>
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            @if($product->extension)
                <img src="{{ url("products/images/$product->id.$product->extension") }}" alt="{{ $product->title }} cover" class="img-responsive">
            @endif
        </div>
        <div class="col-sm-6 col-xs-12">
            <p>
                <strong>Descripción</strong>
            </p>
            <p>{{ substr($product->description, 0, 100)}}</p>

            <p>
                @include('in_shopping_carts.form', [ 'product' => $product ])
            </p>
        </div>
    </div>
</div>