@extends('frontend.flatize.master.master_page')

@section('custom_css')
	<style type="text/css">
		.featured-boxes { margin-top: 25px; }
		hr { border-top: 2px solid #979696; }
		.order-confirm-head { text-align: center; }
		.order-confirm-head h2, h4 .order-confirm-body h2, h4 { font-weight: bold; }
		.order-confirm-head h2 { margin-bottom: 8px; }
		.order-confirm-head h4 { margin-bottom: 0px; }
		.order-confirm-body h4 { margin-bottom: 10px; }
		.order-confirm-head span { color: #e62e04 }
	</style>
@endsection

@section('page_content')
	<div class="container">			
		<div class="featured-boxes">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="order-confirm-head">
						<h2>Thank You For Your Order!</h2>
						<h4>Order Code : <span>{{ $order_info->code }}</span></h4>
						<p>A copy of your order summary has been sent to {{ $address_data['email'] }}</p>
					</div>
					<hr>
					<div class="order-confirm-body">
						<div class="row">
							<div class="col-md-6">
								<h4>Customer Information</h4>
								<div class="table-responsive">
									<table class="table table-condensed table-striped table-hover">
										<tbody>
											<tr>
												<th width="100px">Name</th>
												<td colspan="3">{{ $address_data['name'] }}</td>
											</tr>
											<tr>
												<th width="100px">Email</th>
												<td colspan="3">{{ $address_data['email'] }}</td>
											</tr>
											<tr>
												<th width="100px">Phone</th>
												<td colspan="3">{{ $address_data['phone'] }}</td>
											</tr>
											<tr>
												<th width="100px">Address</th>
												<td colspan="3">{{ $address_data['address'] }}</td>
											</tr>
											<tr>
												<th width="100px">City</th>
												<td>{{ $address_data['city'] }}</td>
												<th width="100px">Postal Code</th>
												<td>{{ $address_data['postcode'] }}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

							<div class="col-md-6">
								<h4>order Information</h4>
								<div class="table-responsive">
									<table class="table table-condensed table-striped table-hover">
										<tbody>
											<tr>
												<th width="150px">Order Code</th>
												<td>{{ $order_info->code }}</td>
											</tr>
											<tr>
												<th width="150px">Order Date</th>
												<td>{{ $order_info->date }}</td>
											</tr>
											<tr>
												<th width="150px">Order Status</th>
												<td>{{ ucfirst(str_replace("_"," ",$order_info->delivery_status)) }}</td>
											</tr>
											<tr>
												<th width="150px">Total Order Amount</th>
												<td>৳ {{ number_format($order_info->grand_total) }}</td>
											</tr>
											<tr>
												<th width="150px">Payment Type</th>
												<td>{{ ucfirst(str_replace("_"," ",$order_info->payment_type)) }}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<h4>Order Details</h4>
								<div class="table-responsive">
									@php
										$sl = 1;
										$subtotal = 0;
										$total = 0;
									@endphp
									<table class="table table-bordered table-condensed table-striped table-hover">
										<thead>
											<tr>
												<th>SL</th>
												<th>Product</th>
												<th width="100px" class="text-center">Rate</th>
												<th width="100px" class="text-center">Quantity</th>
												<th width="100px" class="text-center">Price</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($order_details as $details)
												@php
													$price = $details->price * $details->quantity;
													$subtotal += $price;
													$total = $subtotal;
												@endphp
												<tr>
													<td>{{ $sl++ }}</td>
													<td>{{ $details->product_name }}</td>
													<td class="text-right">৳ {{ number_format($details->price) }}</td>
													<td class="text-right">{{ $details->quantity }}</td>
													<td class="text-right">৳ {{ number_format($price) }}</td>
												</tr>
											@endforeach
										</tbody>
										<tfoot>
											<tr>
												<th colspan="4" class="text-right">Subtotal</th>
												<td class="text-right">৳ {{ number_format($subtotal) }}</td>
											</tr>
											<tr>
												<th colspan="4" class="text-right">Total</th>
												<td class="text-right">৳ {{ number_format($total) }}</td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection