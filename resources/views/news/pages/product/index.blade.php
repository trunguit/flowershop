@extends('news.main')
@section('content')
<div class="section-category">
    @include('news.block.breadcrumb_product',['item'=>$itemProduct])
    @include('news.pages.product.child-index.product')
    @include('news.pages.product.child-index.related')
    @include('news.pages.home.child-index.modal')  
@endsection