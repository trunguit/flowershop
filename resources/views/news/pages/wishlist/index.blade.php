@extends('news.main')

@section('content')
@php
use App\Helpers\Template;
use App\Helpers\URL;
$xhtml = '';
@endphp
@include('news.block.breadcrumb1', ['item' => ['name' => 'Wishlist']])
    

<div class="wishlist-main-wrapper mt-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-12">
                <!-- Wishlist Table Area -->
                <div class="wishlist-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Hình ảnh</th>
                                <th class="pro-title">Sản phẩm</th>
                                <th class="pro-price">Giá</th>
                                <th class="pro-stock">Trạng thái</th>
                                <th class="pro-cart">Thêm giỏ hàng</th>
                                <th class="pro-remove">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            foreach (Cart::instance('wishlist')->content() as $key => $row){
                               $linkDetail = URL::linkProduct($row->id,$row->name);
                                $linkAjaxQuantity   = route('cart/ajaxQuantity',['quantity'=>'value_new','id'=>$row->id]);
                                $price = Template::formatMoney($row->price);
                                $thumb = $row->options->has('thumb') ? $row->options->thumb : '' ;
                                $subtotal = Template::formatMoney($row->total);
                               $linkActionCart = route('cart/actionCart',['id'=>$row->id]);
                                $linkRemove = route('wishlist/ajaxRemove',['id'=>$key]);
                                $xhtml.= '<tr class="product-wishlist-'.$key.'">
                                    <td class="pro-thumbnail"><a href="'.$linkDetail.'"><img class="img-fluid" src="'.$thumb.'" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="'.$linkDetail.'">'.$row->name.'</td>
                                    <td class="pro-price"><span>'.$price.'</span></td>
                                    <td class="pro-stock"><span><strong>Còn hàng</strong></span></td>
                                    <td class="pro-cart"><a href="" data-url="'.$linkActionCart.'"  class="btn action-cart product-cart button-icon flosun-button dark-btn">Add to Cart</a></td>
                                    <td class="pro-remove"><a class="remove-product-wishlist" data-url="'.$linkRemove.'" href="#"><i class="lnr lnr-trash"></i></a></td>
                                </tr>';
                            }

                            
                        @endphp
                            
                        {!!$xhtml!!}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection