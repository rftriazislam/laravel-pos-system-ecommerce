
<section class="main-slide">
    <div id="owl-main-demo" class="owl-carousel main-demo">
        @foreach ($slider_images as $slider_image)
            <div class="item" id="item1">
                <img src="{{ asset($slider_image['image_path']) }}" class="img-responsive slider-img" alt="Photo">
                {{-- <div class="item-caption">
                    <div class="item-caption-inner">
                        <div class="item-caption-wrap">
                            <p class="item-cat"><a href="#">Fall/Winter 2014</a></p>
                            <h2>Up to 50% off<br>on selected items</h2>
                            <a href="#" class="btn btn-white hidden-xs">Shop Now</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        @endforeach
    </div>
</section>