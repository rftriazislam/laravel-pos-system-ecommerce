
<div class="featured-box featured-box-secondary sidebar" style="margin-top: 42px;">
	<div class="box-content">
		<h4>Shopping bag summary</h4>
		<table cellspacing="0" class="cart-totals" width="100%">
			<tbody>
				<tr class="cart-subtotal">
					<th>Cart Subtotal</th>
					<td class="product-price"><span class="amount">৳ {{ number_format($subtotal) }}</span></td>
				</tr>
				<tr class="shipping">
					<th>Shipping</th>
					<td>
						Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
					</td>
				</tr>
				<tr class="total">
					<th>Total</th>
					<td class="product-price"><span class="amount">৳ {{ number_format($total) }}</span></td>
				</tr>
			</tbody>
		</table>
		<p><a href="{{ route('checkout') }}" class="btn btn-primary btn-block btn-sm">Proceed To checkout</a></p>
	</div>
</div>