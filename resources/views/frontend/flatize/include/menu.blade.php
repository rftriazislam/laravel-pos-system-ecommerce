@php
    $logo_image_path = get_company_logo();
    // dd(auth::user());
@endphp
        <nav class="navbar navbar-default navbar-main navbar-main-slide" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="logo" href="{{ route('home') }}"><img src="{{ asset($logo_image_path) }}" alt="yara"></a> </div>
                <ul class="nav navbar-nav navbar-act pull-right">
                    @if (empty(auth::user()) || auth::user()['user_type'] != 'customer')
                        {{-- <li class="login"><a href="javascript:void(0);"><i class="fa fa-user"></i>&nbsp;Login</a></li> --}}
                        <li class="login"><a href="javascript:void(0);">Login</a></li>
                    @endif
                    <li class="search"><a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a></li>
                </ul>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="dropdown megamenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop</a>
                            <div class="dropdown-menu">
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <div class="col-md-8 hidden-sm hidden-xs menu-column">
                                            <div class="row">
                                                @foreach (get_all_parent_categories() as $parent_category)
                                                    @php
                                                        $products = get_all_products_for_menu_by_category_id($parent_category->id);
                                                    @endphp
                                                    <div class="col-md-4">
                                                        <h3>{{ $parent_category->name }}</h3>
                                                        <ul class="list-unstyled sub-menu list-thumbs-pro">
                                                            @if ($products)
                                                                @foreach ($products as $product)
                                                                    <li class="product">
                                                                        <div class="product-thumb-info">
                                                                            <div class="product-thumb-info-image">
                                                                                <a href="{{ route('product_details',$product->id) }}"><img alt="" width="60" height="80px" src="{{ asset('public/'.$product->image_path) }}"></a>
                                                                            </div>
                                                                            
                                                                            <div class="product-thumb-info-content">
                                                                                <h4><a href="{{ route('product_details',$product->id) }}">{{ $product->name }}</a></h4>
                                                                                {{-- <span class="item-cat"><small><a href="#">{{ $product->category_name }}</a></small></span> --}}
                                                                                <span class="price">৳ {{ number_format($product->unit_price) }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                            <li><a href="{{ route('all_product',$parent_category->id) }}">See All</a></li>
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-2 menu-column">
                                            <h3>Man</h3>
                                            <ul class="list-unstyled sub-menu">
                                                @foreach (get_categories_by_parent_id(1) as $man_category)
                                                    <li>
                                                        <a href="{{ route('all_product',$man_category->id) }}">{{ $man_category->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        
                                        <div class="col-md-2 menu-column">
                                            <h3>Woman</h3>
                                            <ul class="list-unstyled sub-menu">
                                                @foreach (get_categories_by_parent_id(2) as $women_category)
                                                    <li>
                                                        <a href="{{ route('all_product',$women_category->id) }}">{{ $women_category->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div> --}}

                                        <div class="col-sm-4 hidden-sm hidden-xs menu-column">
                                            <h3>Explore new collection</h3>
                                            <ul class="list-unstyled sub-menu list-md-pro">
                                                <li class="product">
                                                    <div class="product-thumb-info">
                                                        <div class="product-thumb-info-image">
                                                            <a href="shop-product-detail1.html"><img class="img-responsive" width="330" alt="" src="{{ asset('public/frontend/flatize/images/content/products/ad-1.png') }}"></a>
                                                        </div>
                                                        
                                                        <div class="product-thumb-info-content">
                                                            <h4><a href="shop-product-detail2.html">Men’s Fashion and Style</a></h4>
                                                            <p>Whatever you’re looking for, be it the latest fashion trends, cool outfit ideas or new ways to wear your favourite pieces, we’ve got all the style inspiration you need.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div> 
        </nav>