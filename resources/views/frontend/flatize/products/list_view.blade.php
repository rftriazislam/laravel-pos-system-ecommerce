@extends('frontend.flatize.products.all_products')

@section('custom_css')
	<style type="text/css">
		#list-view-img { width: 189px; height: 284px; }
	</style>
@endsection

@section('categories')
	<aside class="block blk-cat">
		<h4>Man Category</h4>
		<ul class="list-unstyled list-cat">
            @foreach (get_categories_by_parent_id(1) as $man_category)
                <li>
                    <a href="{{ route('list_all_product',$man_category->id) }}">{{ $man_category->name }}</a>
                </li>
            @endforeach
		</ul>
	</aside>

	<aside class="block blk-cat">
		<h4>Woman Category</h4>
		<ul class="list-unstyled list-cat">
            @foreach (get_categories_by_parent_id(2) as $women_category)
                <li>
                    <a href="{{ route('list_all_product',$women_category->id) }}">{{ $women_category->name }}</a>
                </li>
            @endforeach
		</ul>
	</aside>
@endsection

@section('product_view')
	<div class="toolbar clearfix">
		<ul class="list-inline list-icons pull-left">
			<li><a href="{{ route('all_product',$category_id) }}"><i class="fa fa-th"></i></a></li>
			<li class="active"><a href="{{ route('list_all_product',$category_id) }}"><i class="fa fa-th-list"></i></a></li>
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
	
	@foreach ($products as $product)
		<div class="product product-list animation">
			<div class="product-thumb-info">
				<div class="row">
					<div class="col-xs-5 col-sm-3">
						<div class="product-thumb-info-image">
							<img alt="" class="img-responsive" id="list-view-img" src="{{ asset('public/'.$product->image_path) }}">
						</div>
					</div>	
					<div class="col-xs-7 col-sm-9">
						<div class="product-thumb-info-content">
							<h4><a href="{{ route('product_details',$product->id) }}">{{ $product->name }}</a></h4>
							<div class="reviews-counter clearfix">
								<div class="rating five-stars pull-left">
									<div class="star-rating"></div>
									<div class="star-bg"></div>
								</div>
								<span>3 Reviews</span> | <a href="#">Add Your Review</a>
							</div>
							<p class="price">৳ {{ number_format($product->unit_price) }}</p>
							<p class="text-justify">{{ $product->description }}</p>
							<p class="btn-group">
								<button class="btn btn-sm btn-icon add_item_to_cart" product-id="{{ $product->id }}">
									<i class="fa fa-shopping-cart"></i> Add to cart
								</button>
								<a href="javascript:void(0);" category-info="{{ $category }}" product-info="{{ $product }}" class="view-product">
									<span><i class="fa fa-eye"></i></span>
								</a>
								<a href="#"><span><i class="fa fa-heart-o"></i></span></a>
							</p>
						</div>
					</div>	
				</div>	
			</div>
		</div>
	@endforeach
@endsection