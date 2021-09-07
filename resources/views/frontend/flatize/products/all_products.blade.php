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

					@yield('categories')

					<aside class="block featured">
						<h4>Featured</h4>
						<ul class="list-unstyled list-thumbs-pro">
							<li class="product">
								<div class="product-thumb-info">
									<div class="product-thumb-info-image">
										<a href="shop-product-detail1.html"><img alt="" width="60" src="{{ asset('public/frontend/flatize/images/content/products/product-7.jpg') }}"></a>
									</div>
									
									<div class="product-thumb-info-content">
										<h4><a href="shop-product-detail2.html">Striped sweater</a></h4>
										<span class="item-cat"><small><a href="#">Stock clearance</a></small></span>
										<span class="price">29.99 USD</span>
									</div>
								</div>
							</li>
							<li class="product">
								<div class="product-thumb-info">
									<div class="product-thumb-info-image">
										<a href="shop-product-detail1.html"><img alt="" width="60" src="{{ asset('public/frontend/flatize/images/content/products/product-8.jpg') }}"></a>
									</div>
									
									<div class="product-thumb-info-content">
										<h4><a href="shop-product-detail2.html">Checked shirt with pocket</a></h4>
										<span class="item-cat"><small><a href="#">Shirts</a></small></span>
										<span class="price">29.99 USD</span>
									</div>
								</div>
							</li>
							<li class="product">
								<div class="product-thumb-info">
									<div class="product-thumb-info-image">
										<a href="shop-product-detail1.html"><img alt="" width="60" src="{{ asset('public/frontend/flatize/images/content/products/product-9.jpg') }}"></a>
									</div>
									
									<div class="product-thumb-info-content">
										<h4><a href="shop-product-detail2.html">Classic blazer</a></h4>
										<span class="item-cat"><small><a href="#">Outerwear</a></small></span>
										<span class="price">29.99 USD</span>
									</div>
								</div>
							</li>
						</ul>
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