@php
	// Cart::session(9)->clear();
	// dd(Cart::session(9)->getContent());
	// exit();
@endphp
@extends('frontend.flatize.master.master_page')

@section('custom_css')
	<style type="text/css">
		.product-img { width: 555px; height: 833px; }
		.related-product-img { width: 263px; height: 394px; }
	</style>
@endsection

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
					<p><img alt="" class="img-responsive product-img" src="{{ asset('public/'.$product->image_path) }}"></p>
					@if ($product->images)
						@foreach ($product->images as $image)
							<p><img alt="" class="img-responsive product-img" src="{{ asset('public/'.$image->file_name) }}"></p>
						@endforeach
					@endif
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
						<span class="amount">৳ {{ number_format($product->unit_price) }}</span>
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
						@php
							$colors = json_decode($product['colors'],true);
						@endphp
						@foreach ($colors as $color)
							<li class="color"><a href="#" style="background-color: {{ $color }};"></a></li>
						@endforeach
					</ul>

					<div class="cart">
						<div class="quantity pull-left">
							<input type="button" class="minus" index="-1" value="-">
							<input type="text" class="input-text qty" title="Qty" value="1" name="quantity" min="1" step="1">
							<input type="button" class="plus" index="-1" value="+">
						</div>
						<a href="#" class="btn btn-grey">
							<span><i class="fa fa-heart"></i></span>
						</a>
						<button class="btn btn-primary btn-icon add_item_to_cart" product-id="{{ $product->id }}">
							<i class="fa fa-shopping-cart"></i> Add to cart
						</button>
					</div>
					
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
						@if ($related_products)
							@foreach ($related_products as $related_product)
								<div class="col-xs-6">
									<div class="product">
										<a href="shop-product-detail1.html">
											<span class="bag bag-hot">Hot</span>
										</a>
										<div class="product-thumb-info">
											<div class="product-thumb-info-image">
												<span class="product-thumb-info-act">
													<a href="javascript:void(0);" category-info="{{ $category }}" product-info="{{ $related_product }}" class="view-product">
														<span><i class="fa fa-external-link"></i></span>
													</a>
													<a href="shop-cart-full.html" class="add-to-cart-product">
														<span><i class="fa fa-shopping-cart"></i></span>
													</a>
												</span>
												<img alt="" class="img-responsive related-product-img" src="{{ asset('public/'.$related_product->image_path) }}">
											</div>
											<div class="product-thumb-info-content">
												<span class="price pull-right">৳ {{ number_format($related_product->unit_price) }}</span>
												<h4><a href="{{ route('product_details',$related_product->id) }}">{{ $related_product->name }}</a></h4>
												<span class="item-cat"><small><a href="{{ route('all_product',$related_product->category_id) }}">{{ $related_product->category_name }}</a></small></span>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						@endif
					</div>
					
				</section>
				<!-- End Related Products -->
			</div>
		</div>
	</div>
@endsection
        
<!-- Begin Quickview -->
@section('modal_section')
	<div class="quick-view-div"></div>
@endsection
<!-- End Quickview -->