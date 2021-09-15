@extends('frontend.flatize.master.master_page')

@section('custom_css')
    <style type="text/css">
        .tab-content-img { width: 263px; height: 394px; }
        .advertise-img { width: 360px; height: 220px; margin-top: 10px; }
        .slider-img { width: 1519px; height: 483px; }
    </style>
@endsection

@php
    $advertise_images = get_frontend_settings_value('Advertise Section');
    $slider_images = get_frontend_settings_value('Slider Section');
@endphp
        
<!-- Begin Quickview -->
@section('sliders')
    @include('frontend.flatize.home.slider',['slider_images'=>$slider_images])
@endsection
<!-- End Quickview -->

@section('page_content')                
    <!-- Begin Ads -->

    @if ($advertise_images)
        <section class="ads">
            <div class="container">
                <div class="row">
                    @foreach ($advertise_images as $image)
                        @if ($image['status'] == 1)
                            <div class="col-xs-4 animation">
                                <a href="#">
                                    <img src="{{ asset($image['image_path']) }}" class="img-responsive advertise-img" alt="Ad">
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- End Ads -->
    
    <!-- Begin Top Selling -->
    <section class="products-slide">
        <div class="container">
            <h2 class="title"><span>Top Selling</span></h2>
            <div class="row">
                <div id="owl-product-slide" class="owl-carousel product-slide">
                    <div class="col-md-12 animation">
                        <div class="item product">
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
                    <div class="col-md-12 animation">
                        <div class="item product">
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
                                    <span class="price pull-right">25.99 USD</span>
                                    <h4><a href="shop-product-detail2.html">Poplin shirt with fine pleated bands</a></h4>
                                    <span class="item-cat"><small><a href="#">Shirts</a></small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 animation">
                        <div class="item product">
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
                                    <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-3.jpg') }}">
                                </div>
                                <div class="product-thumb-info-content">
                                    <span class="price pull-right">25.99 USD</span>
                                    <h4><a href="shop-product-detail2.html">Contrasting shirt</a></h4>
                                    <span class="item-cat"><small><a href="#">Stock clearance</a></small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 animation">
                        <div class="item product">
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
                                    <span class="price pull-right">59.99 USD</span>
                                    <h4><a href="shop-product-detail2.html">Waistcoat with top stitching</a></h4>
                                    <span class="item-cat"><small><a href="#">Blazers</a></small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 animation">
                        <div class="item product">
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
                                    <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-5.jpg') }}">
                                </div>
                                <div class="product-thumb-info-content">
                                    <span class="price pull-right">39.99 USD</span>
                                    <h4><a href="shop-product-detail2.html">Loose fit ripped jeans</a></h4>
                                    <span class="item-cat"><small><a href="#">Jeans</a></small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Top Selling -->
    
    <!-- Begin Lookbook Women -->
    <section id="lookbook">
        <div class="container">
            <div class="lookbook">
                <h2><a href="#">Lookbook Women</a></h2>
                <p>Etiam aliquam risus ante, quis ultrices enim porta a. Integer et dolor sit amet enim feugiat faucibus. Donec sit amet egestas orci. Proin facilisis mi ornare turpis sollicitudin; vel rutrum est viverra. Vestibulum hendrerit egestas semper.</p>
            </div>
        </div>
    </section>
    <!-- End Lookbook Women -->
    
    <!-- Begin New Products -->
    @php
        $tab_count = 0;
        $tab_content_count = 0;
        $categories = get_all_new_product_category();
    @endphp
    @if ($categories)
        <section class="product-tab">
            <div class="container">
                <h2 class="title"><span>New Products</span></h2>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs pro-tabs text-center animation" role="tablist">
                    @foreach ($categories as $tab_category)
                        @php
                            $tab_count++;
                            $tab_status = '';
                            if ($tab_count == 1) {
                                $tab_status = 'active';
                            }
                        @endphp
                        <li class="{{ $tab_status }}">
                            <a href="#{{ strtolower($tab_category->name) }}" role="tab" data-toggle="tab">{{ $tab_category->name }}</a>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    @foreach ($categories as $tab_content_category)
                        @php
                            $tab_content_count++;
                            $tab_content_status = '';
                            if ($tab_content_count == 1) {
                                $tab_content_status = 'active';
                            }
                            $new_products = get_all_new_products_by_category_id($tab_content_category->id);
                            $category = get_category_info_by_id($tab_content_category->category_id);
                        @endphp
                        <div class="tab-pane {{ $tab_content_status }}" id="{{ strtolower($tab_content_category->name) }}">
                            <div class="row">
                                @foreach ($new_products as $product)
                                    <div class="col-xs-6 col-sm-3 animation">
                                        <div class="product">
                                            <a href="shop-product-detail1.html">
                                                <span class="bag bag-new">New</span>
                                                {{-- <span class="bag bag-hot">Hot</span> --}}
                                                {{-- <span class="bag bag-cool">Cool</span> --}}
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
                                                    <img alt="" class="img-responsive tab-content-img" src="{{ asset('public/'.$product->image_path) }}">
                                                </div>
                                                <div class="product-thumb-info-content">
                                                    <span class="price pull-right">৳ {{ number_format($product->unit_price) }}</span>
                                                    <h4><a href="{{ route('product_details',$product->id) }}">{{ $product->name }}</a></h4>
                                                    {{-- <span class="item-cat"><small><a href="#">Stock clearance</a></small></span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </section>
    @endif
    <!-- End New Products -->
    
    <!-- Begin Parallax -->
    <section class="pi-parallax" data-stellar-background-ratio="0.6">
        <div class="container">
            <div id="owl-text-slide" class="owl-carousel">
                <div class="item">
                    <blockquote>
                        <p>Design is a funny word. Some people think design means how it looks. But of course, if you dig deeper, it’s really how it works.</p>
                        <footer>by <cite title="Steve Jobs">Steve Jobs</cite></footer>
                    </blockquote>
                </div>
                <div class="item">
                    <blockquote>
                        <p>They may forget what you said, but they will never forget how you made them feel.</p>
                        <footer>by <cite title="Steve Jobs">Carl W. Buechner</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
    <!-- End Parallax -->
    
    <!-- Begin Latest Blogs -->
    <section class="latest-blog">
        <div class="container">
            <h2 class="title"><span>Latest from the blog</span></h2>
            <div class="row">
                <div class="col-xs-6 animation">
                    <article class="post">
                        <div class="post-image">
                            <span class="post-info-act">
                                <a href="blog-single.html"><i class="fa fa-caret-right"></i></a>
                            </span>
                            <img class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/blog/demo-1.jpg') }}" alt="Blog">
                        </div>
                        <h3><a href="blog-single.html">Paris Fashion Week S/S 2014: womenswear collections</a></h3>
                        <p class="post-meta">15th December 2014</p>
                    </article>
                </div>
                <div class="col-xs-6 animation">
                    <article class="post">
                        <div class="post-image">
                            <span class="post-info-act">
                                <a href="blog-single.html"><i class="fa fa-camera"></i></a>
                            </span>
                            <img class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/blog/demo-2.jpg') }}" alt="Blog">
                        </div>
                        <h3><a href="blog-single.html">Show tunes: London Fashion Week S/S 2014's runway playlist</a></h3>
                        <p class="post-meta">15th December 2014</p>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- End Latest Blogs -->
@endsection
        
<!-- Begin Quickview -->
@section('modal_section')
    <div class="quick-view-div"></div>
    {{-- @include('frontend.flatize.home.product_quickview'); --}}
@endsection
<!-- End Quickview -->