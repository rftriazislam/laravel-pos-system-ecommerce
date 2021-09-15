{{-- @extends('backend.layouts.app') --}}
@extends('layouts/contentLayoutMaster')
@section('page-style')
<link rel="stylesheet" href="{{ asset('public/css/custom/upload.css') }}" />
@endsection
@section('content')
<div class="aiz-titlebar text-left mt-1 mb-1">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('Upload New File')}}</h1>
		</div>
		<div class="col-md-6 text-md-right" style="text-align: right;">
			<a href="{{ route('uploaded-files.index') }}" class="btn btn-link text-reset">
				<i class="las la-angle-left"></i>
				<span>{{translate('Back to uploaded files')}}</span>
			</a>
		</div>
	</div>
</div>
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Drag & drop your files')}}</h5>
    </div>
    <div class="card-body" style="padding: 20px 25px;border-radius: 4px;">
    	<div id="aiz-upload-files" class="h-420px" style="min-height: 65vh">

    	</div>
    </div>
</div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
			AIZ.plugins.aizUppy();
		});
	</script>
@endsection
