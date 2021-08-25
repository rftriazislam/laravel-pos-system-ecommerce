{{-- @extends('backend.layouts.app') --}}
@extends('layouts/contentLayoutMaster')

@section('title', 'Raw Materials Type')

@section('page-style')
	<style type="text/css">
		.alert { position: relative; padding: 0.71rem 1rem; margin-bottom: 1rem; border: 0 solid transparent; border-radius: 0.358rem; }
	</style>
@endsection

@section('content')

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

<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Raw Materials Type')}}</h5>
			</div>
			<div class="card-body">
				<table class="table aiz-table mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th width="50%;" class="text-center">{{ translate('Materials Name') }}</th>
							<th width="15%;" class="text-center">{{ translate('Status') }}</th>
							<th class="text-center">{{ translate('Options')}}</th>
						</tr>
					</thead>
					<tbody>
						@php
							$count = 1;
						@endphp
						@foreach($raw_material_type_list as $raw_material_type)
							@php
								$status = 'Active';
								if ($raw_material_type->status == 0) {
									$status = 'Deactive';
								}
							@endphp
							<tr>
								<td>{{ $count++ }}</td>
								<td>{{ $raw_material_type->name }}</td>
								<td class="text-center">{{ $status }}</td>
								<td class="text-center">
									<a class="btn btn-sm btn-outline-info btn-icon rounded-circle" href="{{ route('raw_materials_type.view',$raw_material_type->id) }}">
										<i data-feather='eye'></i>
									</a>
									<span class="btn btn-sm btn-outline-primary btn-icon rounded-circle edit-btn" raw-material-type-id="{{ $raw_material_type->id }}">
										<i data-feather='edit'></i>
									</span>
		                            <a href="#" class="btn btn-sm btn-outline-danger btn-icon rounded-circle confirm-delete" data-href="{{ route('raw_materials_type.delete',$raw_material_type->id) }}" title="{{ translate('Delete') }}">
		                                <i data-feather='trash'></i>
		                            </a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6" id="head-name">{{ translate('Add New Raw Material Type') }}</h5>
			</div>
			<div class="card-body">
				<form id="raw_material_type_form" action="{{ route('raw_materials_type.save') }}" method="POST">
					@csrf
					<input type="hidden" id="raw_material_type_id" name="raw_material_type_id" value="">
					<div class="form-group mb-2">
						<label for="name">{{ translate('Name') }}</label>
						<input type="text" placeholder="{{ translate('Name')}}" id="name" name="name" class="form-control" value="" required>
					</div>
					<div class="form-group mb-2">
						<label for="status">{{ translate('Status') }}</label>
						<div class="demo-inline-spacing">
							<div class="custom-control custom-radio">
								<input type="radio" id="status-active" name="status" value="1" class="custom-control-input" checked/>
								<label class="custom-control-label" for="active">Active</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="status-deactive" name="status" value="0" class="custom-control-input"/>
								<label class="custom-control-label" for="deactive">Deactive</label>
							</div>
						</div>
					</div>
					<div class="form-group d-flex justify-content-end">
						<span class="btn btn-primary text-left" style="margin-right:20px;" id="btn-clear">{{ translate('Clear') }}</span>
						<button type="submit" class="btn btn-primary" id="btn-name">{{ translate('Save') }}</button>
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
		$(document).on('click','.edit-btn',function(e) {
			e.preventDefault();
			var raw_material_type_id = $(this).attr('raw-material-type-id');		
	        $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	            type: "POST",
	            url: "{{ route('raw_materials_type.get_raw_materials_type_info') }}",
	            data: {id:raw_material_type_id},
	            success: function (data) {
	            	var raw_material_type_info = data.raw_material_type_info;

	            	if (raw_material_type_info.status == 0) {
	            		$('#status-active').attr('checked',false);
	            		$('#status-deactive').attr('checked',true);
	            	} else {
	            		$('#status-deactive').attr('checked',false);
	            		$('#status-active').attr('checked',true);
	            	}

	            	$('#raw_material_type_form').attr("action","{{ route('raw_materials_type.update') }}");
	            	$('#raw_material_type_id').val(raw_material_type_info.id);
	            	$('#name').val(raw_material_type_info.name);
	            	$('#btn-name').html("Update");
	            },
	            error: function (error) {
	                // console.log(error);
	            }
	        });
		});

		$(document).on('click','#btn-clear',function(e) {
			e.preventDefault();
			$('#status-deactive').attr('checked',false);
			$('#status-active').attr('checked',true);
        	$('#raw_material_type_form').attr("action","{{ route('raw_materials_type.save') }}");
        	$('#raw_material_type_id').val('');
        	$('#name').val('');
        	$('#btn-name').html("Save");
		});
	</script>
@endsection
