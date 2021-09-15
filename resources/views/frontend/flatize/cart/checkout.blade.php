@extends('frontend.flatize.master.master_page')

@section('page_content')
	<!-- Begin page top -->
	<section class="page-top">
		<div class="container">
			<div class="page-top-in">
				<h2><span>Checkout</span></h2>
			</div>
		</div>
	</section>
	<!-- End page top -->

	<div class="container">
		<div class="featured-boxes">
			<form action="{{ route('place_order') }}" method="post" enctype="multipart/form-data" id="place-order-form">
				@csrf
				<div class="row">
					<div class="col-md-8">				
						<div class="featured-box featured-box-secondary featured-box-cart">
							<div class="box-content">
								<h4>Billing Address</h4>
								<div class="form-horizontal">
									<div class="form-group">
										<label for="name" class="col-sm-2 control-label">Name <span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
										</div>
									</div>
									<div class="form-group">
										<label for="email" class="col-sm-2 control-label">Email Address <span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
										</div>
									</div>
									<div class="form-group">
										<label for="phone" class="col-sm-2 control-label">Phone <span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="phone" name="phone" value="{{ $address_info->phone }}">
										</div>
									</div>
									<div class="form-group">
										<label for="address" class="col-sm-2 control-label">Address <span class="required">*</span></label>
										<div class="col-sm-10">
											<textarea class="form-control" rows="5" id="address" name="address">{{ $address_info->address }}</textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="city" class="col-sm-2 control-label">Town / City <span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="city" name="city" value="{{ $address_info->city }}">
										</div>
									</div>
									<div class="form-group">
										<label for="postcode" class="col-sm-2 control-label">Postcode <span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="postcode" name="postcode" value="{{ $address_info->postal_code }}">
										</div>
									</div>							
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="featured-box featured-box-secondary sidebar">
							<div class="box-content">
								<h4>Your Order</h4>
								<table cellspacing="0" class="cart-totals" width="100%">
									<tbody>
										@foreach ($cart_contents as $content)
											<tr class="cart_table_item">
												<th>
													<span class="product-name">{{ $content->name }}</span><br>
													<span class="quantity">Price: {{ $content->price }};&nbsp;&nbsp;&nbsp;Quantity: {{ $content->quantity }}</span>
												</th>
												<td class="product-price"><span class="amount">৳ {{ number_format($content->price * $content->quantity) }}</span></td>
											</tr>
										@endforeach
										<tr class="cart-subtotal">
											<th>Cart Subtotal</th>
											<td class="product-price"><span class="amount">৳ {{ number_format($subtotal) }}</span></td>
										</tr>
										{{-- <tr class="shipping">
											<th>Shipping</th>
											<td>Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method"></td>
										</tr> --}}
										<tr class="total">
											<th>Total</th>
											<td class="product-price"><strong><span class="amount">৳ {{ $total }}</span></strong></td>
										</tr>
									</tbody>
								</table>

								<h4>Payment Method</h4>
								<div class="radio">
									<label><input type="radio" name="payment_type" checked value="cash">Cash</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="payment_type" value="cash_on_delivery">Cash on Delivery</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="payment_type" value="bkash">Bkash</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="payment_type" value="nagad">Nagad</label>
								</div>
								<p><input type="submit" value="Place Order" class="btn btn-primary btn-block btn-sm" data-loading-text="Loading..."></p>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection