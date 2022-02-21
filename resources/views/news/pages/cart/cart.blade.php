@php
    $total = array_sum($cart['quantity']) ;
    
@endphp
    <tbody>
       
            @foreach ($cart['id'] as $key => $value)
            @php
            $name               = $cart['name'][$value];
            $linkAjaxQuantity   = route('cart/ajaxQuantity',['quantity'=>'value_new','id'=>$key]);
            $linkAjaxRemove   = route('cart/ajaxRemove',['id'=>$key]);
            $price              = number_format($cart['price'][$value]);
            $quantity           = $cart['quantity'][$value];
            $thumb              = $cart['picture'][$value];
            $totalPrice         = number_format($cart['price'][$value] * $quantity);
            @endphp
             <tr class="product-{!!$key!!}">
                <td class="product-thumbnail">
                    <a href="#"><img src="{!!$thumb!!}" alt="" style="width: 84;height: 84px;"></a>
                </td>
                <td class="product-name"><a href="#">{!!$name!!}</a></td>
                <td class="product-price-cart"><span class="amount">{!!$price!!}</span></td>
                <td class="product-quantity">
                    <div class="pro-dec-cart">
                        <input data-url="{{$linkAjaxQuantity}}" class="ajax-quantity cart-plus-minus-box" type="number" value="{!!$quantity!!}" name="qtybutton">
                    </div>
                </td>
                <td class="product-subtotal-{!!$key!!}">{!!$totalPrice!!}</td>
                <td class="product-remove">
                    <a class="remove-product-cart" href="" data-url="{!!$linkAjaxRemove!!}"><i class="fa fa-times "></i></a>
                </td>
            </tr>
            @endforeach
       
    </tbody>
