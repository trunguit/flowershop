@extends('news.main')
@section('content')

@php
use App\Helpers\URL;
use App\Helpers\Template as Template;
    $name = $itemCategory['name'];
   
   
@endphp

@include('news.block.breadcrumb1', ['item' => ['name' =>$name]])
<div class="blog-main-area">
    <div class="container container-default custom-area">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 col-12 col-custom widget-mt">
                <!-- Shop Wrapper Start -->
                <div class="row">
                    @foreach ($items as $item)
                    @php
                        $name = $item['name'];
                        $thumb        = asset('images/article/' . $item['thumb']);
                        $description = substr($item['content'],1,300);
                        $linkArticle  = URL::linkArticle($item['id'], $item['name']);
                        $created      = Template::showDatetimeFrontend($item['created']);
                     @endphp
                    <div class="col-12 col-md-6 col-custom mb-30">
                        <div class="blog-lst">
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a class="d-block" href="{{$linkArticle}}">
                                        <img src="{!!$thumb!!}" alt="Blog Image" class="w-100">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-text">
                                        <h4><a href="{{$linkArticle}}">{{$name}}</a></h4>
                                        <div class="blog-post-info">
                                            <span><a href="{{$linkArticle}}">By admin</a></span>
                                            <span>{{$created}}</span>
                                        </div>
                                        <p>{!!$description!!}</p>
                                        <a href="{{$linkArticle}}" class="readmore">Đọc thêm <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Shop Wrapper End -->
                <!-- Bottom Toolbar Start -->
                
                <!-- Bottom Toolbar End -->
            </div>
            @include('news.partials.left-side-bar-article',['items'=>$itemsCategory,'itemsLatest'=>$itemsLatest])  
        </div>
    </div>
</div>
@endsection