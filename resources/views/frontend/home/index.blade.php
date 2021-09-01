@extends('frontend.master.master_page')
        
<!-- Begin Quickview -->
@section('sliders')
    @include('frontend.home.slider');
@endsection
<!-- End Quickview -->

@section('page_content')                
    <!-- Begin Ads -->
    <section class="ads">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 animation">
                    <a href="#"><img src="{{ asset('public/frontend/flatize/images/content/products/ad-1.png') }}" class="img-responsive" alt="Ad"></a>
                </div>
                <div class="col-xs-4 animation">
                    <a href="#"><img src="{{ asset('public/frontend/flatize/images/content/products/ad-2.png') }}" class="img-responsive" alt="Ad"></a>
                </div>
                <div class="col-xs-4 animation">
                    <a href="#"><img src="{{ asset('public/frontend/flatize/images/content/products/ad-3.png') }}" class="img-responsive" alt="Ad"></a>
                </div>
            </div>
        </div>
    </section>
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
    <section class="product-tab">
        <div class="container">
            <h2 class="title"><span>New Products</span></h2>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs pro-tabs text-center animation" role="tablist">
                <li class="active"><a href="#man" role="tab" data-toggle="tab">Man</a></li>
                <li><a href="#woman" role="tab" data-toggle="tab">Woman</a></li>
                <li><a href="#accesories" role="tab" data-toggle="tab">Accesories</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="man">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 animation">
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
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-6.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">29.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Linen shirt with ribbon at the front</a></h4>
                                        <span class="item-cat"><small><a href="#">Shirts</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
                            <div class="product">
                                <a href="shop-product-detail1.html">
                                    <span class="bag bag-new">New</span>
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-7.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">29.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Striped sweater</a></h4>
                                        <span class="item-cat"><small><a href="#">Stock clearance</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-8.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">29.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Checked shirt with pocket</a></h4>
                                        <span class="item-cat"><small><a href="#">Shirts</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 animation">
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
                        <div class="col-xs-6 col-sm-3 animation">
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
                        <div class="col-xs-6 col-sm-3 animation">
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
                        <div class="col-xs-6 col-sm-3 animation">
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
                </div>
                <div class="tab-pane" id="woman">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-9.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">69.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Classic blazer</a></h4>
                                        <span class="item-cat"><small><a href="#">Outerwear</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-10.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">39.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Striped full skirt</a></h4>
                                        <span class="item-cat"><small><a href="#">Skirts</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
                            <div class="product">
                                <a href="shop-product-detail1.html">
                                    <span class="bag bag-onsale">Sale</span>
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-11.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">79.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Structured double-breasted blazer</a></h4>
                                        <span class="item-cat"><small><a href="#">Outerwear</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-12.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">29.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Sheer overlay dress</a></h4>
                                        <span class="item-cat"><small><a href="#">Dresses</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-13.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">49.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Printed cape dress</a></h4>
                                        <span class="item-cat"><small><a href="#">Dresses</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-14.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">49.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Embroidered sleeveless jumpsuit</a></h4>
                                        <span class="item-cat"><small><a href="#">Dresses</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
                            <div class="product">
                                <a href="shop-product-detail1.html">
                                    <span class="bag bag-onsale">Sale</span>
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-15.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">19.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">V-Neck top</a></h4>
                                        <span class="item-cat"><small><a href="#">Tops</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-16.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">25.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Knit top with jewelled neckline</a></h4>
                                        <span class="item-cat"><small><a href="#">Knitwear</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="accesories">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-17.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">59.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Gold chrono watch</a></h4>
                                        <span class="item-cat"><small><a href="#">Accessories</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-18.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">7.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Long earrings</a></h4>
                                        <span class="item-cat"><small><a href="#">Accessories</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-19.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">19.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Braided belt</a></h4>
                                        <span class="item-cat"><small><a href="#">Belts</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-20.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">79.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Leather bucket bag with zip</a></h4>
                                        <span class="item-cat"><small><a href="#">Handbags</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-21.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">15.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Floral tie</a></h4>
                                        <span class="item-cat"><small><a href="#">Ties and Bow Ties</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-22.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">9.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Zigzag pattern cap</a></h4>
                                        <span class="item-cat"><small><a href="#">Caps and Hats</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-23.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">15.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Double chain necklace</a></h4>
                                        <span class="item-cat"><small><a href="#">Accessories</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 animation">
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
                                        <img alt="" class="img-responsive" src="{{ asset('public/frontend/flatize/images/content/products/product-24.jpg') }}">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">7.99 USD</span>
                                        <h4><a href="shop-product-detail2.html">Chain necklace</a></h4>
                                        <span class="item-cat"><small><a href="#">Accessories</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
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
    @include('frontend.home.product_quickview');
@endsection
<!-- End Quickview -->