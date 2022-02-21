@php
foreach ($itemsQuoste as $item) {
    $thumb        = asset('images/quoste/' . $item['thumb']); 
    $quoste1 = $item['quoste1'];
    $quoste2 = $item['quoste2'];
    $quoste3 = $item['quoste3'];
}

@endphp
<div class="testimonials-area bg-img pt-120 pb-115" style="background-image:url({!!$thumb!!});">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto col-12">
                <div class="testimonial-active owl-carousel">
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img alt="" src="{{asset('news/img/icon-img/testi.png') }}">
                            
                        </div>
                        {!!$quoste1!!}
                    </div>
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img alt="" src="{{asset('news/img/icon-img/testi.png') }}">
                        </div>
                        {!!$quoste2!!}
                    </div>
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img alt="" src="{{asset('news/img/icon-img/testi.png') }}">
                        </div>
                        {!!$quoste3!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>