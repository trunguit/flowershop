@php
    $thumb        = asset('images/' . $itemCateProduct['thumb']);
@endphp
@extends('news.main')

@section('content')
<div class="section-category">
    @include('news.block.breadcrumb1', ['item' => ['name' =>$itemCateProduct['name']]])
    <div class="shop-page-area pt-75 pb-75">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="banner-area pb-30">
                        {{-- <a href="product-details.html"><img alt="" height="200px" width="870px" src="{{$thumb}}"></a> --}}
                    </div>
                @include('news.pages.cateProduct.child-index.product','items'=>$allItemProduct)
                </div>
                @include('news.pages.cateProduct.child-index.side_bar')
            </div>
        </div>
    </div>
    @include('news.pages.home.child-index.modal')  
@endsection