
<div class="featured-box featured-box-secondary sidebar" style="margin-top: 42px;">
	<div class="box-content">
		<h4>Shopping bag summary</h4>
		<table cellspacing="0" class="cart-totals" width="100%">
			<tbody>
				<tr class="cart-subtotal">
					<th>Cart Subtotal</th>
					<td class="product-price"><span class="amount">৳{{ number_format($subtotal) }}</span></td>
				</tr>
				<tr class="shipping">
					<th>Shipping</th>
					<td>
						Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
					</td>
				</tr>
				<tr class="total">
					<th>Total</th>
					<td class="product-price"><span class="amount">৳{{ number_format($total) }}</span></td>
				</tr>
			</tbody>
		</table>
		<p><input type="submit" value="Update Shopping Bag" class="btn btn-default btn-block btn-sm" data-loading-text="Loading..."></p>
		<p><input type="submit" value="Proceed To checkout" class="btn btn-primary btn-block btn-sm" data-loading-text="Loading..."></p>
		<p><input type="submit" value="Continue Shopping" class="btn btn-grey btn-block btn-sm" data-loading-text="Loading..."></p>
	</div>
</div>