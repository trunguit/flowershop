@extends('news.main-home')
@section('content')
@include ('news.block.slider')
@include('news.pages.home.child-index.category',['items'=>$itemsCateProduct]) 
@include('news.pages.home.child-index.featured_product',['items'=>$itemsProductFeatured]) 

@include('news.pages.home.child-index.deal_of_the_day',['items'=>$itemsProductBestseller])

@include('news.pages.home.child-index.about')
@include('news.pages.home.child-index.banner',['items'=>$itemsBanner])
@include('news.pages.home.child-index.feed_back',['items'=>$itemsReview])
@include('news.pages.home.child-index.letter')   
@include('news.pages.home.child-index.new_article',['items'=>$itemsArticleNew])   
@include('news.partials.modal')     
@endsection