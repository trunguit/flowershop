@php
use App\Helpers\Template as Template;

@endphp
@if (!empty($items))
<div class="banner-area mt-text-3">
    <div class="container-fluid">
        <div class="row">
    @foreach ($items as $item)
        @php
            $thumb =  asset('images/banner/' . $item['thumb']);
        @endphp
        <div class="col-md-4 col-custom">
            <!--Single Banner Area Start-->
            <div class="single-banner hover-style mb-30">
                <div class="banner-img">
                    <a href="#">
                        <img src="{{$thumb}}" alt="">
                        <div class="overlay-1"></div>
                    </a>
                </div>
            </div>
            <!--Single Banner Area End-->
        </div>
    @endforeach
</div>
</div>
</div>
@endif

           