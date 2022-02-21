
@extends('news.main')
@section('content')
<div class="section-category">
    @include('news.block.breadcrumb1', ['item' => ['name' => 'Check out']])
    <div class="checkout-area pb-45 pt-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">                         
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>1.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-2">Thông tin khách hàng</a></h5>
                                </div>
                                <div id="payment-2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="billing-information-wrapper">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Tên khách hàng</label>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Email </label>
                                                        <input type="email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Số điện thoại</label>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-select">
                                                        <label>Quận</label>
                                                        <select>
                                                            <option value="1">Quận 1</option>
                                                            <option value="2">Quận 2</option>
                                                            <option value="3">Quận 3</option>
                                                            <option value="4">Quận 4</option>
                                                            <option value="5">Quận 9</option>
                                                            <option value="6">Thủ đức</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Địa chỉ</label>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                               </div>
                                            <div class="ship-wrapper">
                                                <div class="single-ship">
                                                    <input type="radio" name="address" value="address" checked="">
                                                    <label>Ship đến địa chỉ này</label>
                                                </div>
                                                <div class="single-ship">
                                                    <input type="radio" name="address" value="dadress">
                                                    <label>Ship đến địa chỉ khác</label>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit">Xác nhận</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>2.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-3">Thông tin ship</a></h5>
                                </div>
                                <div id="payment-3" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <div class="shipping-information-wrapper">
                                            <div class="shipping-info-2">
                                                <span>HasTech</span>
                                                <span>Bonosrie</span>
                                                <span>D - Block</span>
                                                <span>Dkaka, 1201</span>
                                                <span>Bangladesh</span>
                                                <span>T: +8800 879 9876 </span>
                                            </div>
                                            <div class="edit-address">
                                                <a href="#">Sửa địa chỉ</a>
                                            </div>
                                            <div class="billing-select">
                                                <select class="email s-email s-wid">
                                                    <option>Select Your Address</option>
                                                    <option>Add New Address</option>
                                                    <option>Dkaka, 1201, Bangladesh</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>                          
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>3.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-6">Xem lại giỏ hàng</a></h5>
                                </div>
                                <div id="payment-6" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="order-review-wrapper">
                                            <div class="order-review">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="width-1">Tên sản phẩm</th>
                                                                <th class="width-2">Giá tiền</th>
                                                                <th class="width-3">Số lượng</th>
                                                                <th class="width-4">Tổng cộng</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="o-pro-dec">
                                                                        <p>Fusce aliquam</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-price">
                                                                        <p>$236.00</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-qty">
                                                                        <p>2</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-subtotal">
                                                                        <p>$236.00</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="o-pro-dec">
                                                                        <p>Primis in faucibus</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-price">
                                                                        <p>$265.00</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-qty">
                                                                        <p>3</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-subtotal">
                                                                        <p>$265.00</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="o-pro-dec">
                                                                        <p>Etiam gravida</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-price">
                                                                        <p>$363.00</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-qty">
                                                                        <p>2</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-subtotal">
                                                                        <p>$363.00</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="o-pro-dec">
                                                                        <p>Quisque in arcu</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-price">
                                                                        <p>$328.00</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-qty">
                                                                        <p>2</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-subtotal">
                                                                        <p>$328.00</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="3">Tổng cộng</td>
                                                                <td colspan="1">$4,001.00</td>
                                                            </tr>
                                                            <tr class="tr-f">
                                                                <td colspan="3">Phí ship</td>
                                                                <td colspan="1">$45.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">Tổng tiền</td>
                                                                <td colspan="1">$4,722.00</td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <span>
                                                       Quên sản phẩm ?
                                                        <a href="#"> Edit Your Cart.</a>

                                                    </span>
                                                    <div class="billing-btn">
                                                        <button type="submit">Mua hàng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="checkout-progress">
                        <h4>Checkout Progress</h4>
                        <ul>
                            <li>Billing Address</li>
                            <li>Shipping Address</li>
                            <li>Shipping Method</li>
                            <li>Payment Method</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection