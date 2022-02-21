
@php
  use App\Helpers\URL;
  use App\Helpers\Template;
  
    $image_main = json_decode($item['thumb'],true);
    $image              = asset('images/product/'.$image_main[0]['name']);
    $sale_off = ($item['price_default'] - $item['price_sale']) / $item['price_default'] *100 ;
    $sale_off=  number_format($sale_off,$decimals=0);
    $name = $item['name'];
    $id = $item['id'];
    $linkDetail = URL::linkProduct($id,$name);
    $price = Template::formatMoney($item['price_sale']);
    $price_defaul = Template::formatMoney($item['price_default']);
    $quickViewLink = route('product/quickView',['id'=>$id]);
    $actionCartLink = route('cart/actionCart',['id'=>$id]);
    $actionWishlistLink = route('wishlist/actionWishlist',['id'=>$id]);
@endphp

<div class="single-item swiper-slide">
    <!--Single Product Start-->
    <div class="single-product position-relative mb-30">
        <div class="product-image">
            <a class="d-block" href="{!!$linkDetail!!}">
                <img src="{!!$image!!}" alt="" class="product-image-1 w-100">         
            </a>
            <span class="onsale">{{ $sale_off}} %</span>
            <div class="add-action d-flex flex-column position-absolute">
                <a href="compare.html" title="Compare">
                    <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                </a>
                <a href=""   title="Add To Wishlist">
                    <i class="lnr lnr-heart action-wishlist" data-url="{{ $actionWishlistLink}} data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                </a>
                <a href="#exampleModalCenter" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="lnr lnr-eye Quick-view" data-url="{{ $quickViewLink}}" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                </a>
            </div>
        </div>
        <div class="product-content">
            <div class="product-title">
                <h4 class="title-2"> <a href="{!!$linkDetail!!}">{!!$name!!}</a></h4>
            </div>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <div class="price-box">
                <span class="regular-price ">{!!$price!!}</span>
                <span class="old-price"><del>{!!$price_defaul!!}</del></span>
            </div>
            <a href="" data-url="{{$actionCartLink}}" class="btn action-cart product-cart">Add to Cart</a>
        </div>
    </div>
    <!--Single Product End-->
    
</div>