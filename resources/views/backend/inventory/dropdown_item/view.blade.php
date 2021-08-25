{{-- @extends('backend.layouts.app') --}}
@extends('layouts/contentLayoutMaster')

@section('title', 'Dropdown Item Value')

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
			<a href="{{ route('dropdown_item.index') }}" class="btn btn-outline-primary mb-2"><i data-feather='arrow-left-circle'></i> Go Back</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">
					<h5 class="mb-0 h6">{{ translate('Dropdown Item Value')}}</h5>
				</div>
				<div class="card-body">
					<table class="table aiz-table mb-0">
						<thead>
							<tr>
								<th>#</th>
								<th width="60%;" class="text-center">{{ translate('Item Value')}}</th>
								<th class="text-center">{{ translate('Options')}}</th>
							</tr>
						</thead>
						<tbody>
							@php
								$count = 1;
								$index = 0;
							@endphp
							@foreach($dropdown_item_values as $value)
								<tr>
									<td>{{ $count++ }}</td>
									<td>{{ $value }}</td>
									<td class="text-center">
										<span class="btn btn-sm btn-outline-primary btn-icon rounded-circle value-edit-btn" value-index="{{ $index }}" value-name="{{ $value }}">
											<i data-feather='edit'></i>
										</span>
			                            <a href="#" class="btn btn-sm btn-outline-danger btn-icon rounded-circle confirm-delete" data-href="{{ route('dropdown_item.delete_item_value',['id'=>$dropdown_item_info->id,'index'=>$index]) }}" title="{{ translate('Delete') }}">
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

		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<h5 class="mb-0 h6" id="head-name">{{ translate('Add New Dropdown Item Value') }}</h5>
				</div>
				<div class="card-body">
					<form id="dropdown_item_value_form" action="{{ route('dropdown_item.save_item_value') }}" method="POST">
						@csrf
						<input type="hidden" id="dropdown_item_id" name="dropdown_item_id" value="{{ $dropdown_item_info->id }}">
						<input type="hidden" id="value_index" name="value_index" value="">
						<div class="form-group mb-3">
							<label for="name">{{translate('Name')}}</label>
							<input type="text" placeholder="{{ translate('Name')}}" id="name" name="name" class="form-control" value="" required>
						</div>
						<div class="form-group mb-3 d-flex justify-content-end">
							<span class="btn btn-primary text-left" style="margin-right:20px;" id="value-btn-clear">{{ translate('Clear') }}</span>
							<button type="submit" class="btn btn-primary" id="value-btn-name">{{ translate('Save') }}</button>
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
		$(document).on('click','.value-edit-btn',function(e) {
			e.preventDefault();
			var value_index = $(this).attr('value-index');		
			var value_name = $(this).attr('value-name');		
        	$('#dropdown_item_value_form').attr("action","{{ route('dropdown_item.update_item_value') }}");
        	$('#value_index').val(value_index);
        	$('#name').val(value_name);
        	$('#value-btn-name').html("Update");
		});

		$(document).on('click','#value-btn-clear',function(e) {
			e.preventDefault();		
        	$('#dropdown_item_value_form').attr("action","{{ route('dropdown_item.save_item_value') }}");
        	$('#value_index').val('');
        	$('#name').val('');
        	$('#value-btn-name').html("Save");
		});
	</script>
@endsection
