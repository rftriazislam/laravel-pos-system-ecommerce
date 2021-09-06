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
                  <i data-feather="home"></i>
                  <span>{{translate('Dashboard')}}</span>
              </a>
          </li>

        <!-- POS Addon-->
        @if (\App\Addon::where('unique_identifier', 'pos_system')->first() != null && \App\Addon::where('unique_identifier', 'pos_system')->first()->activated)
          @if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
            <li class="nav-item">
              <a href="javascript:void(0)" class="d-flex align-items-center">
                  <i data-feather="slack"></i>
                  <span class="menu-title text-truncate">{{translate('POS System')}}</span>
              </a>
              <ul class="menu-content">
                  <li class="{{ 'poin-of-sales.index' === Route::currentRouteName() ? 'active' : '' }}">
                      <a href="{{route('poin-of-sales.index')}}" class="d-flex align-items-center">
                          <span class="menu-title text-truncate">{{translate('POS Manager')}}</span>
                      </a>
                  </li>
                  <li class="{{ 'poin-of-sales.activation' === Route::currentRouteName() ? 'active' : '' }}">
                      <a href="{{route('poin-of-sales.activation')}}" class="d-flex align-items-center">
                          <span class="menu-title text-truncate">{{translate('POS Configuration')}}</span>
                      </a>
                  </li>
              </ul>
          </li>
          @endif
        @endif

        <!-- Product -->
        @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
            <li class="nav-item">
                <a href="javascript:void(0)" class="d-flex align-items-center">
                    <i data-feather='slack'></i>
                    <span class="menu-title text-truncate">{{translate('Products')}}</span>
                </a>
                <!--Submenu-->
                <ul class="menu-content">
                    <li class="{{ 'products.create' === Route::currentRouteName() ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{route('products.create')}}">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Add New product')}}</span>
                        </a>
                    </li>
                    <li class="{{ 'products.all' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('products.all')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('All Products') }}</span>
                        </a>
                    </li>
                    <li class="{{ 'products.admin' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('products.admin')}}" class="d-flex align-items-center" >
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('In House Products') }}</span>
                        </a>
                    </li>
                    {{-- @if(get_setting('vendor_system_activation') == 1)
                        <li class="{{ 'products.seller' === Route::currentRouteName() ? 'active' : '' }}">
                            <a href="{{route('products.seller')}}" class="d-flex align-items-center">
                                <i data-feather="circle"></i>
                                <span class="menu-title text-truncate">{{ translate('Seller Products') }}</span>
                            </a>
                        </li>
                    @endif --}}
                    {{-- <li class="{{ 'digitalproducts.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('digitalproducts.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Digital Products') }}</span>
                        </a>
                    </li> --}}
                    {{-- <li class="{{ 'product_bulk_upload.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('product_bulk_upload.index') }}" class="d-flex align-items-center" >
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Bulk Import') }}</span>
                        </a>
                    </li> --}}
                    {{-- <li class="{{ 'product_bulk_export.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('product_bulk_export.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Bulk Export')}}</span>
                        </a>
                    </li> --}}
                    <li class="{{ 'categories.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('categories.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Category')}}</span>
                        </a>
                    </li>
                    <li class="{{ 'brands.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('brands.index')}}" class="d-flex align-items-center" >
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Brand')}}</span>
                        </a>
                    </li>
                    <li class="{{ 'attributes.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('attributes.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Attribute')}}</span>
                        </a>
                    </li>
                    {{-- <li class="{{ 'colors' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('colors')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Colors')}}</span>
                        </a>
                    </li> --}}
                    {{-- <li class="{{ 'reviews.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('reviews.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Product Reviews')}}</span>
                        </a>
                    </li> --}}
                </ul>
            </li>
        @endif

        <!-- Sale -->
        <li class="nav-item">
            <a href="javascript:void(0)" class="d-flex align-items-center">
                <i data-feather='slack'></i>
                <span class="menu-title text-truncate">{{translate('Sales')}}</span>
            </a>
            <!--Submenu-->
            <ul class="menu-content">
                @if(Auth::user()->user_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="{{ 'all_orders.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('all_orders.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('All Orders')}}</span>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->user_type == 'admin' || in_array('4', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="{{ 'inhouse_orders.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('inhouse_orders.index') }}" class="d-flex align-items-center" >
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Inhouse orders')}}</span>
                        </a>
                    </li>
                @endif
                @if(Auth::user()->user_type == 'admin' || in_array('5', json_decode(Auth::user()->staff->role->permissions)))
                  <li class="{{ 'seller_orders.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('seller_orders.index') }}" class="d-flex align-items-center">
                        <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('User\'s Orders')}}</span>
                    </a>
                </li>
                @endif
                {{-- @if(Auth::user()->user_type == 'admin' || in_array('6', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="{{ 'pick_up_point.order_index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('pick_up_point.order_index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Pick-up Point Order')}}</span>
                        </a>
                    </li>
                @endif --}}
            </ul>
        </li>

        <!-- Deliver Boy Addon-->
        @if (\App\Addon::where('unique_identifier', 'delivery_boy')->first() != null && \App\Addon::where('unique_identifier', 'delivery_boy')->first()->activated)
            @if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
            <li class="nav-item">
                <a href="javascript:void(0)" class="d-flex align-items-center">
                    {{-- <i class="las la-truck aiz-side-nav-icon"></i> --}}
                    <i data-feather='slack'></i>
                    <span class="menu-title text-truncate">{{translate('Delivery Boy')}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ 'delivery-boys.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('delivery-boys.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('All Delivery Boy')}}</span>
                        </a>
                    </li>
                    <li class="{{ 'delivery-boys.create' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('delivery-boys.create')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Add Delivery Boy')}}</span>
                        </a>
                    </li>
                    <li class="{{ 'delivery-boy.cancel-request' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('delivery-boy.cancel-request')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Cancel Request')}}</span>
                        </a>
                    </li>
                    <li class="{{ 'delivery-boy-configuration' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('delivery-boy-configuration')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Configuration')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        @endif

        <!-- Refund addon -->
        @if (\App\Addon::where('unique_identifier', 'refund_request')->first() != null && \App\Addon::where('unique_identifier', 'refund_request')->first()->activated)
            @if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
              <li class="nav-item">
                  <a href="javascript:void(0)" class="d-flex align-items-center">
                      {{-- <i class="las la-backward aiz-side-nav-icon"></i> --}}
                    <i data-feather='slack'></i>
                      <span class="menu-title text-truncate">{{ translate('Refunds') }}</span>
                  </a>
                  <ul class="menu-content">
                      <li class="{{ 'refund_requests_all' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{route('refund_requests_all')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Refund Requests')}}</span>
                          </a>
                      </li>
                      <li class="{{ 'paid_refund' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{route('paid_refund')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Approved Refunds')}}</span>
                          </a>
                      </li>
                      <li class="{{ 'rejected_refund' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{route('rejected_refund')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('rejected Refunds')}}</span>
                          </a>
                      </li>
                      <li class="{{ 'refund_time_config' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{route('refund_time_config')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Refund Configuration')}}</span>
                          </a>
                      </li>
                  </ul>
              </li>
            @endif
        @endif


        <!-- Customers -->
        @if(Auth::user()->user_type == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions)))
            <li class="nav-item">
                <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
                    <i data-feather='slack'></i>
                    <span class="menu-title text-truncate">{{ translate('Customers') }}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ 'customers.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('customers.index') }}" class="d-flex align-items-center" target="_self">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate">{{ translate('Customer list') }}</span>
                        </a>
                    </li>
                    @if(get_setting('classified_product') == 1)
                        <li class="{{ 'classified_products' === Route::currentRouteName() ? 'active' : '' }}">
                            <a href="{{route('classified_products')}}" class="d-flex align-items-center" target="_self">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate">{{translate('Classified Products')}}</span>
                            </a>
                        </li>
                        <li class="{{ 'customer_packages.index' === Route::currentRouteName() ? 'active' : '' }}">
                            <a href="{{ route('customer_packages.index') }}" class="d-flex align-items-center" target="_self">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate">{{ translate('Classified Packages') }}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- Sellers -->
        {{-- @if((Auth::user()->user_type == 'admin' || in_array('9', json_decode(Auth::user()->staff->role->permissions))) && (get_setting('vendor_system_activation') == 1))
            <li class="nav-item">
                <a href="javascript:void(0)" class="d-flex align-items-center">
                    <i class="las la-user aiz-side-nav-icon"></i>
                    <i data-feather='slack'></i>
                    <span class="menu-title text-truncate">{{ translate('Sellers') }}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ 'sellers.index' === Route::currentRouteName() ? 'active' : '' }}">
                        @php
                            $sellers = \App\Seller::where('verification_status', 0)->where('verification_info', '!=', null)->count();
                        @endphp
                        <a href="{{ route('sellers.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('All Seller') }}</span>
                            @if($sellers > 0)<span class="badge badge-info">{{ $sellers }}</span> @endif
                        </a>
                    </li>
                    <li class="{{ 'sellers.payment_histories' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('sellers.payment_histories') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Payouts') }}</span>
                        </a>
                    </li>
                    <li class="{{ 'withdraw_requests_all' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('withdraw_requests_all') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Payout Requests') }}</span>
                        </a>
                    </li>
                    <li class="{{ 'business_settings.vendor_commission' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('business_settings.vendor_commission') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Seller Commission') }}</span>
                        </a>
                    </li>

                    @if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                        <li class="{{ 'seller_packages.index' === Route::currentRouteName() ? 'active' : '' }}">
                            <a href="{{ route('seller_packages.index') }}" class="d-flex align-items-center">
                                <i data-feather="circle"></i>
                                <span class="menu-title text-truncate">{{ translate('Seller Packages') }}</span>
                              @if (env("DEMO_MODE") == "On")
                                <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                            </a>
                        </li>
                    @endif
                    <li class="{{ 'seller_verification_form.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('seller_verification_form.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Seller Verification Form') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif --}}

        @if(Auth::user()->user_type == 'admin' || in_array('22', json_decode(Auth::user()->staff->role->permissions)))
        <li class="nav-item">
            <a href="{{ route('uploaded-files.index') }}" class="d-flex align-items-center">
                    <i data-feather='slack'></i>
                <span class="menu-title text-truncate">{{ translate('Uploaded Files') }}</span>
            </a>
        </li>
        @endif
        <!-- Reports -->
        {{-- @if(Auth::user()->user_type == 'admin' || in_array('10', json_decode(Auth::user()->staff->role->permissions)))
            <li class="nav-item">
                <a href="javascript:void(0)" class="d-flex align-items-center">
                    <i class="las la-file-alt aiz-side-nav-icon"></i>
                    <i data-feather='slack'></i>
                    <span class="menu-title text-truncate">{{ translate('Reports') }}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ 'in_house_sale_report.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('in_house_sale_report.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('In House Product Sale') }}</span>
                        </a>
                    </li>
                    <li class="{{ 'seller_sale_report.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('seller_sale_report.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Seller Products Sale') }}</span>
                        </a>
                    </li>
                    <li class="{{ 'stock_report.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('stock_report.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Products Stock') }}</span>
                        </a>
                    </li>
                    <li class="{{ 'wish_report.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('wish_report.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Products wishlist') }}</span>
                        </a>
                    </li>
                    <li class="{{ 'user_search_report.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('user_search_report.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('User Searches') }}</span>
                        </a>
                    </li>
                    <li class="{{ 'commission-log.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('commission-log.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Commission History') }}</span>
                        </a>
                    </li>
                    <li class="{{ 'wallet-history.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('wallet-history.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Wallet Recharge History') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif --}}
       {{--  @if(Auth::user()->user_type == 'admin' || in_array('23', json_decode(Auth::user()->staff->role->permissions)))
        <li class="nav-item">
            <a href="javascript:void(0)" class="d-flex align-items-center">
                <i class="las la-bullhorn aiz-side-nav-icon"></i>
                    <i data-feather='slack'></i>
                <span class="menu-title text-truncate">{{ translate('Blog System') }}</span>
            </a>
            <ul class="menu-content">
                <li class="{{ 'blog.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('blog.index') }}" class="d-flex align-items-center">
                        <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{ translate('All Posts') }}</span>
                    </a>
                </li>
                <li class="{{ 'blog-category.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('blog-category.index') }}" class="d-flex align-items-center">
                        <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{ translate('Categories') }}</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif --}}

        <!-- marketing -->
        {{-- @if(Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions)))
            <li class="nav-item">
                <a href="javascript:void(0)" class="d-flex align-items-center">
                    <i data-feather='slack'></i>
                    <span class="menu-title text-truncate">{{ translate('Marketing') }}</span>
                </a>
                <ul class="menu-content">
                    @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ 'flash_deals.index' === Route::currentRouteName() ? 'active' : '' }}">
                            <a href="{{ route('flash_deals.index') }}" class="d-flex align-items-center">
                                <i data-feather="circle"></i>
                                <span class="menu-title text-truncate">{{ translate('Flash deals') }}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ 'newsletters.index' === Route::currentRouteName() ? 'active' : '' }}">
                            <a href="{{route('newsletters.index')}}" class="d-flex align-items-center">
                                <i data-feather="circle"></i>
                                <span class="menu-title text-truncate">{{ translate('Newsletters') }}</span>
                            </a>
                        </li>
                        @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                            <li class="{{ 'sms.index' === Route::currentRouteName() ? 'active' : '' }}">
                                <a href="{{route('sms.index')}}" class="d-flex align-items-center">
                                    <span class="menu-title text-truncate">{{ translate('Bulk SMS') }}</span>
                                    @if (env("DEMO_MODE") == "On")
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                    @endif
                                </a>
                            </li>
                        @endif
                    @endif
                    <li class="{{ 'subscribers.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('subscribers.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Subscribers') }}</span>
                        </a>
                    </li>
                    <li class="{{ 'coupon.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('coupon.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Coupon') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif --}}

        <!-- Inventory -->
        @if(Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions)))
            <li class="nav-item">
                <a href="javascript:void(0)" class="d-flex align-items-center">
                    <i data-feather='slack'></i>
                    <span class="menu-title text-truncate">{{ translate('Inventory') }}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ 'dropdown_item.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('dropdown_item.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Dropdown Item') }}</span>
                        </a>
                    </li>
                    <li class="{{ 'raw_materials_type.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('raw_materials_type.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Raw Materials Type') }}</span>
                        </a>
                    </li>
                    <li class="{{ 'raw_materials.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('raw_materials.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{ translate('Raw Materials') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <!-- Support -->
        {{-- @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
          <li class="nav-item">
              <a href="javascript:void(0)" class="d-flex align-items-center">
                    <i data-feather='slack'></i>
                  <span class="menu-title text-truncate">{{translate('Support')}}</span>
              </a>
              <ul class="menu-content">
                  @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                      @php
                          $support_ticket = DB::table('tickets')
                                      ->where('viewed', 0)
                                      ->select('id')
                                      ->count();
                      @endphp
                      <li class="{{ 'support_ticket.admin_index' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{ route('support_ticket.admin_index') }}" class="d-flex align-items-center">
                                <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Ticket')}}</span>
                              @if($support_ticket > 0)<span class="badge badge-info">{{ $support_ticket }}</span>@endif
                          </a>
                      </li>
                  @endif

                  @php
                      $conversation = \App\Conversation::where('receiver_id', Auth::user()->id)->where('receiver_viewed', '1')->get();
                  @endphp
                  @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                      <li class="{{ 'conversations.admin_index' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{ route('conversations.admin_index') }}" class="d-flex align-items-center">
                                <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Product Queries')}}</span>
                              @if (count($conversation) > 0)
                                  <span class="badge badge-info">{{ count($conversation) }}</span>
                              @endif
                          </a>
                      </li>
                  @endif
              </ul>
          </li>
        @endif --}}

        <!-- Affiliate Addon -->
        @if (\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated)
            @if(Auth::user()->user_type == 'admin' || in_array('15', json_decode(Auth::user()->staff->role->permissions)))
              <li class="nav-item">
                  <a href="javascript:void(0)" class="d-flex align-items-center">
                    <i data-feather='slack'></i>
                      <span class="menu-title text-truncate">{{translate('Affiliate System')}}</span>
                  </a>
                  <ul class="menu-content">
                      <li class="{{ 'affiliate.configs' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{route('affiliate.configs')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Affiliate Registration Form')}}</span>
                          </a>
                      </li>
                      <li class="{{ 'affiliate.index' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{route('affiliate.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Affiliate Configurations')}}</span>
                          </a>
                      </li>
                      <li class="{{ 'affiliate.users' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{route('affiliate.users')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Affiliate Users')}}</span>
                          </a>
                      </li>
                      <li class="{{ 'refferals.users' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{route('refferals.users')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Referral Users')}}</span>
                          </a>
                      </li>
                      <li class="{{ 'affiliate.withdraw_requests' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{route('affiliate.withdraw_requests')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Affiliate Withdraw Requests')}}</span>
                          </a>
                      </li>
                      <li class="{{ 'affiliate.logs.admin' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{route('affiliate.logs.admin')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Affiliate Logs')}}</span>
                          </a>
                      </li>
                  </ul>
              </li>
            @endif
        @endif

        <!-- Offline Payment Addon-->
        @if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated)
            @if(Auth::user()->user_type == 'admin' || in_array('16', json_decode(Auth::user()->staff->role->permissions)))
              <li class="nav-item">
                  <a href="javascript:void(0)" class="d-flex align-items-center">
                      {{-- <i class="las la-money-check-alt aiz-side-nav-icon"></i> --}}
                    <i data-feather='slack'></i>
                      <span class="menu-title text-truncate">{{translate('Offline Payment System')}}</span>
                  </a>
                  <ul class="menu-content">
                      <li class="{{ 'manual_payment_methods.index' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{ route('manual_payment_methods.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Manual Payment Methods')}}</span>
                          </a>
                      </li>
                      <li class="{{ 'offline_wallet_recharge_request.index' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{ route('offline_wallet_recharge_request.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Offline Wallet Recharge')}}</span>
                          </a>
                      </li>
                      @if(get_setting('classified_product') == 1)
                          <li class="{{ 'offline_customer_package_payment_request.index' === Route::currentRouteName() ? 'active' : '' }}">
                              <a href="{{ route('offline_customer_package_payment_request.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                                  <span class="menu-title text-truncate">{{translate('Offline Customer Package Payments')}}</span>
                              </a>
                          </li>
                      @endif
                      @if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                          <li class="{{ 'offline_seller_package_payment_request.index' === Route::currentRouteName() ? 'active' : '' }}">
                              <a href="{{ route('offline_seller_package_payment_request.index') }}" class="d-flex align-items-center">
                                  <span class="menu-title text-truncate">{{translate('Offline Seller Package Payments')}}</span>
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
              <li class="nav-item">
                  <a href="javascript:void(0)" class="d-flex align-items-center">
                      {{-- <i class="las la-mobile-alt aiz-side-nav-icon"></i> --}}
                    <i data-feather='slack'></i>
                      <span class="menu-title text-truncate">{{translate('Paytm Payment Gateway')}}</span>
                  </a>
                  <ul class="menu-content">
                      <li class="{{ 'paytm.index' === Route::currentRouteName() ? 'active' : '' }}">
                          <a href="{{ route('paytm.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                              <span class="menu-title text-truncate">{{translate('Set Paytm Credentials')}}</span>
                          </a>
                      </li>
                  </ul>
              </li>
            @endif
        @endif

        <!-- Club Point Addon-->
        @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
          @if(Auth::user()->user_type == 'admin' || in_array('18', json_decode(Auth::user()->staff->role->permissions)))
            <li class="nav-item">
                <a href="javascript:void(0)" class="d-flex align-items-center">
                    {{-- <i class="lab la-btc aiz-side-nav-icon"></i> --}}
                    <i data-feather='slack'></i>
                    <span class="menu-title text-truncate">{{translate('Club Point System')}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ 'club_points.configs' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('club_points.configs') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Club Point Configurations')}}</span>
                        </a>
                    </li>
                    <li class="{{ 'set_product_points' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('set_product_points')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Set Product Point')}}</span>
                        </a>
                    </li>
                    <li class="{{ 'club_points.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('club_points.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('User Points')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
          @endif
        @endif

        <!--OTP addon -->
        @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
          @if(Auth::user()->user_type == 'admin' || in_array('19', json_decode(Auth::user()->staff->role->permissions)))
              <li class="nav-item">
                <a href="javascript:void(0)" class="d-flex align-items-center">
                    {{-- <i class="las la-phone aiz-side-nav-icon"></i> --}}
                    <i data-feather='slack'></i>
                    <span class="menu-title text-truncate">{{translate('OTP System')}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ 'otp.configconfiguration' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('otp.configconfiguration') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('OTP Configurations')}}</span>
                        </a>
                    </li>
                    <li class="{{ 'sms-templates.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('sms-templates.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('SMS Templates')}}</span>
                        </a>
                    </li>
                    <li class="{{ 'otp_credentials.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('otp_credentials.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Set OTP Credentials')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
          @endif
        @endif

        @if(\App\Addon::where('unique_identifier', 'african_pg')->first() != null && \App\Addon::where('unique_identifier', 'african_pg')->first()->activated)
          @if(Auth::user()->user_type == 'admin' || in_array('19', json_decode(Auth::user()->staff->role->permissions)))
              <li class="nav-item">
                <a href="javascript:void(0)" class="d-flex align-items-center">
                    {{-- <i class="las la-phone aiz-side-nav-icon"></i> --}}
                    <i data-feather='slack'></i>
                    <span class="menu-title text-truncate">{{translate('African Payment Gateway Addon')}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ 'african.configuration' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('african.configuration') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('African PG Configurations')}}</span>
                        </a>
                    </li>
                    <li class="{{ 'african_credentials.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('african_credentials.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Set African PG Credentials')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
          @endif
        @endif

        <!-- Website Setup -->
        {{-- @if(Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions)))
          <li class="nav-item">
            <a href="javascript:void(0)" class="d-flex align-items-center">
                <i class="las la-desktop aiz-side-nav-icon"></i>
                    <i data-feather='slack'></i>
                <span class="menu-title text-truncate">{{translate('Website Setup')}}</span>
            </a>
            <ul class="menu-content">
                <li class="{{ 'website.header' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('website.header') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Header')}}</span>
                    </a>
                </li>
                <li class="{{ 'website.footer' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('website.footer') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Footer')}}</span>
                    </a>
                </li>
                <li class="{{ 'website.pages' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('website.pages') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Pages')}}</span>
                    </a>
                </li>
                <li class="{{ 'website.appearance' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('website.appearance') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Appearance')}}</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif --}}

        <!-- Setup & Configurations -->
        {{-- @if(Auth::user()->user_type == 'admin' || in_array('14', json_decode(Auth::user()->staff->role->permissions)))
          <li class="nav-item">
            <a href="javascript:void(0)" class="d-flex align-items-center">
                <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                    <i data-feather='slack'></i>
                <span class="menu-title text-truncate">{{translate('Setup & Configurations')}}</span>
            </a>
            <ul class="menu-content">
                <li class="{{ 'general_setting.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{route('general_setting.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('General Settings')}}</span>
                    </a>
                </li>

                <li class="{{ 'activation.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{route('activation.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Features activation')}}</span>
                    </a>
                </li>
                <li class="{{ 'languages.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{route('languages.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Languages')}}</span>
                    </a>
                </li>

                <li class="{{ 'currency.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{route('currency.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Currency')}}</span>
                    </a>
                </li>
                <li class="{{ 'tax.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{route('tax.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Vat & TAX')}}</span>
                    </a>
                </li>
                <li class="{{ 'pick_up_points.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{route('pick_up_points.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Pickup point')}}</span>
                    </a>
                </li>
                <li class="{{ 'smtp_settings.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('smtp_settings.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('SMTP Settings')}}</span>
                    </a>
                </li>
                <li class="{{ 'payment_method.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('payment_method.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Payment Methods')}}</span>
                    </a>
                </li>
                <li class="{{ 'file_system.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('file_system.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('File System Configuration')}}</span>
                    </a>
                </li>
                <li class="{{ 'social_login.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('social_login.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Social media Logins')}}</span>
                    </a>
                </li>
                <li class="{{ 'google_analytics.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('google_analytics.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Analytics Tools')}}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="javascript:void(0);" class="d-flex align-items-center">
                        <span class="menu-title text-truncate">{{translate('Facebook')}}</span>
                    </a>
                    <ul class="aiz-side-nav-list level-3">
                        <li class="{{ 'facebook_chat.index' === Route::currentRouteName() ? 'active' : '' }}">
                            <a href="{{ route('facebook_chat.index') }}" class="d-flex align-items-center">
                                <span class="menu-title text-truncate">{{translate('Facebook Chat')}}</span>
                            </a>
                        </li>
                        <li class="{{ 'facebook-comment' === Route::currentRouteName() ? 'active' : '' }}">
                            <a href="{{ route('facebook-comment') }}" class="d-flex align-items-center">
                                <span class="menu-title text-truncate">{{translate('Facebook Comment')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{ 'google_recaptcha.index' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('google_recaptcha.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Google reCAPTCHA')}}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="javascript:void(0);" class="d-flex align-items-center">
                        <span class="menu-title text-truncate">{{translate('Shipping')}}</span>
                    </a>
                    <ul class="aiz-side-nav-list level-3">
                        <li class="{{ 'shipping_configuration.index' === Route::currentRouteName() ? 'active' : '' }}">
                            <a href="{{route('shipping_configuration.index')}}" class="d-flex align-items-center">
                                <span class="menu-title text-truncate">{{translate('Shipping Configuration')}}</span>
                            </a>
                        </li>
                        <li class="{{ 'countries.index' === Route::currentRouteName() ? 'active' : '' }}">
                            <a href="{{route('countries.index')}}" class="d-flex align-items-center">
                                <span class="menu-title text-truncate">{{translate('Shipping Countries')}}</span>
                            </a>
                        </li>
                        <li class="{{ 'cities.index' === Route::currentRouteName() ? 'active' : '' }}">
                            <a href="{{route('cities.index')}}" class="d-flex align-items-center">
                                <span class="menu-title text-truncate">{{translate('Shipping Cities')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </li>
        @endif --}}


        <!-- Staffs -->
        {{-- @if(Auth::user()->user_type == 'admin' || in_array('20', json_decode(Auth::user()->staff->role->permissions)))
            <li class="nav-item">
                <a href="javascript:void(0)" class="d-flex align-items-center">
                    <i class="las la-user-tie aiz-side-nav-icon"></i>
                    <i data-feather='slack'></i>
                    <span class="menu-title text-truncate">{{translate('Staffs')}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ 'staffs.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{ route('staffs.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('All staffs')}}</span>
                        </a>
                    </li>
                    <li class="{{ 'roles.index' === Route::currentRouteName() ? 'active' : '' }}">
                        <a href="{{route('roles.index')}}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">{{translate('Staff permissions')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif --}}
        {{-- @if(Auth::user()->user_type == 'admin' || in_array('24', json_decode(Auth::user()->staff->role->permissions)))
        <li class="nav-item">
            <a href="javascript:void(0)" class="d-flex align-items-center">
                <i class="las la-user-tie aiz-side-nav-icon"></i>
                    <i data-feather='slack'></i>
                <span class="menu-title text-truncate">{{translate('System')}}</span>
            </a>
            <ul class="menu-content">
                <li class="{{ 'system_update' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{ route('system_update') }}" class="d-flex align-items-center">
                        <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Update')}}</span>
                    </a>
                </li>
                <li class="{{ 'system_server' === Route::currentRouteName() ? 'active' : '' }}">
                    <a href="{{route('system_server')}}" class="d-flex align-items-center">
                        <i data-feather="circle"></i>
                        <span class="menu-title text-truncate">{{translate('Server status')}}</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif --}}

        <!-- Addon Manager -->
        {{-- @if(Auth::user()->user_type == 'admin' || in_array('21', json_decode(Auth::user()->staff->role->permissions)))
            <li class="{{ 'addons.index' === Route::currentRouteName() ? 'active' : '' }}">
                <a href="{{route('addons.index')}}" class="d-flex align-items-center">
                    <i class="las la-wrench aiz-side-nav-icon"></i>
                    <i data-feather='slack'></i>
                    <span class="menu-title text-truncate">{{translate('Addon Manager')}}</span>
                </a>
            </li>
        @endif --}}

        <li class="nav-item">
            <a href="{{route('clear')}}" class="nav-link d-flex align-items-center" target="_blank">
                <i data-feather="trash-2"></i>
                <span>{{ translate('Clear Cache') }}</span>
            </a>
        </li>

      {{-- Foreach menu item ends --}}
    </ul>
  </div>
</div>
<!-- END: Main Menu-->
