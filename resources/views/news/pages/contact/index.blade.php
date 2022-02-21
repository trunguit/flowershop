@extends('news.main')

@section('content')
@include('news.block.breadcrumb1', ['item' => ['name' => 'Liên hệ']])
    

    <div class="contact-us-area mt-no-text">
        <div class="container custom-area">
            <div class="row">
                @include('news.templates.notify')
                <div class="col-lg-4 col-md-6 col-custom">
                    <div class="contact-info-item">
                        <div class="con-info-icon">
                            <i class="lnr lnr-map-marker"></i>
                        </div>
                        <div class="con-info-txt">
                            <h4>Vị trí của chúng tôi</h4>
                            <p>(800) 123 456 789 / (800) 123 456 789 info@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-custom">
                    <div class="contact-info-item">
                        <div class="con-info-icon">
                            <i class="lnr lnr-smartphone"></i>
                        </div>
                        <div class="con-info-txt">
                            <h4>Liên lạc với chúng tôi mọi lúc</h4>
                            <p>Mobile: 012 345 678<br>Fax: 123 456 789</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-custom text-align-center">
                    <div class="contact-info-item">
                        <div class="con-info-icon">
                            <i class="lnr lnr-envelope"></i>
                        </div>
                        <div class="con-info-txt">
                            <h4>Hỗ trợ </h4>
                            <p>Support24/7@gmail.com <br> info@example.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-custom">
                    <form method="post" action="{{ route('contact/postContact') }}" id="contact-form" accept-charset="UTF-8" class="contact-form">
                        @csrf
                        <div class="comment-box mt-5">
                            <h5 class="text-uppercase">Gửi liên hệ cho chúng tôi</h5>
                            <div class="row mt-3">
                                <div class="col-md-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area name gray-bg" type="text" name="name" id="name" placeholder="Tên của bạn">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area email gray-bg" type="email" name="email" id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area email gray-bg" type="text" name="phone" id="phone" placeholder="Số điện thoại">
                                    </div>
                                </div>
                                <div class="col-12 col-custom">
                                    <div class="input-item mb-4">
                                        <textarea cols="30" rows="5" class="border-0 rounded-0 w-100 custom-textarea input-area gray-bg" name="message" id="message" placeholder="Lời nhắn"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-custom mt-40">
                                    <button type="submit" id="submit" name="submit" class="btn flosun-button secondary-btn theme-color rounded-0">Gửi lời nhắn</button>
                                </div>
                                <p class="col-8 col-custom form-message mb-0"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection