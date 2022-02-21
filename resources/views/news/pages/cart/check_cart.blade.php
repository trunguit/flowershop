
@extends('news.main')
@section('content')
@php
    $linkCheck = route('cart/ajaxCheck',['code'=>'value_new']);
@endphp

    
       
            @include('news.block.breadcrumb1', ['item' => ['name' => 'Check Cart']])
            <div class="checkout-area mt-no-text">
                <div class="container custom-container">
                 
            <div class="row">
                <div class="col-lg-12 col-12 col-custom">
                    <form action="" method="POST">
                        @csrf
                        <div class="checkbox-form">
                            <h3>Kiểm tra đơn hàng của bạn</h3>
                            <div class="row">
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Mã đơn hàng<span class="required">*</span></label>
                                        <input name="code" class="code_value" placeholder="Nhập mã đơn hàng từ email" type="text">
                                       
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <button style="width: 50%!important;margin-top: 21px;" data-url="{{$linkCheck}}" class="btn check-cart flosun-button secondary-btn black-color rounded-0 w-100">Kiểm tra</button>
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Tên khách hàng <span class="required">*</span></label>
                                        <input disabled name="name" class="check-cart-name" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Số điện thoại <span class="required">*</span></label>
                                        <input disabled class="check-cart-phone" name="phone" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Địa chỉ <span class="required">*</span></label>
                                        <input disabled class="check-cart-address" name="address" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Ngày đặt <span class="required">*</span></label>
                                        <input name="date" disabled class="check-cart-date" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Trạng thái đơn hàng <span class="required">*</span></label>
                                        <input name="status" disabled class="check-cart-status" placeholder="" type="text">
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
               
            </div>
@endsection