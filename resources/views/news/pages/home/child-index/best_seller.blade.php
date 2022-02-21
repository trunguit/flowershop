@if (count($itemsProductBestseller)>0)
@php
    
@endphp
<div class="product-area pt-40 pb-70">
    <div class="container">
        <div class="product-top-bar section-border mb-35">
            <div class="section-title-wrap">
                <h3 class="section-title section-bg-white">Sản phẩm Bán chạy</h3>
            </div>        
        </div>
        <div class="tab-content ">
            <div id="" class="tab-pane active">
                <div class="featured-product-active owl-carousel product-nav">
                    @foreach ($itemsProductBestseller as $item)
                       
                        @include('news.partials.product-detail', ['item' => $item])
                    @endforeach
                </div>
            </div>
           
        </div>
    </div>
</div>
@endif 
