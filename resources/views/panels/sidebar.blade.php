@php
$configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{(($configData['theme'] === 'dark') || ($configData['theme'] === 'semi-dark')) ? 'menu-dark' : 'menu-light'}} menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item me-auto">
        <a class="navbar-brand" href="{{url('/')}}">
          <span class="brand-logo">
            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
              <defs>
                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                  <stop stop-color="#000000" offset="0%"></stop>
                  <stop stop-color="#FFFFFF" offset="100%"></stop>
                </lineargradient>
                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                  <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                  <stop stop-color="#FFFFFF" offset="100%"></stop>
                </lineargradient>
              </defs>
              <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                  <g id="Group" transform="translate(400.000000, 178.000000)">
                    <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                    <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                    <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                    <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                    <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                  </g>
                </g>
              </g>
            </svg>
          </span>
          <h2 class="brand-text">Vuexy</h2>
        </a>
      </li>
      <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
          <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
          <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        {{-- Foreach menu item starts --}}
          <li class="nav-item">
              <a href="{{route('admin.dashboard')}}" class="nav-link d-flex align-items-center">
                  <i class="las la-home"></i>
                  <span>{{translate('Dashboard')}}</span>
              </a>
          </li>

        <!-- POS Addon-->
        @if (\App\Addon::where('unique_identifier', 'pos_system')->first() != null && \App\Addon::where('unique_identifier', 'pos_system')->first()->activated)
          @if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
              <a href="#" class="aiz-side-nav-link">
                  <i class="las la-tasks aiz-side-nav-icon"></i>
                  <span class="aiz-side-nav-text">{{translate('POS System')}}</span>
                  @if (env("DEMO_MODE") == "On")
                  <span class="badge badge-inline badge-danger">Addon</span>
                  @endif
                  <span class="aiz-side-nav-arrow"></span>
              </a>
              <ul class="aiz-side-nav-list level-2">
                  <li class="aiz-side-nav-item">
                      <a href="{{route('poin-of-sales.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['poin-of-sales.index', 'poin-of-sales.create'])}}">
                          <span class="aiz-side-nav-text">{{translate('POS Manager')}}</span>
                      </a>
                  </li>
                  <li class="aiz-side-nav-item">
                      <a href="{{route('poin-of-sales.activation')}}" class="aiz-side-nav-link">
                          <span class="aiz-side-nav-text">{{translate('POS Configuration')}}</span>
                      </a>
                  </li>
              </ul>
          </li>
          @endif
        @endif

        <!-- Product -->
        @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('Products')}}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <!--Submenu-->
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a class="aiz-side-nav-link" href="{{route('products.create')}}">
                            <span class="aiz-side-nav-text">{{translate('Add New product')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('products.all')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('All Products') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('products.admin')}}" class="aiz-side-nav-link {{ areActiveRoutes(['products.admin', 'products.create', 'products.admin.edit']) }}" >
                            <span class="aiz-side-nav-text">{{ translate('In House Products') }}</span>
                        </a>
                    </li>
                    @if(get_setting('vendor_system_activation') == 1)
                        <li class="aiz-side-nav-item">
                            <a href="{{route('products.seller')}}" class="aiz-side-nav-link {{ areActiveRoutes(['products.seller', 'products.seller.edit']) }}">
                                <span class="aiz-side-nav-text">{{ translate('Seller Products') }}</span>
                            </a>
                        </li>
                    @endif
                    <li class="aiz-side-nav-item">
                        <a href="{{route('digitalproducts.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['digitalproducts.index', 'digitalproducts.create', 'digitalproducts.edit']) }}">
                            <span class="aiz-side-nav-text">{{ translate('Digital Products') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('product_bulk_upload.index') }}" class="aiz-side-nav-link" >
                            <span class="aiz-side-nav-text">{{ translate('Bulk Import') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('product_bulk_export.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Bulk Export')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('categories.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['categories.index', 'categories.create', 'categories.edit'])}}">
                            <span class="aiz-side-nav-text">{{translate('Category')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('brands.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['brands.index', 'brands.create', 'brands.edit'])}}" >
                            <span class="aiz-side-nav-text">{{translate('Brand')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('attributes.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])}}">
                            <span class="aiz-side-nav-text">{{translate('Attribute')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('colors')}}" class="aiz-side-nav-link {{ areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])}}">
                            <span class="aiz-side-nav-text">{{translate('Colors')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('reviews.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Product Reviews')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <!-- Sale -->
        <li class="aiz-side-nav-item">
            <a href="#" class="aiz-side-nav-link">
                <i class="las la-money-bill aiz-side-nav-icon"></i>
                <span class="aiz-side-nav-text">{{translate('Sales')}}</span>
                <span class="aiz-side-nav-arrow"></span>
            </a>
            <!--Submenu-->
            <ul class="aiz-side-nav-list level-2">
                @if(Auth::user()->user_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('all_orders.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['all_orders.index', 'all_orders.show'])}}">
                            <span class="aiz-side-nav-text">{{translate('All Orders')}}</span>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->user_type == 'admin' || in_array('4', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('inhouse_orders.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['inhouse_orders.index', 'inhouse_orders.show'])}}" >
                            <span class="aiz-side-nav-text">{{translate('Inhouse orders')}}</span>
                        </a>
                    </li>
                @endif
                @if(Auth::user()->user_type == 'admin' || in_array('5', json_decode(Auth::user()->staff->role->permissions)))
                  <li class="aiz-side-nav-item">
                    <a href="{{ route('seller_orders.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['seller_orders.index', 'seller_orders.show'])}}">
                        <span class="aiz-side-nav-text">{{translate('Seller Orders')}}</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->user_type == 'admin' || in_array('6', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('pick_up_point.order_index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['pick_up_point.order_index','pick_up_point.order_show'])}}">
                            <span class="aiz-side-nav-text">{{translate('Pick-up Point Order')}}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>

        <!-- Deliver Boy Addon-->
        @if (\App\Addon::where('unique_identifier', 'delivery_boy')->first() != null && \App\Addon::where('unique_identifier', 'delivery_boy')->first()->activated)
            @if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-truck aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('Delivery Boy')}}</span>
                    @if (env("DEMO_MODE") == "On")
                    <span class="badge badge-inline badge-danger">Addon</span>
                    @endif
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{route('delivery-boys.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['delivery-boys.index'])}}">
                            <span class="aiz-side-nav-text">{{translate('All Delivery Boy')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('delivery-boys.create')}}" class="aiz-side-nav-link {{ areActiveRoutes(['delivery-boys.create'])}}">
                            <span class="aiz-side-nav-text">{{translate('Add Delivery Boy')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('delivery-boy.cancel-request')}}" class="aiz-side-nav-link {{ areActiveRoutes(['delivery-boy.cancel-request'])}}">
                            <span class="aiz-side-nav-text">{{translate('Cancel Request')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('delivery-boy-configuration')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Configuration')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        @endif

        <!-- Refund addon -->
        @if (\App\Addon::where('unique_identifier', 'refund_request')->first() != null && \App\Addon::where('unique_identifier', 'refund_request')->first()->activated)
            @if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
              <li class="aiz-side-nav-item">
                  <a href="#" class="aiz-side-nav-link">
                      <i class="las la-backward aiz-side-nav-icon"></i>
                      <span class="aiz-side-nav-text">{{ translate('Refunds') }}</span>
                      @if (env("DEMO_MODE") == "On")
                        <span class="badge badge-inline badge-danger">Addon</span>
                        @endif
                      <span class="aiz-side-nav-arrow"></span>
                  </a>
                  <ul class="aiz-side-nav-list level-2">
                      <li class="aiz-side-nav-item">
                          <a href="{{route('refund_requests_all')}}" class="aiz-side-nav-link {{ areActiveRoutes(['refund_requests_all', 'reason_show'])}}">
                              <span class="aiz-side-nav-text">{{translate('Refund Requests')}}</span>
                          </a>
                      </li>
                      <li class="aiz-side-nav-item">
                          <a href="{{route('paid_refund')}}" class="aiz-side-nav-link">
                              <span class="aiz-side-nav-text">{{translate('Approved Refunds')}}</span>
                          </a>
                      </li>
                      <li class="aiz-side-nav-item">
                          <a href="{{route('rejected_refund')}}" class="aiz-side-nav-link">
                              <span class="aiz-side-nav-text">{{translate('rejected Refunds')}}</span>
                          </a>
                      </li>
                      <li class="aiz-side-nav-item">
                          <a href="{{route('refund_time_config')}}" class="aiz-side-nav-link">
                              <span class="aiz-side-nav-text">{{translate('Refund Configuration')}}</span>
                          </a>
                      </li>
                  </ul>
              </li>
            @endif
        @endif


        <!-- Customers -->
        @if(Auth::user()->user_type == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-user-friends aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Customers') }}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('customers.index') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Customer list') }}</span>
                        </a>
                    </li>
                    @if(get_setting('classified_product') == 1)
                    <li class="aiz-side-nav-item">
                        <a href="{{route('classified_products')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Classified Products')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('customer_packages.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['customer_packages.index', 'customer_packages.create', 'customer_packages.edit'])}}">
                            <span class="aiz-side-nav-text">{{ translate('Classified Packages') }}</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- Sellers -->
        @if((Auth::user()->user_type == 'admin' || in_array('9', json_decode(Auth::user()->staff->role->permissions))) && get_setting('vendor_system_activation') == 1)
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-user aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Sellers') }}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        @php
                            $sellers = \App\Seller::where('verification_status', 0)->where('verification_info', '!=', null)->count();
                        @endphp
                        <a href="{{ route('sellers.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['sellers.index', 'sellers.create', 'sellers.edit', 'sellers.payment_history','sellers.approved','sellers.profile_modal','sellers.show_verification_request'])}}">
                            <span class="aiz-side-nav-text">{{ translate('All Seller') }}</span>
                            @if($sellers > 0)<span class="badge badge-info">{{ $sellers }}</span> @endif
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('sellers.payment_histories') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Payouts') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('withdraw_requests_all') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Payout Requests') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('business_settings.vendor_commission') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Seller Commission') }}</span>
                        </a>
                    </li>

                    @if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('seller_packages.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['seller_packages.index', 'seller_packages.create', 'seller_packages.edit'])}}">
                                <span class="aiz-side-nav-text">{{ translate('Seller Packages') }}</span>
                              @if (env("DEMO_MODE") == "On")
                                <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                            </a>
                        </li>
                    @endif
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('seller_verification_form.index') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Seller Verification Form') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->user_type == 'admin' || in_array('22', json_decode(Auth::user()->staff->role->permissions)))
        <li class="aiz-side-nav-item">
            <a href="{{ route('uploaded-files.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['uploaded-files.create'])}}">
                <i class="las la-folder-open aiz-side-nav-icon"></i>
                <span class="aiz-side-nav-text">{{ translate('Uploaded Files') }}</span>
            </a>
        </li>
        @endif
        <!-- Reports -->
        @if(Auth::user()->user_type == 'admin' || in_array('10', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-file-alt aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Reports') }}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('in_house_sale_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['in_house_sale_report.index'])}}">
                            <span class="aiz-side-nav-text">{{ translate('In House Product Sale') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('seller_sale_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['seller_sale_report.index'])}}">
                            <span class="aiz-side-nav-text">{{ translate('Seller Products Sale') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('stock_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['stock_report.index'])}}">
                            <span class="aiz-side-nav-text">{{ translate('Products Stock') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('wish_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wish_report.index'])}}">
                            <span class="aiz-side-nav-text">{{ translate('Products wishlist') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('user_search_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['user_search_report.index'])}}">
                            <span class="aiz-side-nav-text">{{ translate('User Searches') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('commission-log.index') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Commission History') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('wallet-history.index') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Wallet Recharge History') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->user_type == 'admin' || in_array('23', json_decode(Auth::user()->staff->role->permissions)))
        <!--Blog System-->
        <li class="aiz-side-nav-item">
            <a href="#" class="aiz-side-nav-link">
                <i class="las la-bullhorn aiz-side-nav-icon"></i>
                <span class="aiz-side-nav-text">{{ translate('Blog System') }}</span>
                <span class="aiz-side-nav-arrow"></span>
            </a>
            <ul class="aiz-side-nav-list level-2">
                <li class="aiz-side-nav-item">
                    <a href="{{ route('blog.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['blog.create', 'blog.edit'])}}">
                        <span class="aiz-side-nav-text">{{ translate('All Posts') }}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('blog-category.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['blog-category.create', 'blog-category.edit'])}}">
                        <span class="aiz-side-nav-text">{{ translate('Categories') }}</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        <!-- marketing -->
        @if(Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-bullhorn aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Marketing') }}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('flash_deals.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['flash_deals.index', 'flash_deals.create', 'flash_deals.edit'])}}">
                                <span class="aiz-side-nav-text">{{ translate('Flash deals') }}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="aiz-side-nav-item">
                            <a href="{{route('newsletters.index')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{ translate('Newsletters') }}</span>
                            </a>
                        </li>
                        @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                            <li class="aiz-side-nav-item">
                                <a href="{{route('sms.index')}}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Bulk SMS') }}</span>
                                    @if (env("DEMO_MODE") == "On")
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                    @endif
                                </a>
                            </li>
                        @endif
                    @endif
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('subscribers.index') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Subscribers') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('coupon.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['coupon.index','coupon.create','coupon.edit'])}}">
                            <span class="aiz-side-nav-text">{{ translate('Coupon') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <!-- Support -->
        @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
          <li class="aiz-side-nav-item">
              <a href="#" class="aiz-side-nav-link">
                  <i class="las la-link aiz-side-nav-icon"></i>
                  <span class="aiz-side-nav-text">{{translate('Support')}}</span>
                  <span class="aiz-side-nav-arrow"></span>
              </a>
              <ul class="aiz-side-nav-list level-2">
                  @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                      @php
                          $support_ticket = DB::table('tickets')
                                      ->where('viewed', 0)
                                      ->select('id')
                                      ->count();
                      @endphp
                      <li class="aiz-side-nav-item">
                          <a href="{{ route('support_ticket.admin_index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['support_ticket.admin_index', 'support_ticket.admin_show'])}}">
                              <span class="aiz-side-nav-text">{{translate('Ticket')}}</span>
                              @if($support_ticket > 0)<span class="badge badge-info">{{ $support_ticket }}</span>@endif
                          </a>
                      </li>
                  @endif

                  @php
                      $conversation = \App\Conversation::where('receiver_id', Auth::user()->id)->where('receiver_viewed', '1')->get();
                  @endphp
                  @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                      <li class="aiz-side-nav-item">
                          <a href="{{ route('conversations.admin_index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['conversations.admin_index', 'conversations.admin_show'])}}">
                              <span class="aiz-side-nav-text">{{translate('Product Queries')}}</span>
                              @if (count($conversation) > 0)
                                  <span class="badge badge-info">{{ count($conversation) }}</span>
                              @endif
                          </a>
                      </li>
                  @endif
              </ul>
          </li>
        @endif

        <!-- Affiliate Addon -->
        @if (\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated)
            @if(Auth::user()->user_type == 'admin' || in_array('15', json_decode(Auth::user()->staff->role->permissions)))
              <li class="aiz-side-nav-item">
                  <a href="#" class="aiz-side-nav-link">
                      <i class="las la-link aiz-side-nav-icon"></i>
                      <span class="aiz-side-nav-text">{{translate('Affiliate System')}}</span>
                        @if (env("DEMO_MODE") == "On")
                        <span class="badge badge-inline badge-danger">Addon</span>
                        @endif
                      <span class="aiz-side-nav-arrow"></span>
                  </a>
                  <ul class="aiz-side-nav-list level-2">
                      <li class="aiz-side-nav-item">
                          <a href="{{route('affiliate.configs')}}" class="aiz-side-nav-link">
                              <span class="aiz-side-nav-text">{{translate('Affiliate Registration Form')}}</span>
                          </a>
                      </li>
                      <li class="aiz-side-nav-item">
                          <a href="{{route('affiliate.index')}}" class="aiz-side-nav-link">
                              <span class="aiz-side-nav-text">{{translate('Affiliate Configurations')}}</span>
                          </a>
                      </li>
                      <li class="aiz-side-nav-item">
                          <a href="{{route('affiliate.users')}}" class="aiz-side-nav-link {{ areActiveRoutes(['affiliate.users', 'affiliate_users.show_verification_request', 'affiliate_user.payment_history'])}}">
                              <span class="aiz-side-nav-text">{{translate('Affiliate Users')}}</span>
                          </a>
                      </li>
                      <li class="aiz-side-nav-item">
                          <a href="{{route('refferals.users')}}" class="aiz-side-nav-link">
                              <span class="aiz-side-nav-text">{{translate('Referral Users')}}</span>
                          </a>
                      </li>
                      <li class="aiz-side-nav-item">
                          <a href="{{route('affiliate.withdraw_requests')}}" class="aiz-side-nav-link">
                              <span class="aiz-side-nav-text">{{translate('Affiliate Withdraw Requests')}}</span>
                          </a>
                      </li>
                      <li class="aiz-side-nav-item">
                          <a href="{{route('affiliate.logs.admin')}}" class="aiz-side-nav-link">
                              <span class="aiz-side-nav-text">{{translate('Affiliate Logs')}}</span>
                          </a>
                      </li>
                  </ul>
              </li>
            @endif
        @endif

        <!-- Offline Payment Addon-->
        @if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated)
            @if(Auth::user()->user_type == 'admin' || in_array('16', json_decode(Auth::user()->staff->role->permissions)))
              <li class="aiz-side-nav-item">
                  <a href="#" class="aiz-side-nav-link">
                      <i class="las la-money-check-alt aiz-side-nav-icon"></i>
                      <span class="aiz-side-nav-text">{{translate('Offline Payment System')}}</span>
                        @if (env("DEMO_MODE") == "On")
                        <span class="badge badge-inline badge-danger">Addon</span>
                        @endif
                      <span class="aiz-side-nav-arrow"></span>
                  </a>
                  <ul class="aiz-side-nav-list level-2">
                      <li class="aiz-side-nav-item">
                          <a href="{{ route('manual_payment_methods.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['manual_payment_methods.index', 'manual_payment_methods.create', 'manual_payment_methods.edit'])}}">
                              <span class="aiz-side-nav-text">{{translate('Manual Payment Methods')}}</span>
                          </a>
                      </li>
                      <li class="aiz-side-nav-item">
                          <a href="{{ route('offline_wallet_recharge_request.index') }}" class="aiz-side-nav-link">
                              <span class="aiz-side-nav-text">{{translate('Offline Wallet Recharge')}}</span>
                          </a>
                      </li>
                      @if(get_setting('classified_product') == 1)
                          <li class="aiz-side-nav-item">
                              <a href="{{ route('offline_customer_package_payment_request.index') }}" class="aiz-side-nav-link">
                                  <span class="aiz-side-nav-text">{{translate('Offline Customer Package Payments')}}</span>
                              </a>
                          </li>
                      @endif
                      @if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                          <li class="aiz-side-nav-item">
                              <a href="{{ route('offline_seller_package_payment_request.index') }}" class="aiz-side-nav-link">
                                  <span class="aiz-side-nav-text">{{translate('Offline Seller Package Payments')}}</span>
                                    @if (env("DEMO_MODE") == "On")
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                    @endif
                              </a>
                          </li>
                      @endif
                  </ul>
              </li>
            @endif
        @endif

        <!-- Paytm Addon -->
        @if (\App\Addon::where('unique_identifier', 'paytm')->first() != null && \App\Addon::where('unique_identifier', 'paytm')->first()->activated)
            @if(Auth::user()->user_type == 'admin' || in_array('17', json_decode(Auth::user()->staff->role->permissions)))
              <li class="aiz-side-nav-item">
                  <a href="#" class="aiz-side-nav-link">
                      <i class="las la-mobile-alt aiz-side-nav-icon"></i>
                      <span class="aiz-side-nav-text">{{translate('Paytm Payment Gateway')}}</span>
                        @if (env("DEMO_MODE") == "On")
                        <span class="badge badge-inline badge-danger">Addon</span>
                        @endif
                      <span class="aiz-side-nav-arrow"></span>
                  </a>
                  <ul class="aiz-side-nav-list level-2">
                      <li class="aiz-side-nav-item">
                          <a href="{{ route('paytm.index') }}" class="aiz-side-nav-link">
                              <span class="aiz-side-nav-text">{{translate('Set Paytm Credentials')}}</span>
                          </a>
                      </li>
                  </ul>
              </li>
            @endif
        @endif

        <!-- Club Point Addon-->
        @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
          @if(Auth::user()->user_type == 'admin' || in_array('18', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="lab la-btc aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('Club Point System')}}</span>
                    @if (env("DEMO_MODE") == "On")
                    <span class="badge badge-inline badge-danger">Addon</span>
                    @endif
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('club_points.configs') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Club Point Configurations')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('set_product_points')}}" class="aiz-side-nav-link {{ areActiveRoutes(['set_product_points', 'product_club_point.edit'])}}">
                            <span class="aiz-side-nav-text">{{translate('Set Product Point')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('club_points.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['club_points.index', 'club_point.details'])}}">
                            <span class="aiz-side-nav-text">{{translate('User Points')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
          @endif
        @endif

        <!--OTP addon -->
        @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
          @if(Auth::user()->user_type == 'admin' || in_array('19', json_decode(Auth::user()->staff->role->permissions)))
              <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-phone aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('OTP System')}}</span>
                    @if (env("DEMO_MODE") == "On")
                    <span class="badge badge-inline badge-danger">Addon</span>
                    @endif
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('otp.configconfiguration') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('OTP Configurations')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('sms-templates.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('SMS Templates')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('otp_credentials.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Set OTP Credentials')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
          @endif
        @endif

        @if(\App\Addon::where('unique_identifier', 'african_pg')->first() != null && \App\Addon::where('unique_identifier', 'african_pg')->first()->activated)
          @if(Auth::user()->user_type == 'admin' || in_array('19', json_decode(Auth::user()->staff->role->permissions)))
              <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-phone aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('African Payment Gateway Addon')}}</span>
                    @if (env("DEMO_MODE") == "On")
                    <span class="badge badge-inline badge-danger">Addon</span>
                    @endif
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('african.configuration') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('African PG Configurations')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('african_credentials.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Set African PG Credentials')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
          @endif
        @endif

        <!-- Website Setup -->
        @if(Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions)))
          <li class="aiz-side-nav-item">
            <a href="#" class="aiz-side-nav-link">
                <i class="las la-desktop aiz-side-nav-icon"></i>
                <span class="aiz-side-nav-text">{{translate('Website Setup')}}</span>
                <span class="aiz-side-nav-arrow"></span>
            </a>
            <ul class="aiz-side-nav-list level-2">
                <li class="aiz-side-nav-item">
                    <a href="{{ route('website.header') }}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Header')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('website.footer') }}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Footer')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('website.pages') }}" class="aiz-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])}}">
                        <span class="aiz-side-nav-text">{{translate('Pages')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('website.appearance') }}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Appearance')}}</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        <!-- Setup & Configurations -->
        @if(Auth::user()->user_type == 'admin' || in_array('14', json_decode(Auth::user()->staff->role->permissions)))
          <li class="aiz-side-nav-item">
            <a href="#" class="aiz-side-nav-link">
                <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                <span class="aiz-side-nav-text">{{translate('Setup & Configurations')}}</span>
                <span class="aiz-side-nav-arrow"></span>
            </a>
            <ul class="aiz-side-nav-list level-2">
                <li class="aiz-side-nav-item">
                    <a href="{{route('general_setting.index')}}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('General Settings')}}</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="{{route('activation.index')}}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Features activation')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{route('languages.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['languages.index', 'languages.create', 'languages.store', 'languages.show', 'languages.edit'])}}">
                        <span class="aiz-side-nav-text">{{translate('Languages')}}</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="{{route('currency.index')}}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Currency')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{route('tax.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['tax.index', 'tax.create', 'tax.store', 'tax.show', 'tax.edit'])}}">
                        <span class="aiz-side-nav-text">{{translate('Vat & TAX')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{route('pick_up_points.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['pick_up_points.index','pick_up_points.create','pick_up_points.edit'])}}">
                        <span class="aiz-side-nav-text">{{translate('Pickup point')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('smtp_settings.index') }}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('SMTP Settings')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('payment_method.index') }}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Payment Methods')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('file_system.index') }}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('File System Configuration')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('social_login.index') }}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Social media Logins')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('google_analytics.index') }}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Analytics Tools')}}</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Facebook')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-3">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('facebook_chat.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Facebook Chat')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('facebook-comment') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Facebook Comment')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="{{ route('google_recaptcha.index') }}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Google reCAPTCHA')}}</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Shipping')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-3">
                        <li class="aiz-side-nav-item">
                            <a href="{{route('shipping_configuration.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['shipping_configuration.index','shipping_configuration.edit','shipping_configuration.update'])}}">
                                <span class="aiz-side-nav-text">{{translate('Shipping Configuration')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('countries.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['countries.index','countries.edit','countries.update'])}}">
                                <span class="aiz-side-nav-text">{{translate('Shipping Countries')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('cities.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['cities.index','cities.edit','cities.update'])}}">
                                <span class="aiz-side-nav-text">{{translate('Shipping Cities')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </li>
        @endif


        <!-- Staffs -->
        @if(Auth::user()->user_type == 'admin' || in_array('20', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-user-tie aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('Staffs')}}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('staffs.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['staffs.index', 'staffs.create', 'staffs.edit'])}}">
                            <span class="aiz-side-nav-text">{{translate('All staffs')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('roles.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['roles.index', 'roles.create', 'roles.edit'])}}">
                            <span class="aiz-side-nav-text">{{translate('Staff permissions')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->user_type == 'admin' || in_array('24', json_decode(Auth::user()->staff->role->permissions)))
        <li class="aiz-side-nav-item">
            <a href="#" class="aiz-side-nav-link">
                <i class="las la-user-tie aiz-side-nav-icon"></i>
                <span class="aiz-side-nav-text">{{translate('System')}}</span>
                <span class="aiz-side-nav-arrow"></span>
            </a>
            <ul class="aiz-side-nav-list level-2">
                <li class="aiz-side-nav-item">
                    <a href="{{ route('system_update') }}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Update')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{route('system_server')}}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Server status')}}</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        <!-- Addon Manager -->
        @if(Auth::user()->user_type == 'admin' || in_array('21', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="{{route('addons.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['addons.index', 'addons.create'])}}">
                    <i class="las la-wrench aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('Addon Manager')}}</span>
                </a>
            </li>
        @endif
     
      {{-- Foreach menu item ends --}}
    </ul>
  </div>
</div>
<!-- END: Main Menu-->
