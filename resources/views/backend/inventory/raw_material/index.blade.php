@extends('layouts/contentLayoutMaster')

@section('title','Raw Materials')

@section('vendor-style')
	{{-- Page CSS files --}}
	<link rel="stylesheet" href="{{ asset('public/'.mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
	<link rel="stylesheet" href="{{ asset('public/'.mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
	<link rel="stylesheet" href="{{ asset('public/'.mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
@endsection

@section('page-style')
	{{-- Page CSS files --}}
	<link rel="stylesheet" href="{{ asset('public/'.mix('css/base/plugins/forms/form-validation.css')) }}">
	<link rel="stylesheet" href="{{ asset('public/'.mix('css/base/pages/app-user.css')) }}">

	<style type="text/css">
		.alert { position: relative; padding: 0.71rem 1rem; margin-bottom: 1rem; border: 0 solid transparent; border-radius: 0.358rem; }
		.card-header { padding: 0px; display: block; }
		.card .card-header { display: block; }
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
				<a href="{{ route('raw_materials.add') }}" class="btn btn-outline-primary"><i data-feather='plus-circle'></i> Add Raw Materials</a>
			</div>

			<div class="card-datatable table-responsive pt-0">
				<table class="user-list-table table">
					<thead class="thead-light">
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th>Type</th>
							<th>Shipment Date</th>
							<th>Cost</th>
							<th>Details</th>
							<th>Status</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>

					<tbody>
						@php
							$count = 1;
						@endphp

						@foreach ($raw_materials_list as $raw_materials)
							@php
								$details = '';
								$status = 'Active';
								if ($raw_materials->status == 0) {
									$status = 'Deactive';
								}
								if ($raw_materials->value) {
									$material_details = json_decode($raw_materials->value,true);
									$details = urldecode(http_build_query($material_details,'','; '));
								}
							@endphp
							<tr>
								<td>{{ $count++ }}</td>
								<td>{{ $raw_materials->name }}</td>
								<td>{{ $raw_materials->type_name }}</td>
								<td>{{ date('Y-m-d',strtotime($raw_materials->shipment_date)) }}</td>
								<td>{{ $raw_materials->cost }}</td>
								<td>{{ $details }}</td>
								<td>{{ $status }}</td>
								<td class="text-center">
									<a class="btn btn-sm btn-icon rounded-circle btn-outline-primary" href="{{ route('raw_materials.edit', $raw_materials->id) }}"><i data-feather='edit'></i></a>
									<a class="btn btn-sm btn-icon rounded-circle btn-outline-danger" href="{{ route('raw_materials.delete',$raw_materials->id) }}"><i data-feather='trash-2'></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
@endsection

@section('vendor-script')
	{{-- Vendor js files --}}
	<script src="{{ asset('public/'.mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
	<script src="{{ asset('public/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('public/'.mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
	<script src="{{ asset('public/'.mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
	<script src="{{ asset('public/'.mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
	<script src="{{ asset('public/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('public/'.mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
	{{-- <script src="{{ asset('public/'.mix('js/scripts/pages/app-user-list.js')) }}"></script> --}}

	<script type="text/javascript">
		$('.user-list-table').DataTable();
	</script>
@endsection
