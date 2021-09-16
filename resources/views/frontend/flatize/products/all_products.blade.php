@extends('frontend.flatize.master.master_page')

@section('custom_css')
	<style type="text/css">		
		#grid-view-img { width: 263px; height: 394px; }
		#list-view-img { width: 189px; height: 284px; }
	</style>
@endsection

@section('page_content')		
	<!-- Begin page top -->
	<section class="page-top-md">
		<div class="container">
			<div class="page-top-in">
				<h2><span>{{ $category->name }}</span></h2>
			</div>
		</div>
	</section>
	<!-- End page top -->
			
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<aside class="sidebar">
					<aside class="block filter-blk">
						<h4>Filter By Price</h4>
						<div id="price-range">
							<div class="padding-range"><div id="slider-range"></div></div>
							<label for="amount">Price:</label>
							<input type="text" id="amount">
							<p class="clearfix"><a href="#" class="btn btn-primary btn-sm">Apply Filter</a></p>
						</div>
					</aside>

					<aside class="block blk-colors">
						<h4>Colors</h4>
						<ul class="list-inline list-select clearfix">
							@foreach ($colors_info as $color)
								<li class="color"><a href="#" style="background-color: {{ $color->code }};"></a></li>
							@endforeach
						</ul>
					</aside>

					{{-- <aside class="block blk-cat">
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
					</aside> --}}

					<aside class="block featured">
						@foreach (get_all_parent_categories() as $parent_category)
							<h4>{{ $parent_category->name }}</h4>
							<ul class="list-unstyled list-thumbs-pro">
								@foreach (get_all_products_for_menu_by_category_id($parent_category->id) as $product)
									<li class="product">
										<div class="product-thumb-info">
											<div class="product-thumb-info-image">
												<a href="{{ route('product_details',$product->id) }}">
													<img alt="" width="60" height="80px" src="{{ asset('public/'.$product->image_path) }}">
												</a>
											</div>
											
											<div class="product-thumb-info-content">
												<h4><a href="{{ route('product_details',$product->id) }}">{{ $product->name }}</a></h4>
												{{-- <span class="item-cat"><small><a href="#">Stock clearance</a></small></span> --}}
												<span class="price">৳ {{ $product->unit_price }}</span>
											</div>
										</div>
									</li>
								@endforeach
							</ul>
						@endforeach
					</aside>
				</aside>
			</div>
			
			<div class="col-md-9">
				<!-- Begin Lookbook Women -->
				<section id="lookbook">
					<div class="lookbook">
						<h2><a href="#">Lookbook Women</a></h2>
						<p>Etiam aliquam risus ante, quis ultrices enim porta a. Integer et dolor sit amet enim feugiat faucibus. Donec sit amet egestas orci. Proin facilisis mi ornare turpis sollicitudin; vel rutrum est viverra. Vestibulum hendrerit egestas semper.</p>
					</div>
				</section>
				<!-- End Lookbook Women -->
				
				<div class="catalog">
					@yield('product_view')
					
					<ul class="pagination">
						<li class="disabled"><a href="#">&laquo;</a></li>
						<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">&raquo;</a></li>
				   </ul>
			   </div>
			</div>
		</div>				
	</div>
@endsection
        
<!-- Begin Quickview -->
@section('modal_section')
	<div class="quick-view-div"></div>
    {{-- @include('frontend.flatize.home.product_quickview') --}}
@endsection
<!-- End Quickview -->