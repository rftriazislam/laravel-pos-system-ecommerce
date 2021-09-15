@extends('frontend.flatize.products.all_products')

@section('product_view')
	<div class="toolbar clearfix">
		<ul class="list-inline list-icons pull-left">
			<li class="active"><a href="{{ route('all_product',$category_id) }}"><i class="fa fa-th"></i></a></li>
			<li><a href="{{ route('list_all_product',$category_id) }}"><i class="fa fa-th-list"></i></a></li>
		</ul>
		<p class="pull-left">Showing 1-12 of {{ count($products) }} results</p>
		<!-- Ordering -->
		<div class="list-sort pull-right">
			<select class="formDropdown">
				<option>Default Sorting</option>
				<option>Sort by Popularity</option>
				<option>Sort by Newness</option>
			</select>
		</div>
	</div>

	<div class="row">
		@foreach ($products as $product)
			<div class="col-xs-4 animation">
				<div class="product">
					<a href="javascript:void(0)"><span class="bag bag-hot">Hot</span></a>
					<div class="product-thumb-info">
						<div class="product-thumb-info-image">
							<span class="product-thumb-info-act">
								<a href="javascript:void(0);" category-info="{{ $category }}" product-info="{{ $product }}" class="view-product">
									<span><i class="fa fa-external-link"></i></span>
								</a>
								<a href="javascript:void(0)" class="add-to-cart-product add_item_to_cart" product-id="{{ $product->id }}">
									<span><i class="fa fa-shopping-cart"></i></span>
								</a>
							</span>
							<img alt="" class="img-responsive" id="grid-view-img"  src="{{ asset('public/'.$product->image_path) }}">
						</div>
						<div class="product-thumb-info-content">
							<span class="price pull-right">৳ {{ number_format($product->unit_price) }}</span>
							<h4><a href="{{ route('product_details',$product->id) }}">{{ $product->name }}</a></h4>
							<span class="item-cat"><small><a href="{{ route('all_product',$category->id) }}">{{ $category->name }}</a></small></span>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection