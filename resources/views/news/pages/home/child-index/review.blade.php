@if (count($itemsReview)>0)
<div class="testimonials-area-4 pt-70 pb-70 " style="background-image: url({{asset('news/img/review_bg.png')}}">
    <div class="container">
        <div class="section-title-wrap-2 section-padding-none text-center mb-50">
            <h3 class="section-title section-bg-white" style="color: blueviolet ; font-size: 60px">Cảm nhận khách hàng</h3>
        </div>
        <div class="col-md-12 col-12 col-lg-10 col-xl-8 ml-auto mr-auto">
            <div class="testimonial-active owl-carousel">
                @foreach ($itemsReview as $item)
                @php
                    $name = $item['name'];
                    $avatar = asset('images/review/' . $item['thumb']);
                    $content = $item['content'];
                @endphp
                <div class="single-testimonial-4 text-center">
                    <div class="testimonial-img mb-30">
                        <img style="height: 150px; width: 150px;" src="{!!$avatar!!}" alt="{!!$name!!}">
                    </div>
                    <p>{!!$content!!} </p>
                    <h4 style="color: red">{!!$name!!}</h4>
                    <span>Khách hàng</span>
                    <div class="testimonial-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
</div>
@endif
