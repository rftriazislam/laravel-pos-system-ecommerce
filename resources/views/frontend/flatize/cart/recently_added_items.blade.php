<style type="text/css">
    .btn-white { color: white !important; }
</style>

<h3>Recently added item(s)</h3>
<ul class="list-unstyled list-thumbs-pro">
    @foreach ($cart_contents as $content)
        <li class="product">
            <div class="product-thumb-info">
                <a class="product-remove remove_item_from_cart" href="javascript:void(0)" item-id="{{ $content->id }}"><i class="fa fa-trash-o"></i></a>
                <div class="product-thumb-info-image">
                    <a href="shop-product-detail1.html"><img alt="" width="60" src="{{ asset('public/'.$content->attributes['image_path']) }}"></a>
                </div>
                
                <div class="product-thumb-info-content">
                    <h4><a href="shop-product-detail2.html">{{ $content->name }}</a></h4>
                    <span class="item-cat"><small><a href="{{ route('all_product',$content->attributes['category_id']) }}">{{ $content->attributes['category_name'] }}</a></small></span>
                    <span class="price">৳ {{ number_format($content->price * $content->quantity) }}</span>
                </div>
            </div>
        </li>
    @endforeach
</ul>
<ul class="list-inline cart-subtotals text-right">
    <li class="cart-subtotal"><strong>Subtotal</strong></li>
    <li class="price"><span class="amount"><strong>৳ {{ number_format($subtotal) }}</strong></span></li>
</ul>
<div class="cart-buttons text-right">
    <a href="{{ route('view_cart') }}" class="btn btn-white">View Cart</a>
    <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
</div>