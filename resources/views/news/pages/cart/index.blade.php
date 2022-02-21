
@extends('news.main')
@section('content')
@php
   
use App\Helpers\Template;
use App\Helpers\URL;
$linkCoupon = route('cart/coupon',['coupon'=>'value_new']);
    $priceCoupon= '0đ';
    $linkCheckOut= route('cart/check-out');
   $xhtml = '';
    $totalPrice = '0đ';
    $finalPrice = '0đ';
    $code = '';
    if(!empty(Cart::content()))
    {
        $totalPrice =  Template::formatMoney(Cart::totalFloat());
        $finalPrice =  Template::formatMoney(Cart::totalFloat());
    }
   
    $subCart =  session()->get('subCart');
  
    if(!empty($subCart))
    {
        $priceCoupon = Template::formatMoney($subCart['coupon_value']);
         $finalPrice = Template::formatMoney($subCart['total']);
        $code = $subCart['coupon_code'];
    }
    // $linkCoupon = route('cart/coupon',['coupon'=>'value_new','totalPrice'=>$priceCart]); 
    
@endphp
<div class="section-category">
    @include('news.block.breadcrumb1', ['item' => ['name' => 'Giỏ hàng']])
    <div class="cart-main-wrapper mt-no-text">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Hình ảnh</th>
                                    <th class="pro-title">Sản phẩm</th>
                                    <th class="pro-price">Giá tiền</th>
                                    <th class="pro-quantity">Số lượng</th>
                                    <th class="pro-subtotal">Tổng tiền</th>
                                    <th class="pro-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                foreach (Cart::content() as $key => $row){
                                   $linkDetail = URL::linkProduct($row->id,$row->name);
                                    $linkAjaxQuantity   = route('cart/ajaxQuantity',['quantity'=>'value_new','id'=>$row->id]);
                                    $price = Template::formatMoney($row->price);
                                    $thumb = $row->options->has('thumb') ? $row->options->thumb : '' ;
                                    $subtotal = Template::formatMoney($row->total);
                                   
                                    $linkRemove = route('cart/ajaxRemove',['id'=>$key]);
                                    $xhtml.= '<tr class="product-'.$key.'">
                                        <td class="pro-thumbnail"><a href="'.$linkDetail.'"><img class="img-fluid" src="'.$thumb.'" alt="Product" /></a></td>
                                        <td class="pro-title"><a href="'.$linkDetail.'">'.$row->name.'</a></td>
                                        <td class="pro-price"><span>'.$price.'</span></td>
                                        <td class="pro-quantity">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box ajax-quantity" data-url="'.$linkAjaxQuantity.'" value="'.$row->qty.'" type="text">
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                    <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal " ><span class="subtotal-'.$row->id.'">'.$subtotal.'</span></td>
                                        <td class="pro-remove "><a class="remove-product-cart" href="" data-url="'.$linkRemove.'"><i class="lnr lnr-trash"></i></a></td>
                                    </tr>';
                                }

                                
                            @endphp
                                
                            {!!$xhtml!!}
                            </tbody>
                        </table>
                    </div>
                    <!-- Cart Update Option -->
                    <div class="cart-update-option d-block d-md-flex justify-content-between">
                        <div class="apply-coupon-wrapper">
                            <form action="" method="post" class=" d-block d-md-flex">
                                <input type="text" class="coupon-value" placeholder="Enter Your Coupon Code" required value="{{$code}}" />
                                <button data-url="{{$linkCoupon}}" class="btn flosun-button primary-btn rounded-0 black-btn coupon-submit">Apply Coupon</button>
                            </form>
                        </div>
                        <div class="cart-update mt-sm-16">
                            <a href="#" class="btn flosun-button primary-btn rounded-0 black-btn">Update Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 ml-auto col-custom">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h3>Cart Totals</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Tạm tính</td>
                                        <td class="sub-total">{{$totalPrice}}</td>
                                    </tr>
                                    <tr>
                                        <td>Giảm giá</td>
                                        <td class="priceCoupon">{{$priceCoupon}}</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount gand-total">{{$finalPrice}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="{{$linkCheckOut}}" class="btn flosun-button primary-btn rounded-0 black-btn w-100">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection