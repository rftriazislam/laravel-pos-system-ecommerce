@extends('layouts/contentLayoutMaster')
{{-- @extends('backend.layouts.app') --}}

@section('title', 'Colors')

@section('content')

{{-- @extends('backend.layouts.app')

@section('content') --}}

{{-- <div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3">{{translate('All Colors')}}</h1>
    </div>
</div> --}}

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{ translate('Colors')}}</h5>
            </div>
            <div class="card-body">
            <div class="card-datatable table-responsive pt-0">

                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ translate('Name')}}</th>
                            <th class="text-right">{{ translate('Options')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colors as $key => $color)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$color->name}}</td>
                            <td class="text-center">
                                <a class="btn btn-soft-primary btn-icon rounded-circle btn-outline-secondary btn-sm" href="{{route('colors.edit', ['id'=>$color->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                    <i data-feather='edit'></i>
                                </a>
                                <a href="#" class="btn btn-icon rounded-circle btn-outline-danger btn-sm confirm-delete" data-href="{{route('colors.destroy', $color->id)}}" title="{{ translate('Delete') }}">
                                    <i data-feather='trash-2'></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="aiz-pagination">
                    {{ $colors->appends(request()->input())->links() }}
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{ translate('Add New Color') }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('colors.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">{{translate('Name')}}</label>
                        <input type="text" placeholder="{{ translate('Name')}}" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">{{translate('Color Code')}}</label>
                        <input type="text" placeholder="{{ translate('Color Code')}}" id="code" name="code" class="form-control" required>
                    </div>
                    <div class="form-group mb-3 text-right">
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
