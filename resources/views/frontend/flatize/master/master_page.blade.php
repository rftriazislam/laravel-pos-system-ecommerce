<!DOCTYPE html>
<html lang="en">
    <head>
        @include('frontend.flatize.include.header')
        @yield('custom_css')
    </head>

    <body>
        <div id="page">
            <header>
                @if (auth::user() && auth::user()['user_type'] == 'customer')
                    @include('frontend.flatize.include.top_navbar');
                @endif
        		@include('frontend.flatize.include.menu');
            </header>
            
            <!-- Begin Login -->
    		@include('frontend.flatize.include.login_page');
            <!-- End Login -->
            
            <!-- Begin Main -->
            <div role="main" class="main">
                <!-- Begin Main Slide -->
                @yield('sliders')
                <!-- End Main Slide -->

                @yield('page_content')
            </div>
            <!-- End Main -->
            
            <!-- Begin footer -->
            @include('frontend.flatize.include.footer')
            <!-- End footer -->                
        </div>
        
        <!-- Begin Search -->
		@include('frontend.flatize.include.search_modal')
        <!-- End Search -->
        
        <!-- Begin Login Modal -->
        @include('frontend.flatize.include.login_modal')
        <!-- End Login Modal -->
        
        <!-- Begin Quickview -->
        @yield('modal_section')
        <!-- End Quickview -->

        @include('frontend.flatize.include.footer_assets')
        @include('frontend.flatize.include.frontend_common_script')
        @yield('custom_js')
    </body>
</html>