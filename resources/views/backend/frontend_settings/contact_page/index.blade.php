@extends('layouts/contentLayoutMaster')
{{-- @extends('backend.layouts.app') --}}

@section('title', 'Contact Page')

@section('page-style')
    <style type="text/css">
        .img-btn { margin-top: 5px; }
        .img-size { width: 161px; height: 98px; }
        .btn-sm { padding: .5rem; }
    </style>
@endsection

@section('content')
    @php
        $message = Session::get('msg');
        $error = Session::get('error');
    @endphp

    @if (isset($message))
        <div class="toast align-items-center text-white bg-primary border-0" id="my-toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="100000">
            <div class="d-flex">
                <div class="toast-body">{{ $message }}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @php
        Session::forget('msg');
        Session::forget('error');
    @endphp
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Contact Page Info</h5>
            <a href="{{ route('frontend_settings.contact_page_form') }}" class="btn btn-outline-primary">
                <i data-feather={{ $icon_name }}></i> {{ $button_name }}
            </a>
        </div>
        <div class="card-body">
        	@if ($contact_info)
	        	<div class="table-responsive">
	        		<table class="table table-bordered">
	        			<tbody class="tbody">
	        				<tr>
	        					<th width="150px">Address</th>
	        					<td>{{ $contact_info['address'] }}</td>
	        				</tr>
	        				<tr>
	        					<th width="150px">Email</th>
	        					<td>{{ $contact_info['email'] }}</td>
	        				</tr>
	        				<tr>
	        					<th width="150px">Phone</th>
	        					<td>{{ $contact_info['phone'] }}</td>
	        				</tr>
	        				<tr>
	        					<th width="150px">Fax</th>
	        					<td>{{ $contact_info['fax'] }}</td>
	        				</tr>
                            <tr>
                                <th width="150px">Get In Touch</th>
                                <td>{{ $contact_info['get_in_touch'] }}</td>
                            </tr>
	        			</tbody>
	        		</table>
	        	</div>
        	@endif
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


