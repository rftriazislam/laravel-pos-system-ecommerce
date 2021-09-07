
<h3>Your selection ({{ $cart_contents->count() }} items)</h3>
<div class="featured-box featured-box-cart">
	<div class="box-content">
		<form method="post" action="">
			<table cellspacing="0" class="shop_table" width="100%">
				<thead>
					<tr>
						<th class="product-thumbnail">Item</th>
						<th class="product-name">Product name</th>
						<th class="product-price">Price</th>
						<th class="product-quantity">Quantity</th>
						<th class="product-subtotal">SubTotal</th>
						<th class="product-remove">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($cart_contents as $content)
						<tr class="cart_table_item">											
							<td class="product-thumbnail">
								<a href="shop-product-sidebar.html">
									<img alt="" width="80" src="{{ asset('public/'.$content->attributes['image_path']) }}">
								</a>
							</td>
							<td class="product-name">
								<a href="shop-product-sidebar.html">{{ $content->name }}</a>
							</td>
							<td class="product-price"><span class="amount">৳{{ number_format($content->price) }}</span></td>
							<td class="product-quantity">												
								<div class="quantity">
									<input type="button" class="minus" index="{{ $content->id }}" value="-">
									<input type="number" class="input-text qty text cart_qty_{{ $content->id }}" title="Qty" value="{{ $content->quantity }}" name="quantity" min="1" step="1">
									<input type="button" class="plus" index="{{ $content->id }}" value="+">
								</div>												
							</td>
							<td class="product-subtotal"><span class="amount">৳{{ number_format($content->price * $content->quantity) }}</span></td>
							<td class="product-remove">
								<a title="Remove this item" class="remove remove_item_from_cart" href="javascript:vois(0)" item-id="{{ $content->id }}"><i class="fa fa-times-circle"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</form>
	</div>
</div>