@php
use App\Models\SettingModel ;
$model = new SettingModel();
// $itemFooter = $model->getItem($params['type'] == 'general');
$itemFooter   = $model->listItems(null, ['task'   => 'news-list-items-page']);
$thumbTrung = asset('images/team/trung.jpg');
@endphp
@extends('news.main')

@section('content')
    
        @include('news.block.breadcrumb1', ['item' => ['name' => 'Về chúng tôi']])
    
    <!-- About Us Area End Here -->
    <!-- History Area Start Here -->
    <div class="our-history-area gray-bg pt-5 mt-text-3">
        <div class="our-history-area">
            <div class="container custom-area">
                <div class="row">
                    <!--Section Title Start-->
                    <div class="col-12 col-custom">
                        <div class="section-title text-center mb-30">
                            <span class="section-title-1">A little story about us</span>
                            <h2 class="section-title-large">Our History</h2>
                        </div>
                    </div>
                    <!--Section Title End-->
                </div>
                <div class="row">
                    <div class="col-lg-8 ml-auto mr-auto">
                        <div class="history-area-content text-center border-0">
                            {!!$itemFooter['story']!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature History Area End Here -->
    <!-- Team Member Area Start Here -->
    <div class="team-member-wrapper mt-text-3">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <div class="section-title text-center">
                        <span class="section-title-1">The guys behind the curtains</span>
                        <h2 class="section-title-2">a team of highly-skilled experts</h2>
                    </div>
                </div>
            </div>
            <div class="row ht-team-member-style-two pt-40">
                <div class="col-lg-4 col-md-4 col-custom">
                    <div class="grid-item">
                        <div class="ht-team-member">
                            <div class="team-image">
                                <img class="img-fluid" style="height: 430px" src="{{asset('news/images/team/van.jpg')}}" alt="">
                                <div class="social-networks">
                                    <div class="inner">
                                        <a href="#"><i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#"><i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#"><i class="fa fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-info text-center">
                                <h5 class="name">Khánh vân </h5>
                                <div class="position">Marketing</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-custom">
                    <div class="grid-item">
                        <div class="ht-team-member">
                            <div class="team-image">
                                <img class="img-fluid" style="height: 430px" src="{{asset('news/images/team/trung.jpg')}}" alt="">
                                <div class="social-networks">
                                    <div class="inner">
                                        <a href="#"><i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#"><i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#"><i class="fa fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-info text-center">
                                <h5 class="name">Hoàng Trung </h5>
                                <div class="position">Dev</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-custom">
                    <div class="grid-item">
                        <div class="ht-team-member">
                            <div class="team-image">
                                <img class="img-fluid" style="height: 430px" src="{{asset('news/images/team/bong.jpg')}}" alt="">
                                <div class="social-networks">
                                    <div class="inner">
                                        <a href="#"><i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#"><i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#"><i class="fa fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-info text-center">
                                <h5 class="name">Lê Bống </h5>
                                <div class="position">Seller</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Member Area End Here -->
    <!-- Brand Logo Area Start Here -->
    <div class="brand-logo-area gray-bg pt-text-3 pb-text-4 mt-text-2">
        <div class="container custom-area">
            <div class="row">
                <div class="col-12 col-custom">
                    <div class="brand-logo-carousel swiper-container intro11-carousel-wrap arrow-style-3">
                        <div class="swiper-wrapper">
                            <div class="single-brand swiper-slide">
                                <a href="#">
                                    <img src="{{asset('news/images/brand/1.png')}}" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="single-brand swiper-slide">
                                <a href="#">
                                    <img src="{{asset('news/images/brand/2.png')}}" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="single-brand swiper-slide">
                                <a href="#">
                                    <img src="{{asset('news/images/brand/3.png')}}" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="single-brand swiper-slide">
                                <a href="#">
                                    <img src="{{asset('news/images/brand/4.png')}}" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="single-brand swiper-slide">
                                <a href="#">
                                    <img src="{{asset('news/images/brand/5.png')}}" alt="Brand Logo">
                                </a>
                            </div>
                        </div>
                        <!-- Slider Navigation -->
                        <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
                        <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Area End Here -->
@endsection