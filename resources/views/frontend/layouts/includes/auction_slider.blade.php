<!-- Start: main banner -->
<section class="p-t-50 pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="owl-one">
                    <div class="owl-carousel owl-theme">
                        @foreach($slider->images as $image)
                            <div class="item">
                                <img class="img-fluid" src="{{slider_images($image)}}" alt="preview">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End: main banner -->
