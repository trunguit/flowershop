
@extends('news.main')
@section('content')
@php
    $cart = session('cart');
    // dd($cart);
    $total = !empty($cart) ? count($cart) : 0;
@endphp
<div class="section-category">
    @include('news.block.breadcrumb1', ['item' => ['name' => 'Giỏ hàng']])
    <div class="cart-main-area pt-60 pb-65">
        <div class="container">
            <h3 class="page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="{{route('product/updateCart')}}" method="POST">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <th>Số lượng</th>
                                        <th>Tổng cộng</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($total > 0)
                                        @foreach($cart as $id => $product)
                                            @php
                                                // $product = \App\Helpers\Fetch::get('api/productInfo/'.$id);
                                                $product = DB::table('product')->where('id', '=', $id)->first();
                                               
                                                $linkProduct = URL::linkProduct($product->id,$product->name)
                                                // dd($product);
                                            @endphp
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="{{$linkProduct}}">
                                                    <img src="{{json_decode($product->image_main, true)['src']}}" width="90px" alt="">
                                                </a>
                                            </td>
                                            <td class="product-name"><a href="#">{{$product->name}}</a></td>
                                            <td class="product-price-cart"><span class="amount">{{App\Helpers\Template::showPrice($product->price_default)}}</span></td>
                                            <td class="product-quantity">
                                                <div class="pro-dec-cart">
                                                    <input class="cart-plus-minus-box" name="quantity[{{$product->id}}]" type="text" value="{{$quantity}}">
                                                </div>
                                            </td>
                                            <td class="product-subtotal">{{App\Helpers\Template::showPrice($product->price_default*$quantity)}}</td>
                                            <td class="product-remove">
                                                <a href="#"><i class="fa fa-pencil"></i></a>
                                                <a href="#"><i class="fa fa-times"></i></a>
                                        </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <td colspan="3" class="text-left"><p>Hiện tại chưa có sẵn phòng trong giỏ hàng!</p></td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="#">Tiếp tục mua hàng</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button>Cập nhật giỏ hàng</button>
                                        <a href="#">Xóa hết giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                   <h4 class="cart-bottom-title section-bg-gray">Sử dụng mã giảm giá</h4> 
                                </div>
                                <div class="discount-code">
                                    <p>Nhập mã giảm giá.</p>
                                    <form>
                                        <input type="text" required="" name="name">
                                        <button class="cart-btn-2" type="submit">Áp dụng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Thông tin thanh toán</h4>
                                </div>
                                <h5>Tổng tiền <span>$260.00</span></h5>
                                <div class="total-shipping">
                                    <h5>Total shipping</h5>
                                    <ul>
                                        <li><input type="checkbox"> Standard <span>$20.00</span></li>
                                        <li><input type="checkbox"> Express <span>$30.00</span></li>
                                    </ul>
                                </div>
                                <h4 class="grand-totall-title">Grand Total  <span>$260.00</span></h4>
                                <a href="{{route('product/checkout')}}">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection