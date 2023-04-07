<div id="wrap-inner">
    <div class="products">

        @foreach($products as $item)
                <div class="product-list row">
                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                        <a href="#"><img src="{{ asset('image/product/'.$item->product_image) }}" class="img-thumbnail"></a>
                        <p><a href="{{ route('products.show',$item->product_id) }}">{{$item->product_name}}</a></p>
                        <p class="price">${{number_format($item->product_price)}}</p>

                    </div>
                </div>
                @endforeach
        </div>
</div>