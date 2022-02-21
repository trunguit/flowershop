
@if (!empty($items))
<div class="product-countdown-area mt-text-3">
    <div class="container custom-area">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12 col-custom">
                <div class="section-title text-center mb-30">
                    <h3 class="section-title-3">Deal of The Day</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row">
            <!--Countdown Start-->
            <div class="col-12 col-custom">
                <div class="countdown-area">
                    <div class="countdown-wrapper d-flex justify-content-center" data-countdown="2022/12/24"></div>
                </div>
            </div>
            <!--Countdown End-->
        </div>
        <div class="row product-row">
            <div class="col-12 col-custom">
                <div class="item-carousel-2 swiper-container anime-element-multi product-area">
                    <div class="swiper-wrapper">
                        @foreach ($items as $item)
                         @include('news.partials.product',['item'=>$item])  
                        @endforeach
                    </div>
                    <!-- Slider pagination -->
                    <div class="swiper-pagination default-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

