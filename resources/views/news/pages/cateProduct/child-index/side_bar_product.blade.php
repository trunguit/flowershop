
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
   
  
    <div class="sidebar-product align-items-center">
                        <a href="product-details.html" class="image">
                            <img src="{{$image}}" alt="product">
                        </a>
                        <div class="product-content">
                            <div class="product-title">
                                <h4 class="title-2"> <a href="{{$linkDetail}}">{{$name}}</a></h4>
                            </div>
                            <div class="price-box">
                                <span class="regular-price ">{{$price}}</span>
                                <span class="old-price"><del>{{$price_defaul}}</del></span>
                            </div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                    </div>
   
                    
