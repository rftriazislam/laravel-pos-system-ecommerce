@extends('frontend.flatize.products.all_products')

@section('categories')
	<aside class="block blk-cat">
		<h4>Man Category</h4>
		<ul class="list-unstyled list-cat">
            @foreach (get_categories_by_parent_id(1) as $man_category)
                <li>
                    <a href="{{ route('all_product',$man_category->id) }}">{{ $man_category->name }}</a>
                </li>
            @endforeach
		</ul>
	</aside>

	<aside class="block blk-cat">
		<h4>Woman Category</h4>
		<ul class="list-unstyled list-cat">
            @foreach (get_categories_by_parent_id(2) as $women_category)
                <li>
                    <a href="{{ route('all_product',$women_category->id) }}">{{ $women_category->name }}</a>
                </li>
            @endforeach
		</ul>
	</aside>
@endsection

@section('product_view')
	<div class="toolbar clearfix">
		<ul class="list-inline list-icons pull-left">
			<li class="active"><a href="{{ route('all_product',$category_id) }}"><i class="fa fa-th"></i></a></li>
			<li><a href="{{ route('list_all_product',$category_id) }}"><i class="fa fa-th-list"></i></a></li>
		</ul>
		<p class="pull-left">Showing 1-12 of 50 results</p>
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
					<a href="shop-product-detail1.html">
						<span class="bag bag-hot">Hot</span>
					</a>
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