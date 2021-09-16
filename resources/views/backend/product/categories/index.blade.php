{{-- @extends('backend.layouts.app') --}}
@extends('layouts/contentLayoutMaster')

@section('title', 'Categories')
@section('content')
<div class="d-flex justify-content-end pb-2">
    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        <span>{{translate('Add New category')}}</span>
    </a>
</div>
<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6">{{ translate('Categories') }}</h5>
        <form class="" id="sort_categories" action="" method="GET">
            <div class="box-inline pad-rgt pull-left">
                <div class="" style="min-width: 200px;">
                    <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name & Enter') }}">
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="card-datatable table-responsive pt-0">

        <table class="table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>{{translate('Name')}}</th>
                    <th data-breakpoints="lg">{{ translate('Parent Category') }}</th>
                    <th data-breakpoints="lg">{{ translate('Order Level') }}</th>
                    <th data-breakpoints="lg">{{ translate('Level') }}</th>
                    <th data-breakpoints="lg">{{translate('Banner')}}</th>
                    <th data-breakpoints="lg">{{translate('Icon')}}</th>
                    <th data-breakpoints="lg">{{translate('Featured')}}</th>
                    <th data-breakpoints="lg">{{translate('Menu Visibility')}}</th>
                    <th data-breakpoints="lg">{{translate('Commission')}}</th>
                    <th width="15%" class="text-right">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                    <tr>
                        <td>{{ ($key+1) + ($categories->currentPage() - 1)*$categories->perPage() }}</td>
                        <td>{{ $category->getTranslation('name') }}</td>
                        <td>
                            @php
                                $parent = \App\Category::where('id', $category->parent_id)->first();
                            @endphp
                            @if ($parent != null)
                                {{ $parent->getTranslation('name') }}
                            @else
                                —
                            @endif
                        </td>
            			<td>{{ $category->order_level }}</td>
            			<td>{{ $category->level }}</td>
                        <td>
                            @if($category->banner != null)
                                <img src="{{ uploaded_asset($category->banner) }}" alt="{{translate('Banner')}}" class="h-50px">
                            @else
                                —
                            @endif
                        </td>
                        <td>
                            @if($category->icon != null)
                                <span class="avatar avatar-square avatar-xs">
                                    <img src="{{ uploaded_asset($category->icon) }}" alt="{{translate('icon')}}">
                                </span>
                            @else
                                —
                            @endif
                        </td>
                        <td>
                            <label class="form-check form-check-success form-switch mb-0">
                                <input type="checkbox"  class="form-check-input" onchange="update_featured(this)"  value="{{ $category->id }}" <?php if($category->featured == 1) echo "checked";?>>
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <label class="form-check form-check-success form-switch mb-0">
                                <input type="checkbox"  class="form-check-input" onchange="update_menu_visibility(this)"  value="{{ $category->id }}" <?php if($category->menu_visibility == 1) echo "checked";?>>
                                <span></span>
                            </label>
                        </td>
                        <td>{{ $category->commision_rate }} %</td>
                        <td class="text-center">
                            <a class="btn btn-soft-primary btn-icon rounded-circle btn-outline-secondary btn-sm" href="{{route('categories.edit', ['id'=>$category->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                <i data-feather='edit'></i>
                            </a>
                            <a href="#" class="btn btn-icon rounded-circle btn-outline-danger btn-sm confirm-delete" data-href="{{route('categories.destroy', $category->id)}}" title="{{ translate('Delete') }}">
                                <i data-feather='trash-2'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $categories->appends(request()->input())->links() }}
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
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('categories.featured') }}',{_token:'{{ csrf_token() }}',id:el.value, status:status},function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Featured categories updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_menu_visibility(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }

            $.post('{{ route('categories.update_menu_visibility') }}',{_token:'{{ csrf_token() }}',id:el.value,status:status},function(data) {
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('This category visible in menu successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
