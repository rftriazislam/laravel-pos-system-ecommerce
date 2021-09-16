@extends('frontend.flatize.master.master_page')
@php
	$address = '';
	$city = '';
	$postal_code = '';
	$phone = '';

	if ($address_info) {
		$address = $address_info->address;
		$city = $address_info->city;
		$postal_code = $address_info->postal_code;
		$phone = $address_info->phone;
	}
@endphp

@section('custom_css')
	<style type="text/css">
		.page-top { margin-bottom: 15px; }
	</style>
@endsection

@section('page_content')
	<!-- Begin page top -->
	<section class="page-top">
		<div class="container">
			<div class="page-top-in">
				<h2><span>Account Information</span></h2>
			</div>
		</div>
	</section>
	<!-- End page top -->

	<div class="container">			
		<div class="row featured-boxes">
		    <!-- Basic Info-->
		    <div class="col-md-6">
			    <div class="panel panel-default">
			    	<div class="panel-heading"><b>Basic Info</b></div>
			    	<div class="panel-body">
			            <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
			                @csrf
			                <div class="row">
			                	<div class="col-md-8">
					                <div class="form-group">
					                    <label><b>Your Name</b></label>
					                    <input type="text" class="form-control" placeholder="Your Name" name="name" value="{{ Auth::user()->name }}">
					                </div>

					                <div class="form-group">
					                    <label><b>Your Phone</b></label>
					                    <input type="text" class="form-control" placeholder="Your Phone" name="phone" value="{{ Auth::user()->phone }}">
					                </div>
					                <div class="form-group">
					                    <label><b>Photo</b></label>
		                    			<input type="file" class="form-control" name="photo">
			                            <input type="hidden" name="previous_photo" value="{{ Auth::user()->avatar_original }}" class="selected-files">
					                </div>
			                	</div>

			                	<div class="col-md-4">
			                            <img class="img-thumbnail" src="{{ asset(Auth::user()->avatar_original) }}">
			                	</div>
			                </div>

			                <div class="row">
			                	<div class="col-md-12">
				                    <div class="form-group">
				                        <label><b>Email</b></label>
				                        <input type="email" class="form-control" placeholder="Your Email" name="email" value="{{ Auth::user()->email }}" />
				                    </div>
			                	</div>
			                </div>

			                <div class="row">
			                	<div class="col-md-6">
					                <div class="form-group">
					                    <label><b>Your Password</b></label>
					                    <input type="password" class="form-control" placeholder="New Password" name="new_password">
					                </div>
			                	</div>
			                	<div class="col-md-6">
					                <div class="form-group">
					                    <label><b>Confirm Password</b></label>
					                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
					                </div>
			                	</div>
			                </div>

			                <div class="form-group mb-0 text-right">
			                    <button type="submit" class="btn btn-primary">Update Profile</button>
			                </div>
			            </form>
			    	</div>
			    </div>
		    </div>

		    <div class="col-md-6">
			    <div class="panel panel-default">
			    	<div class="panel-heading"><b>Address Info</b></div>
			    	<div class="panel-body">
		                <form class="form-default" role="form" action="{{ $address_form_action }}" method="POST">
		                    @csrf
                            <div class="form-group">
                                <label><b>Address</b></label>
                                <textarea class="form-control" placeholder="Your Address" rows="5" name="address" required>{{ $address }}</textarea>
                            </div>
                            
                            <div class="form-group">
                            	<label><b>City</b></label>
                                <input type="text" class="form-control" placeholder="Your City" name="city" value="{{ $city }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label><b>Postal code</b></label>
                                <input type="text" class="form-control" placeholder="Your Postal Code" name="postal_code" value="{{ $postal_code }}" required>
                            </div>

                            <div class="form-group">
                                <label><b>Phone</b></label>
                                <input type="text" class="form-control" placeholder="Your phone number" name="phone" value="{{ $phone }}" required>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">{{ $address_button }}</button>
                            </div>
		                </form>
			    	</div>
			    </div>
			</div>

			{{-- <div class="col-md-12">
			    <div class="panel panel-primary">
			    	<div class="panel-heading">Email</div>
			    	<div class="panel-body">
			            <form action="{{ route('user.change.email') }}" method="POST">
			                @csrf
		                    <div class="form-group">
		                        <label><b>Your Email</b></label>
		                        <input type="email" class="form-control" placeholder="Your Email" name="email" value="{{ Auth::user()->email }}" />
		                    </div>
	                        <div class="form-group mb-0 text-right">
	                            <button type="submit" class="btn btn-primary">Update Email</button>
	                        </div>
			            </form>
			    	</div>
			    </div>
		    </div> --}}
		</div>
	</div>
@endsection