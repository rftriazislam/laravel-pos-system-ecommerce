@extends('layouts/contentLayoutMaster')
{{-- @extends('backend.layouts.app') --}}

@section('title', 'Home Page')

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
            <h5 class="mb-0 h6">New Product Category</h5>
        </div>
        <div class="card-body">
        	<form class="row g-3" action="{{ route('frontend_settings.add_product_category') }}" method="POST" enctype="multipart/form-data" id="new_product_category_form">
        		@csrf
        		<div class="col-md-10">
        			<label for="category" class="form-label">Category</label>
        			<select id="category" class="form-select select2" name="category[]" data-placeholder="Select Category" multiple>
        				@foreach ($categories as $category)
        					@php
        						$select = "";
        						if (isset($new_categories) && is_array($new_categories)) {
        							if (in_array($category->id,$new_categories)) {
        								$select = 'selected';
        							}
        						}
        					@endphp
        					<option value="{{ $category->id }}" {{ $select }}>{{ $category->name }}</option>
        				@endforeach
        			</select>
        		</div>
        		<div class="col-md-2 d-grid">
        			<button type="submit" class="btn btn-outline-primary mt-2">Add</button>
        		</div>
        	</form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Advertise Section</h5>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('frontend_settings.advertise_section') }}" method="POST" enctype="multipart/form-data" id="new_product_category_form">
                @csrf
                <div class="col-md-10">
                    <label for="category" class="form-label">Upload Advertise Image</label>
                    <input class="form-control" name="advertise_image" type="file">
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-outline-primary mt-2">Add</button>
                </div>
            </form>

            <div class="row mt-1">
                @php
                    $index = 0;
                @endphp
                @foreach ($all_advertise_images as $advertise_image)
                    <div class="col-md-2 text-center">
                        <img src="{{ asset($advertise_image['image_path']) }}" class="img-thumbnail img-size">
                        <a href="{{ route('frontend_settings.advertise_section_action',['action'=>'delete','index'=>$index]) }}" class="btn btn-sm btn-outline-danger img-btn">Delete</a>
                        <a href="{{ route('frontend_settings.advertise_section_action',['action'=>'status','index'=>$index]) }}" class="btn btn-sm btn-outline-primary img-btn">
                            {{ $advertise_image['status'] == 1 ? 'Active' : 'Deactive' }}
                        </a>
                    </div>
                    @php
                        $index++;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Slider Section</h5>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('frontend_settings.slider_section') }}" method="POST" enctype="multipart/form-data" id="new_product_category_form">
                @csrf
                <div class="col-md-10">
                    <label for="category" class="form-label">Upload Slider Image</label>
                    <input class="form-control" name="advertise_image" type="file">
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-outline-primary mt-2">Add</button>
                </div>
            </form>

            <div class="row mt-1">
                @php
                    $index = 0;
                @endphp
                @foreach ($all_slider_images as $slider_image)
                    <div class="col-md-2 text-center">
                        <img src="{{ asset($slider_image['image_path']) }}" class="img-thumbnail img-size">
                        <a href="{{ route('frontend_settings.slider_section_action',['action'=>'delete','index'=>$index]) }}" class="btn btn-sm btn-outline-danger img-btn">Delete</a>
                        <a href="{{ route('frontend_settings.slider_section_action',['action'=>'status','index'=>$index]) }}" class="btn btn-sm btn-outline-primary img-btn">
                            {{ $slider_image['status'] == 1 ? 'Active' : 'Deactive' }}
                        </a>
                    </div>
                    @php
                        $index++;
                    @endphp
                @endforeach
            </div>
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


