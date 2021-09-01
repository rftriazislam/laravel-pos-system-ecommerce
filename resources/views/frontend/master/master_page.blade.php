<!DOCTYPE html>
<html lang="en">
    <head>
        @include('frontend.include.header')
        @yield('custom_css')
    </head>

    <body>
        <div id="page">
            <header>
        		@include('frontend.include.top_navbar');
        		@include('frontend.include.menu');
            </header>
            
            <!-- Begin Login -->
    		@include('frontend.include.login_page');
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
            @include('frontend.include.footer')
            <!-- End footer -->                
        </div>
        
        <!-- Begin Search -->
		@include('frontend.include.search_modal')
        <!-- End Search -->
        
        <!-- Begin Quickview -->
        @yield('modal_section')
        <!-- End Quickview -->

        @include('frontend.include.footer_assets')
        @yield('custom_js')
    </body>
</html>