{{-- @extends('backend.layouts.app') --}}
@extends('layouts/contentLayoutMaster')

@section('title', 'Raw Materials Attributes')

@section('page-style')
	<style type="text/css">
		.alert { position: relative; padding: 0.71rem 1rem; margin-bottom: 1rem; border: 0 solid transparent; border-radius: 0.358rem; }
	</style>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-10">
		    @php
		        $message = Session::get('msg');
		        $error = Session::get('error');
		    @endphp

	        @if (isset($message))
	            <div class="alert alert-success alert-dismissible fade show" role="alert">
	                <strong>Success!</strong> {{ $message }}
	                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	            </div>
	        @endif

	        @if (isset($error))
	            <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                <strong>Oops!</strong> {{ $error }}
	                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	            </div>
	        @endif

		    @php
		        Session::forget('msg');
		        Session::forget('error');
		    @endphp
		</div>

		<div class="col-md-2 text-end">
			<a href="{{ route('raw_materials_type.index') }}" class="btn btn-outline-primary mb-2"><i data-feather='arrow-left-circle'></i> Go Back</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="mb-0 h6">{{ translate('Raw Materials Attributes') }} ({{ translate($raw_materials_type_info->name) }})</h5>
				</div>
				<div class="card-body">
					<table class="table aiz-table mb-0">
						<thead>
							<tr>
								<th>#</th>
								<th width="60%;" class="text-center">{{ translate('Attributes')}}</th>
								<th class="text-center">{{ translate('Options')}}</th>
							</tr>
						</thead>
						<tbody>
							@php
								$count = 1;
								$index = 0;
							@endphp
							@foreach($raw_material_type_attributes as $attribute)
								<tr>
									<td>{{ $count++ }}</td>
									<td>{{ $attribute }}</td>
									<td class="text-center">
										<span class="btn btn-sm btn-outline-primary btn-icon rounded-circle attribute-edit-btn" attribute-index="{{ $index }}" attribute-name="{{ $attribute }}">
											<i data-feather='edit'></i>
										</span>
			                            <a href="#" class="btn btn-sm btn-outline-danger btn-icon rounded-circle confirm-delete" data-href="{{ route('raw_materials_type.delete_attribute',['id'=>$raw_materials_type_info->id,'index'=>$index]) }}" title="{{ translate('Delete') }}">
			                                <i data-feather='trash'></i>
			                            </a>
									</td>
								</tr>
								@php
									$index++;
								@endphp
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="mb-0 h6" id="head-name">{{ translate('Add New Raw Materials Attribute') }}</h5>
				</div>
				<div class="card-body">
					<form id="attribute_form" action="{{ route('raw_materials_type.save_attribute') }}" method="POST">
						@csrf
						<input type="hidden" id="attribute_id" name="attribute_id" value="{{ $raw_materials_type_info->id }}">
						<input type="hidden" id="attribute_index" name="attribute_index" value="">
						<div class="form-group mb-3">
							<label for="name">{{translate('Name')}}</label>
							<input type="text" placeholder="{{ translate('Name')}}" id="name" name="name" class="form-control" value="" required>
						</div>
						<div class="form-group mb-3 d-flex justify-content-end">
							<span class="btn btn-primary text-left" style="margin-right:20px;" id="attribute-btn-clear">{{ translate('Clear') }}</span>
							<button type="submit" class="btn btn-primary" id="attribute-btn-name">{{ translate('Save') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
	<script type="text/javascript">
		$(document).on('click','.attribute-edit-btn',function(e) {
			e.preventDefault();
			var attribute_index = $(this).attr('attribute-index');		
			var attribute_name = $(this).attr('attribute-name');		
        	$('#attribute_form').attr("action","{{ route('raw_materials_type.update_attribute') }}");
        	$('#attribute_index').val(attribute_index);
        	$('#name').val(attribute_name);
        	$('#attribute-btn-name').html("Update");
		});

		$(document).on('click','#attribute-btn-clear',function(e) {
			e.preventDefault();		
        	$('#attribute_form').attr("action","{{ route('raw_materials_type.save_attribute') }}");
        	$('#attribute_index').val('');
        	$('#name').val('');
        	$('#attribute-btn-name').html("Save");
		});
	</script>
@endsection
