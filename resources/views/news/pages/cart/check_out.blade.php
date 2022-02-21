
@extends('news.main')
@section('content')
@php
    use App\Helpers\Template;
    
    $subcart = session()->get('subCart');
    $ship = session()->get('ship');
    $priceCoupon= '0';
    $priceShip =  '0';
    $xhtml = '';
    $totalPrice = '0';
    $finalPrice = '0';
   
    if(!empty(Cart::content()))
    {
        $totalPrice =  Cart::totalFloat();
        $finalPrice =  Cart::totalFloat();
    }
   
    $subCart =  session()->get('subCart');
   $selected = 'defautl';
    if(!empty($subCart))
    {
    $couponCode =$subCart['coupon_code'];
    $priceCoupon = $subCart['coupon_value'];
    $finalPrice = $subCart['total'];
      
    }
  
    if(!empty($ship)){
        $priceShip = $ship['price'];
        $selected = $ship['id'];
        $finalPrice = Cart::totalFloat() - $priceCoupon + $ship['price'];
    }
   $arrShip = ['default'=>'Chọn Quận của bạn']+ $itemsShip;
  $xhtmlSlbDistrict = Template::createSelectBox($arrShip,$selected);
  
    $xhtml = '';
    $linkBuy = route('cart/postCheckOut');
@endphp
<div class="checkout-area mt-no-text">
    <div class="container custom-container">
        
        <div class="row">
            <div class="col-lg-6 col-12 col-custom">
                <form action="{!!$linkBuy!!}" method="POST">
                    @csrf
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <input name="total_price" value="{{$finalPrice}}" placeholder="Nhập tên" type="hidden">
                        <input name="shiping_price" value="{{$priceShip}}" placeholder="Nhập tên" type="hidden">
                        <input name="coupon" value="{{$couponCode}}" placeholder="Nhập tên" type="hidden">
                        <input name="coupon_price" value="{{$priceCoupon}}" placeholder="Nhập tên" type="hidden">
                        <div class="row">
                            <div class="col-md-12 col-custom">
                                <div class="checkout-form-list">
                                    <label>Tên <span class="required">*</span></label>
                                    <input name="name" placeholder="Nhập tên" type="text">
                                   
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input name="phone" placeholder="Nhập số điện thoại" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="checkout-form-list">
                                    <label>Email <span class="required">*</span></label>
                                    <input name="email" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-12 col-custom">
                                <div class="country-select clearfix">
                                    <label>Quận <span class="required">*</span></label>
                                        {!!$xhtmlSlbDistrict!!}
                                </div>
                            </div>
                            <div class="col-md-12 col-custom">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input name="address" placeholder="Số nhà , tên đường , Phường" type="text">
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-custom">
                                <div class="checkout-form-list create-acc">
                                    <input name="payment" value="bank_transfer" id="cbox" type="checkbox">
                                    <label  for="cbox">Chuyển khoản</label>
                                </div>
                               
                            </div>
                        </div>
                        <div class="different-address">
                            <div class="ship-different-title">
                                <div>
                                    <input name="payment" checked value="ship_code" id="ship-box" type="checkbox">
                                    <label for="ship-box">Thanh toán khi nhận hàng</label>
                                </div>
                            </div>
                            
                            <div class="order-notes mt-3">
                                <div class="checkout-form-list checkout-form-list-2">
                                    <label>Ghi chú</label>
                                    <textarea name="note" id="checkout-mess" cols="30" rows="10" placeholder="Lưu ý khi giao và nhận hàng"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div class="order-button-payment">
                                <button class="btn flosun-button secondary-btn black-color rounded-0 w-100">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-12 col-custom">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                foreach (Cart::content() as $row){
                                    $subtotal = Template::formatMoney($row->total);                               
                                    $xhtml.= '<tr class="cart_item">
                                        <td class="cart-product-name">'.$row->name.'<strong class="product-quantity">
                            × '.$row->qty.'</strong></td>
                                        <td class="cart-product-total text-center"><span class="amount">'.$subtotal.'</span></td>
                                    </tr>';
                                }

                                
                            @endphp
                                
                            {!!$xhtml!!}
                                
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td class="text-center"><span class="amount subtotal-check-out">{{Template::formatMoney($totalPrice)}}</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Giảm giá</th>
                                    <td class="text-center"><span class="amount coupon-check-out">{{Template::formatMoney($priceCoupon)}}</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Tiền ship</th>
                                    <td class="text-center"><span class="amount ship-check-out">{{Template::formatMoney($priceShip)}}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td class="text-center"><strong><span class="amount gandtotal-check-out">{{Template::formatMoney($finalPrice)}}</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection