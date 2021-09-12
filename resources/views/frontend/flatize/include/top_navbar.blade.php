
                <div id="top">
                    <div class="container">
                        <p class="pull-left text-note">Free Shipping on all U.S orders over $50</p>
                        <ul class="nav nav-pills nav-top navbar-right">
                            <li class="dropdown my-account">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">My Dashboard</a></li>
                                    <li><a href="#">Account Information</a></li>
                                    <li><a href="#">Address Book</a></li>
                                    <li><a href="#">My Orders</a></li>
                                </ul>
                            </li>
                            @php
                                $user_id = 9;
                                $is_cart_empty = Cart::session($user_id)->isEmpty();
                                $cart_contents = Cart::session($user_id)->getContent();
                                $subtotal = Cart::session($user_id)->getSubTotal();
                                $total_item = $cart_contents->count();
                            @endphp
                            <li class="dropdown menu-shop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart"></i> 
                                    <span class="shopping-bag total-items">{{ $total_item }}</span>
                                </a>                                
                                <div class="dropdown-menu">
                                    <div id="recently-added-item-div">
                                        @if ($is_cart_empty)
                                            <h3>Your Cart Is Empty</h3>
                                        @else
                                            @include('frontend.flatize.cart.recently_added_items', ['cart_contents'=>$cart_contents,'subtotal'=>$subtotal])
                                        @endif
                                    </div>
                                </div>                                
                            </li>
                        </ul>
                    </div>
                </div>