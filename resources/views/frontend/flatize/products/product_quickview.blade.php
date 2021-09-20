<style type="text/css">
    .quick-view-img { width: 385px; height: 578px; }
    .quick-view-index-img { width: 210px; height: 132px; }
</style>

<div class="modal fade quickview-wrapper" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <div class="product-detail">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="product-preview">
                                <ul class="bxslider" id="slider1">
                                    @if ($product_info['images'])
                                        @foreach ($product_info['images'] as $image)
                                            <li><img class="img-responsive" src="{{ asset('public/'.$image->file_name) }}" /></li>
                                        @endforeach
                                    @endif
                                </ul>

                                <ul class="list-inline bx-pager">
                                    @if ($product_info['images'])
                                        @foreach ($product_info['images'] as $image)
                                            <li><a data-slide-index={{$loop->index}} href=""><img class="img-responsive" src="{{ asset('public/'.$image->file_name) }}" /></a></li>
                                        @endforeach
                                    @endif
                                </ul>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="summary entry-summary">
                            <h3>{{ $product_info['name'] }}</h3>
                            {{-- <div class="reviews-counter clearfix">
                                <div class="rating five-stars pull-left">
                                    <div class="star-rating"></div>
                                    <div class="star-bg"></div>
                                </div>
                                <span>3 Reviews</span>
                            </div> --}}

                            <p class="price">
                                <span class="amount">৳ {{ number_format($product_info['unit_price']) }}</span>
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

                            <div method="post" class="cart">
                                <div class="quantity pull-left">
                                    <input type="button" class="minus" value="-">
                                    <input type="text" class="input-text qty" title="Qty" value="1" name="quantity" min="1" step="1">
                                    <input type="button" class="plus" value="+">
                                </div>
                                {{-- <a href="#" class="btn btn-grey">
                                    <span><i class="fa fa-heart"></i></span>
                                </a> --}}
                                <button class="btn btn-primary btn-icon add_item_to_cart" product-id="{{ $product_info['id'] }}">
                                    <i class="fa fa-shopping-cart"></i> Add to cart
                                </button>
                            </div>

                            <ul class="list-unstyled product-meta">
                                {{-- <li>Sku: 54329843</li> --}}
                                @php
                                    $category_name = '';
                                    if (isset($product_info['category_name'])) {
                                        $category_name = $product_info['category_name'];
                                    } else if (isset($category_info['name'])) {
                                        $category_name = $category_info['name'];
                                    }
                                @endphp
                                <li>Categories: <a href="{{ route('all_product',$category_info['id']) }}">{{ $category_name }}</a></li>
                                <li>Tags: {{ $product_info['tags'] }}</li>
                            </ul>

                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Description</a> </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body text-justify">
                                            {{ $product_info['description'] }}
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Addition Information</a> </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse text-justify">
                                        <div class="panel-body"> <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p> </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="panel panel-default">
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
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.quickview-wrapper').on('shown.bs.modal', function (e) {
				e.preventDefault();
				proload.reloadSlider();
			});

        var proload = $('#slider1').bxSlider({
            pagerCustom: '.bx-pager',
            controls: false,
            adaptiveHeight : 'true'
        });
    });
</script>
