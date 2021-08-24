{{-- @extends('backend.layouts.app') --}}
@extends('layouts/contentLayoutMaster')

@section('title', 'Attributes')
@section('content')



<div class="row">
	<div class="col-md-7">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Attributes')}}</h5>
			</div>
			<div class="card-body">
				<div class="card-datatable table-responsive pt-0">

				<table class="table mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th width="60%;">{{ translate('Name')}}</th>
							<th class="text-right">{{ translate('Options')}}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($attributes as $key => $attribute)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$attribute->getTranslation('name')}}</td>
								<td class="text-center">
									<a class="btn btn-soft-primary btn-icon rounded-circle btn-outline-secondary btn-sm" href="{{route('attributes.show', $attribute->id)}}" title="{{ translate('Attribute values') }}">
										<i data-feather='settings'></i>
									</a>
									<a class="btn btn-soft-primary btn-icon rounded-circle btn-outline-secondary btn-sm" href="{{route('attributes.edit', ['id'=>$attribute->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
										<i data-feather='edit'></i>
									</a>
									<a href="#" class="btn btn-icon rounded-circle btn-outline-danger btn-sm confirm-delete" data-href="{{route('attributes.destroy', $attribute->id)}}" title="{{ translate('Delete') }}">
										<i data-feather='trash-2'></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				</div>

			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
					<h5 class="mb-0 h6">{{ translate('Add New Attribute') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('attributes.store') }}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="name">{{translate('Name')}}</label>
						<input type="text" placeholder="{{ translate('Name')}}" id="name" name="name" class="form-control" required>
					</div>
					<div class="form-group mb-3 d-flex justify-content-end">
						<button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
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
