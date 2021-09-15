@extends('layouts/contentLayoutMaster')
{{-- @extends('backend.layouts.app') --}}

@section('title', 'Edit Contact Page')

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
            <h5 class="mb-0 h6">Edit Contact Page Info</h5>
            <a href="{{ route('frontend_settings.contact_page') }}" class="btn btn-outline-primary"><i data-feather='arrow-left-circle'></i> Contact Page Info</a>
        </div>
        <div class="card-body">
        	<form class="row g-3" action="{{ route('frontend_settings.add_product_category') }}" method="POST" enctype="multipart/form-data" id="new_product_category_form">
        		@csrf
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


