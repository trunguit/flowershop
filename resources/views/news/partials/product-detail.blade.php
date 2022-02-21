
@php
  use App\Helpers\URL;
  use App\Helpers\Template;
    $img = json_decode($item['image_main'],true);
    
    $alt = $img['alt'];
   
    $thumb = $img['src'];
    $sale_off = ($item['price_default'] - $item['price_sale']) / $item['price_default'] *100 ;
    $sale_off=  number_format($sale_off,$decimals=0);
    $name = $item['name'];
    $id = $item['id'];
    $linkDetail = URL::linkProduct($id,$name);
    $price = Template::formatMoney($item['price_sale']);
    $price_defaul = Template::formatMoney($item['price_default']);
    $quickViewLink = route('product/quickView',['id'=>$id]);
    $actionCartLink = route('cart/actionCart',['id'=>$id]);
@endphp

<div class="product-wrapper">
    <div class="product-img">
        <a href="{!!$linkDetail!!}">
            <img alt="{!!$alt!!}" src="{!!$thumb!!}">
        </a>
        <span>-{!!$sale_off!!}%</span>
        <div class="product-action">
            <a class="action-wishlist" href="#" title="Wishlist">
                <i class="icon-heart"></i>
            </a>
            <a class="action-cart" data-url="{!!$actionCartLink!!}" href="" title="Add To Cart">
                <i class="icon-handbag"></i>
            </a>
            <a class="action-compare quick-view" href="#" data-target="#exampleModal" data-id="{!!$id!!}" data-link="{!!$quickViewLink!!}" data-toggle="modal" title="Quick View">
                <i class="icon-magnifier-add"></i>
            </a>
        </div>
    </div>
    <div class="product-content text-center">
        <h4>
            <a href="{!!$linkDetail!!}">{!!$name!!}</a>
        </h4>
        <div class="product-price-wrapper">
            <span>{!!$price!!} đ</span>
            <span class="product-price-old">{!!$price_defaul!!} đ</span>
        </div>
    </div>
    
</div>
