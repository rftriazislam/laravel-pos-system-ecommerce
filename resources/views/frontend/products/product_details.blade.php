@extends('frontend.master.master_page')

@section('page_content')		
	<!-- Begin page top -->
	<section class="page-top">
		<div class="container">
			<div class="page-top-in">
				<ol class="breadcrumb pull-left">
					<li><a href="#">Men</a></li>
					<li><a href="#">Jeans</a></li>
					<li class="active">Checked Jeans</li>
				</ol>
				<ul class="pager pull-right">
					@php
						$previous_link = '#';
						$next_link = '#';

						if ($previous_product_id) {
							$previous_link = route('product_details',$previous_product_id);							
						}

						if ($next_product_id) {
							$next_link = route('product_details',$next_product_id);
						}
					@endphp
					<li><a href="{{ $previous_link }}">&laquo; Previous</a></li>
					<li><a href="{{ $next_link }}">Next &raquo;</a></li>
				</ul>
			</div>
		</div>
	</section>
	<!-- End page top -->
			
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="product-preview">
					<p><img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-1.jpg') }}"></p>
					<p><img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-1-1.jpg') }}"></p>
					<p><img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-1-2.jpg') }}"></p>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="summary entry-summary">
					<h3>{{ $product->name }}</h3>
					
					<div class="reviews-counter clearfix">
						<div class="rating five-stars pull-left">
							<div class="star-rating"></div>
							<div class="star-bg"></div>
						</div>
						<span>3 Reviews</span>
					</div>

					<p class="price">
						<span class="amount">৳ {{ $product->unit_price }}</span>
					</p>
					
					<ul class="list-inline list-select clearfix">
						<li>
							<div class="list-sort">
								<select class="formDropdown">
									<option>Select Size</option>
									<option>XS</option>
									<option>S</option>
									<option>M</option>
									<option>L</option>
									<option>XL</option>
									<option>XXL</option>
								</select>
							</div>
						</li>
						<li class="color"><a href="#" class="color1"></a></li>
						<li class="color"><a href="#" class="color2"></a></li>
						<li class="color"><a href="#" class="color3"></a></li>
						<li class="color"><a href="#" class="color4"></a></li>
					</ul>

					<form method="post" class="cart">
						<div class="quantity pull-left">
							<input type="button" class="minus" value="-">
							<input type="text" class="input-text qty" title="Qty" value="1" name="quantity" min="1" step="1">
							<input type="button" class="plus" value="+">
						</div>
						<a href="#" class="btn btn-grey">
							<span><i class="fa fa-heart"></i></span>
						</a>
						<button href="#" class="btn btn-primary btn-icon"><i class="fa fa-shopping-cart"></i> Add to cart</button>
					</form>
					
					<ul class="list-unstyled product-meta">
						<li>Sku: 54329843</li>
						<li>Categories: {{ $category->name }}</li>
						<li>Tags: {{ $product->tags }}</li>
					</ul>
					
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Description</a> </h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body text-justify"> 
									<p>{{ $product->description }}</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Addition Information</a> </h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse">
								<div class="panel-body text-justify">
									<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Reviews (3)</a> </h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse">
								<div class="panel-body post-comments">
									<ul class="comments">
										<li>
											<div class="comment">
												<div class="img-circle"> <img class="avatar" width="50" alt="" src="{{ asset('public/frontend/flatize/images/content/blog/avatar.png') }}"> </div>
												<div class="comment-block">
													<span class="comment-by"> <strong>Frank Reman</strong></span>
													<span class="date"><small><i class="fa fa-clock-o"></i> January 12, 2013</small></span>
													<p>Lorem ipsum dolor sit amet.</p>
												</div>
											</div>
										</li>
										<li>
											<div class="comment">
												<div class="img-circle"> <img class="avatar" width="50" alt="" src="{{ asset('public/frontend/flatize/images/content/blog/avatar.png') }}"> </div>
												<div class="comment-block">
													<span class="comment-by"> <strong>Frank Reman</strong></span>
													<span class="date"><small><i class="fa fa-clock-o"></i> July 11, 2014</small></span>
													<p>Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae</p>
												</div>
											</div>
										</li>
										<li>
											<div class="comment">
												<div class="img-circle"> <img class="avatar" width="50" alt="" src="{{ asset('public/frontend/flatize/images/content/blog/avatar.png') }}"> </div>
												<div class="comment-block">
													<span class="comment-by"> <strong>Frank Reman</strong></span>
													<span class="date"><small><i class="fa fa-clock-o"></i> July 11, 2014</small></span>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- Begin Related Products -->
				<section class="products-slide">
					
					<h2 class="title"><span>Related Products</span></h2>
					<div class="row">
						<div class="col-xs-6">
							<div class="product">
								<div class="product-thumb-info">
									<div class="product-thumb-info-image">
										<span class="product-thumb-info-act">
											<a href="javascript:void(0);" data-toggle="modal" data-target=".quickview-wrapper" class="view-product">
												<span><i class="fa fa-external-link"></i></span>
											</a>
											<a href="shop-cart-full.html" class="add-to-cart-product">
												<span><i class="fa fa-shopping-cart"></i></span>
											</a>
										</span>
										<img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-1.jpg') }}">
									</div>
									<div class="product-thumb-info-content">
										<span class="price pull-right">29.99 USD</span>
										<h4><a href="shop-product-detail2.html">Denim shirt</a></h4>
										<span class="item-cat"><small><a href="#">Jackets</a></small></span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="product">
								<a href="shop-product-detail1.html">
									<span class="bag bag-hot">Hot</span>
								</a>
								<div class="product-thumb-info">
									<div class="product-thumb-info-image">
										<span class="product-thumb-info-act">
											<a href="javascript:void(0);" data-toggle="modal" data-target=".quickview-wrapper" class="view-product">
												<span><i class="fa fa-external-link"></i></span>
											</a>
											<a href="shop-cart-full.html" class="add-to-cart-product">
												<span><i class="fa fa-shopping-cart"></i></span>
											</a>
										</span>
										<img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-2.jpg') }}">
									</div>
									<div class="product-thumb-info-content">
										<span class="price pull-right">29.99 USD</span>
										<h4><a href="shop-product-detail2.html">Poplin shirt with fine pleated bands</a></h4>
										<span class="item-cat"><small><a href="#">Shirts</a></small></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">	
						<div class="col-xs-6">
							<div class="product">
								<div class="product-thumb-info">
									<div class="product-thumb-info-image">
										<span class="product-thumb-info-act">
											<a href="javascript:void(0);" data-toggle="modal" data-target=".quickview-wrapper" class="view-product">
												<span><i class="fa fa-external-link"></i></span>
											</a>
											<a href="shop-cart-full.html" class="add-to-cart-product">
												<span><i class="fa fa-shopping-cart"></i></span>
											</a>
										</span>
										<img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-3.jpg') }}">
									</div>
									<div class="product-thumb-info-content">
										<span class="price pull-right">29.99 USD</span>
										<h4><a href="shop-product-detail2.html">Contrasting shirt</a></h4>
										<span class="item-cat"><small><a href="#">Stock clearance</a></small></span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="product">
								<a href="shop-product-detail1.html">
									<span class="bag bag-cool">Cool</span>
								</a>
								<div class="product-thumb-info">
									<div class="product-thumb-info-image">
										<span class="product-thumb-info-act">
											<a href="javascript:void(0);" data-toggle="modal" data-target=".quickview-wrapper" class="view-product">
												<span><i class="fa fa-external-link"></i></span>
											</a>
											<a href="shop-cart-full.html" class="add-to-cart-product">
												<span><i class="fa fa-shopping-cart"></i></span>
											</a>
										</span>
										<img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-4.jpg') }}">
									</div>
									<div class="product-thumb-info-content">
										<span class="price pull-right">29.99 USD</span>
										<h4><a href="shop-product-detail2.html">Waistcoat with top stitching</a></h4>
										<span class="item-cat"><small><a href="#">Blazers</a></small></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</section>
				<!-- End Related Products -->
			</div>
		</div>
	</div>
@endsection
        
<!-- Begin Quickview -->
@section('modal_section')
    @include('frontend.home.product_quickview')
@endsection
<!-- End Quickview -->