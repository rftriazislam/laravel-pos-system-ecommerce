@php
    $footer_contact_page = get_frontend_settings_value('Contact Section');
    $social_media_info = get_frontend_settings_value('Social Media');
    $copyright_info = get_frontend_settings_value('Copyright');

    $facebook = 'javascript:void(0)';
    $twitter = 'javascript:void(0)';
    $google_plus = 'javascript:void(0)';
    $pinterest = 'javascript:void(0)';

    if ($social_media_info) {
        $facebook = isset($social_media_info['facebook']) ? $social_media_info['facebook'] : $facebook;
        $twitter = isset($social_media_info['twitter']) ? $social_media_info['twitter'] : $twitter;
        $google_plus = isset($social_media_info['google_plus']) ? $social_media_info['google_plus'] : $google_plus;
        $pinterest = isset($social_media_info['pinterest']) ? $social_media_info['pinterest'] : $pinterest;
    }

    $copyright_name = '';
    $copyright_link = '';
    $designed_by_name = '';
    $designed_by_link = '';

    if ($copyright_info) {
        $copyright_name = isset($copyright_info['copyright_name']) ? $copyright_info['copyright_name'] : '';
        $copyright_link = isset($copyright_info['copyright_link']) ? $copyright_info['copyright_link'] : route('home');
        $designed_by_name = isset($copyright_info['designed_by_name']) ? $copyright_info['designed_by_name'] : '';
        $designed_by_link = isset($copyright_info['designed_by_link']) ? $copyright_info['designed_by_link'] : route('home');
    }
@endphp
            <footer class="footer">
                <div class="container">
                    <div class="upper-foot">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-3">
                                <h2>Contact detail</h2>
                                <address>
                                    <i class="fa fa-map-marker"></i> {{ $footer_contact_page['address'] }}<br>
                                    <i class="fa fa-phone"></i> Phone. {{ $footer_contact_page['phone'] }}<br>
                                    <i class="fa fa-fax"></i> Fax. {{ $footer_contact_page['fax'] }}<br>
                                    <i class="fa fa-envelope"></i> E-mail. {{ $footer_contact_page['email'] }}
                                </address>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-3">
                                <h2>Useful links</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Terms and Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                            {{-- <div class="col-xs-6 col-sm-3">
                                <h2>Tags</h2>
                                <ul class="list-inline tagclouds">
                                    <li><a href="#">Image</a></li>
                                    <li><a href="#">Features</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Post Formats</a></li>
                                    <li><a href="#">Typography</a></li>
                                    <li><a href="#">WooCommerce</a></li>
                                    <li><a href="#">Shortcodes</a></li>
                                    <li><a href="#">Best Sellers</a></li>
                                    <li><a href="#">Slideshow</a></li>
                                </ul>
                            </div> --}}
                            {{-- <div class="col-xs-6 col-sm-3">
                                <h2>Don’t miss out</h2>
                                <p>In venenatis neque a eros laoreet eu placerat erat suscipit. Fusce cursus, erat ut scelerisque.</p>
                                <form class="form-inline form-newsletter" role="form">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter your email here">
                                    </div>
                                    <button type="submit" class="btn"><i class="fa fa-caret-right"></i></button>
                                </form>
                            </div> --}}
                        </div>
                    </div>
                    <div class="below-foot">
                        <div class="row">
                            <div class="col-xs-6 copyrights">
                                <p>
                                    Copyright © {{ date('Y') }} <a href="{{ $copyright_link }}">{{ $copyright_name }}</a> All rights reserved. 
                                    || Designed by <a href="{{ $designed_by_link }}">{{ $designed_by_name }}</a>                                    
                                </p>
                            </div>
                            <div class="col-xs-6 text-right">
                                <ul class="list-inline social-list">
                                    <li>
                                        <a data-toggle="tooltip" data-placement="top" title="Facebook" href="{{ $facebook }}">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tooltip" data-placement="top" title="Twitter" href="{{ $twitter }}">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tooltip" data-placement="top" title="Google+" href="{{ $google_plus }}">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tooltip" data-placement="top" title="Pinterest" href="{{ $pinterest }}">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>