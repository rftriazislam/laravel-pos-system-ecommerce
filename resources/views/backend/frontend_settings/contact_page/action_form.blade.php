@extends('layouts/contentLayoutMaster')
@php
	$address = '';
	$email = '';
	$phone = '';
	$fax = '';
    $get_in_touch = '';
	if ($contact_info) {
		$address = isset($contact_info['address']) ? $contact_info['address'] : '';
		$email = isset($contact_info['email']) ? $contact_info['email'] : '';
		$phone = isset($contact_info['phone']) ? $contact_info['phone'] : '';
		$fax = isset($contact_info['fax']) ? $contact_info['fax'] : '';
        $get_in_touch = isset($contact_info['get_in_touch']) ? $contact_info['get_in_touch'] : '';
	}
@endphp

@section('title', 'Add Contact Page')

@section('page-style')
    <style type="text/css">
        .img-btn { margin-top: 5px; }
        .img-size { width: 161px; height: 98px; }
        .btn-sm { padding: .5rem; }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Add Contact Page Info</h5>
            <a href="{{ route('frontend_settings.contact_page') }}" class="btn btn-outline-primary"><i data-feather='arrow-left-circle'></i> Contact Page Info</a>
        </div>
        <div class="card-body">
        	<form class="row g-1" action="{{ route('frontend_settings.contact_page_action') }}" method="POST" enctype="multipart/form-data" id="new_product_category_form">
        		@csrf
        		<div class="col-12">
        			<label for="address" class="form-label">Address</label>
        			<textarea class="form-control" name="address" id="address" placeholder="Address">{{ $address }}</textarea>
        		</div>
        		<div class="col-md-4">
        			<label for="email" class="form-label">Email</label>
        			<input type="email" class="form-control" name="email" id="email" value="{{ $email }}">
        		</div>
        		<div class="col-md-4">
        			<label for="phone" class="form-label">Phone</label>
        			<input type="text" class="form-control" name="phone" id="phone" value="{{ $phone }}">
        		</div>
        		<div class="col-md-4">
        			<label for="fax" class="form-label">Fax</label>
        			<input type="text" class="form-control" name="fax" id="fax" value="{{ $fax }}">
        		</div>
                <div class="col-12">
                    <label for="get-in-touch" class="form-label">Get In Touch</label>
                    <textarea class="form-control" name="get_in_touch" id="get_in_touch" placeholder="Get In Touch">{{ $get_in_touch }}</textarea>
                </div>
        		<div class="col-12 text-end">
        			<button type="submit" class="btn btn-outline-primary">{{ $button_name }}</button>
        		</div>
        	</form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            // $('.toast').toast('show');
            // toast.show();
            var myAlert =document.getElementById('my-toast');
            var bsAlert = new bootstrap.Toast(myAlert);
            bsAlert.show();
        });
    </script>
@endsection


