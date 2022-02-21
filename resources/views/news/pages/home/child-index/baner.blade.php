@php
    
    use App\Helpers\URL;
   
@endphp
@if (count($itemsCateProduct)>0)
<div class="banner-area">
    <div class="container">
        <div class="banner-wrap">
            <div class="row">
                @foreach ($itemsCateProduct as $item)
                    @php
                        $name = $item['name'];
                        $thumb        = asset('images/' . $item['thumb']);
                        $link = URL::linkCateProduct($item['id'], $item['name']);
                    @endphp
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner img-zoom mb-30">
                        <a href="{!!$link!!}">
                            {{-- <img src="assets/img/banner/banner-1.png" alt=""> --}}
                            <img src="{{$thumb}}" alt="{!!$name!!}">
                        </a>
                        <div class="banner-content">
                            <h4>{!!$name!!}</h4>
                            <a href="{!!$link!!}">Mua ngay</a>
                        </div>
                    </div>
                </div>
                @endforeach             
            </div>
        </div>
    </div>
</div>
@endif