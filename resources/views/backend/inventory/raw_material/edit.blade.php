@extends('layouts/contentLayoutMaster')

@section('title','Edit Raw Materials')

@section('page-style')
	{{-- Page CSS files --}}
	<link rel="stylesheet" href="{{ asset('public/'.mix('css/base/plugins/forms/form-validation.css')) }}">
	<link rel="stylesheet" href="{{ asset('public/'.mix('css/base/pages/app-user.css')) }}">
	<style type="text/css">
		.alert { position: relative; padding: 0.71rem 1rem; margin-bottom: 1rem; border: 0 solid transparent; border-radius: 0.358rem; }
		.card .card-header { display: block; }
		.card-header { padding: 0px; }
	</style>
@endsection

@section('content')
	<section class="app-user-list">
		<div class="row">
			<div class="col-md-12">
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
		</div>
		
		<div class="card" style="padding: 21px;">
			<div class="card-header text-end">
				<a href="{{ route('raw_materials.index') }}" class="btn btn-outline-primary mb-2"><i data-feather='arrow-left-circle'></i> Go Back</a>
			</div>

			<div class="card-body">
				<form id="raw-material-form" action="{{ route('raw_materials.update') }}" method="post">
					@csrf
					<input type="hidden" name="raw_material_id" value="{{ $raw_material_info->id }}">
					<div class="row mb-1">
						<label for="shipment-date" class="col-sm-2 col-form-label">Shipment Date</label>
						<div class="col-sm-10">
		                    <input type="text" class="form-control" name="shipment_date" value="{{ $raw_material_info->shipment_date }}"/>
						</div>
					</div>

					<div class="row mb-1">
						<label for="name" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $raw_material_info->name }}">
						</div>
					</div>

					<div class="row mb-1">
						<label for="cost" class="col-sm-2 col-form-label">Cost</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="cost" name="cost" placeholder="Cost" value="{{ $raw_material_info->cost }}">
						</div>
					</div>

					<div class="row mb-1">
						<label for="cost" class="col-sm-2 col-form-label">Status</label>
						<div class="col-sm-10">
							<div class="form-check form-check-inline">
								<input type="radio" id="status-active" name="status" value="1" class="form-check-input" {{ $raw_material_info->status == 1 ? 'checked' : '' }}/>
								<label class="form-check-label" for="active">Active</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" id="status-deactive" name="status" value="0" class="form-check-input" {{ $raw_material_info->status == 0 ? 'checked' : '' }}/>
								<label class="form-check-label" for="deactive">Deactive</label>
							</div>
						</div>
					</div>

					<div class="row mb-1">
						<label for="material-type" class="col-sm-2 col-form-label">Material Type</label>
						<div class="col-sm-10">
	                        <select class="form-select material-type" name="material_type" id="material-type" data-live-search="true">
	                            <option value="">{{ translate('Select Material Type') }}</option>
	                            @foreach ($raw_material_type_list as $raw_material_type)
	                            	@php
	                            		$select = '';
	                            		if ($raw_material_type->id == $raw_material_info->raw_material_type_id) {
	                            			$select = 'selected';
	                            		}
	                            	@endphp
	                            	<option value="{{ $raw_material_type->id }}" {{ $select }}>{{ $raw_material_type->name }}</option>
	                            @endforeach
	                        </select>
						</div>
					</div>

					<span class="col-lg-12 attribute-div">
						@foreach ($raw_material_attributes as $key => $value)
							@if (Helper::is_dropdown($key))
								<div class="row mb-1">
									<label for="{{ $key }}" class="col-sm-2 col-form-label">{{ ucfirst($key) }}</label>
									<div class="col-sm-10">
										<select class="select2 form-select {{ $key }}" name="{{ $key }}" id="{{ $key }}" data-live-search="true">
											<option value="">Select {{ ucfirst($key) }}</option>
											@foreach (Helper::get_dropdown_list($key) as $dropdown_item)
												@php
													$select = '';
													if ($dropdown_item == $value) {
														$select = 'selected';
													}
												@endphp
												<option value="{{ $dropdown_item }}" {{ $select }}>{{ $dropdown_item }}</option>
											@endforeach
										</select>
									</div>
								</div>
							@else
								<div class="row mb-1">
									<label for="{{ $key }}" class="col-sm-2 col-form-label">{{ ucfirst($key) }}</label>
									<div class="col-sm-10">
										<input type="text" class="form-control {{ $key }}" id="{{ $key }}" name="{{ $key }}" placeholder="{{ ucfirst($key) }}" value="{{ $value }}">	
									</div>
								</div>
							@endif
						@endforeach
					</span>

					<div class="row mb-1">
						<div class="col-sm-12 text-end">
							<button type="submit" class="btn btn-outline-primary"><i data-feather='save'></i> Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).on('change','.material-type',function(e) {
			e.preventDefault();
			var material_type_id = $(this).val();
	        $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	            type: "POST",
	            url: "{{ route('raw_materials.get_raw_material_attribute_form') }}",
	            data: {type_id:material_type_id},
	            success: function (data) {
        			$('.attribute-div').html(data.output);
	            },
	            error: function (error) {
	                // console.log(error);
	            }
	        });
		});

		$(function() {
			$('input[name="shipment_date"]').daterangepicker({
				locale: {
					format: "YYYY-MM-DD",
				},
				singleDatePicker: true,
				showDropdowns: true,
				minYear: 1900,
				changeMonth: true,
				changeYear: true,
			});
		});
	</script>
@endsection
