
    @php
    
  
    use App\Helpers\Template;
    use App\Helpers\Hightlight;
    use App\Helpers\URL;
    $image_main = json_decode($item['thumb'],true);
    $image              = asset('images/product/'.$image_main[0]['name']);
    $sale_off = ($item['price_default'] - $item['price_sale']) / $item['price_default'] *100 ;
    $sale_off=  number_format($sale_off,$decimals=0);
    $name = $item['name'];
    $id = $item['id'];
    $linkDetail = URL::linkProduct($id,$item['name']);
    $price = Template::formatMoney($item['price_sale']);
    $price_defaul = Template::formatMoney($item['price_default']);
    $quickViewLink = route('product/quickView',['id'=>$id]);
    $actionCartLink = route('cart/actionCart',['id'=>$id]);
    @endphp
   
  
    <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
        <div class="product-item">
            <div class="single-product position-relative mr-0 ml-0">
                <div class="product-image">
                    <a class="d-block" href="{{$linkDetail}}">
                        <img src="{{$image}}" alt="" class="product-image-1 w-100">
                       
                    </a>
                    <span class="onsale">{{$sale_off}}%</span>
                    <div class="add-action d-flex flex-column position-absolute">
                        <a href="compare.html" title="Compare">
                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                        </a>
                        <a href="wishlist.html" title="Add To Wishlist">
                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                        </a>
                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="lnr lnr-eye Quick-view" data-url="{{ $quickViewLink}}" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content">
                    <div class="product-title">
                        <h4 class="title-2"> <a href="{{$linkDetail}}"><p>{{$name}}</p></a></h4>
                    </div>
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="price-box">
                        <span class="regular-price ">{{$price}}</span>
                        <span class="old-price"><del>{{$price_defaul}}</del></span>
                    </div>
                    <a href="" data-url="{{$actionCartLink}}" class="btn action-cart product-cart">Add to Cart</a>
                </div>
                <div class="product-content-listview">
                    <div class="product-title">
                        <h4 class="title-2"> <a href="{{$linkDetail}}">Flowers daisy pink stick</a></h4>
                    </div>
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="price-box">
                        <span class="regular-price ">{{$price}}</span>
                        <span class="old-price"><del>{{$price_defaul}}</del></span>
                    </div>
                    <p class="desc-content">test</p>
                    <div class="button-listview">
                        <a href="{{$actionCartLink}}" class="btn product-cart button-icon flosun-button dark-btn" data-toggle="tooltip" data-placement="top" title="Add to Cart"> <span>Add to Cart</span> </a>
                        <a class="list-icon" href="compare.html" title="Compare">
                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="top" title="Compare"></i>
                        </a>
                        <a class="list-icon" href="wishlist.html" title="Add To Wishlist">
                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="top" title="Wishlist"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
                    
