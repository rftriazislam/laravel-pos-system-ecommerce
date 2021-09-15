@extends('frontend.flatize.master.master_page')

@section('page_content')
	<!-- Begin page top -->
	<section class="page-top">
		<div class="container">
			<div class="page-top-in">
				<h2><span>Shopping Bag</span></h2>
			</div>
		</div>
	</section>
	<!-- End page top -->

	<div class="container">			
		<div class="row featured-boxes">
			<div class="col-md-8">
				<div id="cart-table-div">
					@include('frontend.flatize.cart.cart_table', ['cart_contents'=>$cart_contents])							
				</div>
				{{-- <div class="row">
					<div class="col-xs-6">
						<div class="featured-box featured-box-secondary">
							<div class="box-content">
								<h4>Promotional Code</h4>
								<p>Enter promotional code if you have one</p>
								<form action="" id="" type="post">
									<div class="form-group">
										<label class="sr-only">Promotional code</label>
										<input type="text" value="" class="form-control" placeholder="Enter promotional code here">
									</div>
									<div class="form-group">
										<input type="submit" value="Apply Promotion" class="btn btn-grey btn-sm" data-loading-text="Loading...">
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="featured-box featured-box-secondary">
							<div class="box-content">
								<h4>Calculate Shipping</h4>
								<p>Enter your destination to get a shipping estimate.</p>
								<form action="" id="" type="post">
									<div class="form-group">
										<label class="sr-only">Country</label>
										<div class="list-sort">
											<select class="formDropdown">
												<option value="">Select a country</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="sr-only">State/Province</label>
										<input type="text" value="" class="form-control" placeholder="State/Province">
									</div>
									<div class="form-group">
										<label class="sr-only">Zip/Postal Code</label>
										<input type="text" value="" class="form-control" placeholder="Zip/Postal Code">
									</div>
									<div class="form-group">
										<input type="submit" value="Update Totals" class="btn btn-grey btn-sm" data-loading-text="Loading...">
									</div>
								</form>
							</div>
						</div>
					</div>						
				</div> --}}
			</div>

			<div class="col-md-4">
				<div id="shopping-bag-summary-div">
					@include('frontend.flatize.cart.shopping_bag_summary', ['subtotal'=>$subtotal,'total'=>$total])
				</div>
			</div>
		</div>
	</div>
@endsection