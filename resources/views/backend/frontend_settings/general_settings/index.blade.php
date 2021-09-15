@extends('layouts/contentLayoutMaster')

@php
    $facebook = '';
    $twitter = '';
    $google_plus = '';
    $pinterest = '';

    if ($social_media_info) {
        $facebook = isset($social_media_info['facebook']) ? $social_media_info['facebook'] : '';
        $twitter = isset($social_media_info['twitter']) ? $social_media_info['twitter'] : '';
        $google_plus = isset($social_media_info['google_plus']) ? $social_media_info['google_plus'] : '';
        $pinterest = isset($social_media_info['pinterest']) ? $social_media_info['pinterest'] : '';
    }

    $copyright_name = '';
    $copyright_link = '';

    if ($copyright_info) {
        $copyright_name = isset($copyright_info['copyright_name']) ? $copyright_info['copyright_name'] : '';
        $copyright_link = isset($copyright_info['copyright_link']) ? $copyright_info['copyright_link'] : '';
    }
@endphp

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
            <h5 class="mb-0 h6">Company Logo</h5>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('frontend_settings.frontend_logo') }}" method="POST" enctype="multipart/form-data" id="new_product_category_form">
                @csrf
                <div class="col-md-10">
                    <label for="category" class="form-label">Upload Company Logo</label>
                    <input class="form-control" name="logo_image" type="file">
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-outline-primary mt-2">Add</button>
                </div>
            </form>

            <div class="row mt-1">
                @php
                    $index = 0;
                @endphp
                @foreach ($logos as $logo)
                    <div class="col-md-2 text-center">
                        <img src="{{ asset($logo['image_path']) }}" class="img-thumbnail img-size">
                        <a href="{{ route('frontend_settings.frontend_logo_action',['action'=>'delete','index'=>$index]) }}" class="btn btn-sm btn-outline-danger img-btn">Delete</a>
                        <a href="{{ route('frontend_settings.frontend_logo_action',['action'=>'status','index'=>$index]) }}" class="btn btn-sm btn-outline-primary img-btn">
                            {{ $logo['status'] == 1 ? 'Active' : 'Deactive' }}
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
            <h5 class="mb-0 h6">Add Social Media Info</h5>
        </div>
        <div class="card-body">
            <form class="row g-1" action="{{ route('frontend_settings.social_media') }}" method="POST" enctype="multipart/form-data" id="new_product_category_form">
                @csrf
                <div class="col-md-6">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="text" class="form-control" name="facebook" id="facebook" value="{{ $facebook }}">
                </div>
                <div class="col-md-6">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input type="text" class="form-control" name="twitter" id="twitter" value="{{ $twitter }}">
                </div>
                <div class="col-md-6">
                    <label for="google_plus" class="form-label">Google Plus</label>
                    <input type="text" class="form-control" name="google_plus" id="google_plus" value="{{ $google_plus }}">
                </div>
                <div class="col-md-6">
                    <label for="pinterest" class="form-label">Pinterest</label>
                    <input type="text" class="form-control" name="pinterest" id="pinterest" value="{{ $pinterest }}">
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-outline-primary">Save/Update</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Add Copyright Info</h5>
        </div>
        <div class="card-body">
            <form class="row g-1" action="{{ route('frontend_settings.copyright') }}" method="POST" enctype="multipart/form-data" id="new_product_category_form">
                @csrf
                <div class="col-md-6">
                    <label for="copyright-name" class="form-label">Copyright Name</label>
                    <input type="text" class="form-control" name="copyright_name" id="copyright_name" value="{{ $copyright_name }}">
                </div>
                <div class="col-md-6">
                    <label for="copyright-link" class="form-label">Copyright Link</label>
                    <input type="text" class="form-control" name="copyright_link" id="copyright_link" value="{{ $copyright_link }}">
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-outline-primary">Save/Update</button>
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


