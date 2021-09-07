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
		<div class="row featured-boxes">
			<div class="col-md-8">				
				<div class="featured-box featured-box-secondary featured-box-cart">
					<div class="box-content">
						<h4>Billing Address</h4>
						<p>Constructed in cotton sweat fabric, this lovely piece, lacus eu mattis auctor, dolor lectus venenatis nulla</p>
						<div class="form-horizontal">
							<div class="form-group">
								<label for="selectCountry" class="col-sm-2 control-label">Country <span class="required">*</span></label>
								<div class="col-sm-10">
									<div class="list-sort">
										<select id="selectCountry" class="formDropdown">
											<option value="">Select a country</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="inputFN" class="col-sm-2 control-label">First Name <span class="required">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputFN">
								</div>
							</div>
							<div class="form-group">
								<label for="inputLN" class="col-sm-2 control-label">Last Name <span class="required">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputLN">
								</div>
							</div>
							<div class="form-group">
								<label for="inputCN" class="col-sm-2 control-label">Company Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputCN">
								</div>
							</div>
							<div class="form-group">
								<label for="inputAdd" class="col-sm-2 control-label">Address <span class="required">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputAdd">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<input type="text" class="form-control" id="inputAdd">
								</div>
							</div>
							<div class="form-group">
								<label for="inputCity" class="col-sm-2 control-label">Town / City <span class="required">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputCity">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPostcode" class="col-sm-2 control-label">Postcode <span class="required">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputPostcode">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Email Address <span class="required">*</span></label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="inputEmail3">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPhone" class="col-sm-2 control-label">Phone <span class="required">*</span></label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="inputPhone">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="checkbox">
										<label><input type="checkbox">Create an account? </label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="checkbox">
										<label><input type="checkbox">Ship to billing address? </label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="textNotes" class="col-sm-2 control-label">Order Notes</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="5" id="textNotes"></textarea>
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
								<tr class="cart_table_item">
									<th>
										<span class="product-name">Linen shirt with ribbon at the front</span><br>
										<span class="quantity">Quantity: 1</span>
									</th>
									<td class="product-price"><span class="amount">$299</span></td>
								</tr>
								<tr class="cart_table_item">
									<th>
										<span class="product-name">Jacket with stretch sides</span><br>
										<span class="quantity">Quantity: 1</span>
									</th>
									<td class="product-price"><span class="amount">$299</span></td>
								</tr>
								<tr class="cart-subtotal">
									<th>Cart Subtotal</th>
									<td class="product-price"><span class="amount">$431</span></td>
								</tr>
								<tr class="shipping">
									<th>Shipping</th>
									<td>Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method"></td>
								</tr>
								<tr class="total">
									<th>Total</th>
									<td class="product-price"><strong><span class="amount">$431</span></strong></td>
								</tr>
							</tbody>
						</table>
						<h4>Payment Method</h4>
						<div class="panel-group panel-group2" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5 class="panel-title"> <label><input type="radio" id="radio1" name="radio"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Direct Bank Transfer</a></label>
									</h5>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in">
									<div class="panel-body"> 
										<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</p>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5 class="panel-title"> <label><input type="radio" id="radio2" name="radio"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Cheque Payment</a></label> </h5>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body"> <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.</p> </div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5 class="panel-title"> <label><input type="radio" id="radio3" name="radio"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">PayPal</a></label> </h5>
								</div>
								<div id="collapseThree" class="panel-collapse collapse">
									<div class="panel-body">
										<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry.</p>
									</div>
								</div>
							</div>
						</div>
						<p><input type="submit" value="Place Order" class="btn btn-primary btn-block btn-sm" data-loading-text="Loading..."></p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection