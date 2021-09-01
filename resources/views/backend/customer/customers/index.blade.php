@extends('layouts/contentLayoutMaster')

@section('title', 'Customer List')

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
@endsection

@section('content')
	<!-- users list start -->
	<section class="app-user-list">
		<!-- users filter start -->
		<div class="card">
			<h5 class="card-header">Search Filter</h5>
			<div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
				<div class="col-md-4 user_role">
					<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2">
						<option value=""> Select Role </option>
						<option value="Admin" class="text-capitalize">Admin</option>
						<option value="Author" class="text-capitalize">Author</option>
						<option value="Editor" class="text-capitalize">Editor</option>
						<option value="Maintainer" class="text-capitalize">Maintainer</option>
						<option value="Subscriber" class="text-capitalize">Subscriber</option>
					</select>
				</div>

				<div class="col-md-4 user_plan">
					<select id="UserPlan" class="form-select text-capitalize mb-md-0 mb-2">
						<option value=""> Select Plan </option>
						<option value="Basic" class="text-capitalize">Basic</option>
						<option value="Company" class="text-capitalize">Company</option>
						<option value="Enterprise" class="text-capitalize">Enterprise</option>
						<option value="Team" class="text-capitalize">Team</option>
					</select>
				</div>

				<div class="col-md-4 user_status">
					<select id="FilterTransaction" class="form-select text-capitalize mb-md-0 mb-2xx">
						<option value=""> Select Status </option>
						<option value="Pending" class="text-capitalize">Pending</option>
						<option value="Active" class="text-capitalize">Active</option>
						<option value="Inactive" class="text-capitalize">Inactive</option>
					</select>
				</div>
			</div>
		</div>
		<!-- users filter end -->

		<!-- list section start -->
		<div class="card" style="padding: 21px;">
			<div class="card-datatable table-responsive pt-0">
				<table class="user-list-table table">
					<thead class="thead-light">
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th>Email Address</th>
							<th>Role</th>
							<th>Phone</th>
							<th>Package</th>
							<th>Wallet Balance</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>
						@php
							$count = 1;
						@endphp
						@foreach ($customers as $customer)
							<tr>
								<td>{{ $count++ }}</td>
								<td>{{ $customer->user->name }}</td>
								<td>{{ $customer->user->email }}</td>
								<td>{{ $customer->user->user_type }}</td>
								<td>{{ $customer->user->phone }}</td>
								<td>
									@if ($customer->user->customer_package)
										{{ $customer->user->customer_package->getTranslation('name') }}
									@endif
								</td>
								<td>{{ single_price($customer->user->balance) }}</td>
								<td class="text-center">
									<a class="btn btn-sm btn-icon rounded-circle btn-outline-primary" href="{{ route('customers.show',encrypt($customer->id)) }}">
										<i data-feather="eye"></i>
									</a>
									<a class="btn btn-sm btn-icon rounded-circle btn-outline-primary" href="{{ route('customers.edit', encrypt($customer->id)) }}">
										<i data-feather='edit'></i>
									</a>
									<a class="btn btn-sm btn-icon rounded-circle btn-outline-danger" href="{{ route('customers.destroy',$customer->id) }}"><i data-feather='trash-2'></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<!-- Modal to add new user starts-->
			<div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
				<div class="modal-dialog">
					<form class="add-new-user modal-content pt-0">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
						<div class="modal-header mb-1"><h5 class="modal-title" id="exampleModalLabel">New User</h5></div>

						<div class="modal-body flex-grow-1">
							<div class="form-group">
								<label class="form-label" for="basic-icon-default-fullname">Full Name</label>
								<input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" name="user-fullname" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"/>
							</div>

							<div class="form-group">
								<label class="form-label" for="basic-icon-default-uname">Username</label>
								<input type="text" id="basic-icon-default-uname" class="form-control dt-uname" placeholder="Web Developer" aria-label="jdoe1" aria-describedby="basic-icon-default-uname2" name="user-name"/>
							</div>

							<div class="form-group">
								<label class="form-label" for="basic-icon-default-email">Email</label>
								<input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" aria-describedby="basic-icon-default-email2" name="user-email"/>
								<small class="form-text text-muted"> You can use letters, numbers & periods </small>
							</div>

							<div class="form-group">
								<label class="form-label" for="user-role">User Role</label>
								<select id="user-role" class="form-control">
									<option value="subscriber">Subscriber</option>
									<option value="editor">Editor</option>
									<option value="maintainer">Maintainer</option>
									<option value="author">Author</option>
									<option value="admin">Admin</option>
								</select>
							</div>

							<div class="form-group mb-2">
								<label class="form-label" for="user-plan">Select Plan</label>
								<select id="user-plan" class="form-control">
									<option value="basic">Basic</option>
									<option value="enterprise">Enterprise</option>
									<option value="company">Company</option>
									<option value="team">Team</option>
								</select>
							</div>

							<button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
							<button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
						</div>
					</form>
				</div>
			</div>
			<!-- Modal to add new user Ends-->
		</div>
		<!-- list section end -->
	</section>
	<!-- users list ends -->
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
