@extends('news.main')
@section('content')
@php
    use App\Models\CategoryModel ;
    use App\Helpers\URL;
    $categoryModel = new CategoryModel();
    $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items']);
    
@endphp
<div class="blog-area-wrapper">
    <!-- Breadcrumb Area Start Here -->
    @include('news.block.breadcrumb_article', ['item' => $itemArticle])
    <!-- Breadcrumb Area End Here -->
    <!-- Blog Main Area Start Here -->
    @php
        $thumb=  asset('images/article/' . $itemArticle['thumb']);
    @endphp
    <div class="blog-main-area">
        <div class="container container-default custom-area">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-12 col-custom widget-mt">
                    <!-- Blog Details wrapper Area Start -->
                    <div class="blog-post-details">
                        <figure class="blog-post-thumb mb-5">
                            <img src="{!!$thumb!!}" alt="Blog Image">
                        </figure>
                        <section class="blog-post-wrapper product-summery">
                            <div class="section-content section-title">
                                <h2 class="section-title-2 mb-3">{!!$itemArticle['name']!!}</h2>
                                <p class="mb-4">{!!$itemArticle['content']!!}</p>
                            </div>
                            <div class="share-article">
                                <span class="left-side">
                            <a href="#"> <i class="fa fa-long-arrow-left"></i> Older Post</a>
                        </span>
                                <h6 class="text-uppercase">Share this article</h6>
                                <span class="right-side">
                        <a href="#">Newer Post <i class="fa fa-long-arrow-right"></i></a>
                        </span>
                            </div>
                            <div class="social-share">
                                <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                                <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                                <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                                <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                            </div>
                            @include('news.templates.comment',['itemsComment'=>$itemsComment])  
                        </section>
                    </div>
                    <!-- Blog Details Wrapper Area End -->
                    <!-- Blog Comments Area Start Here -->
                    @include('news.templates.reply')  
                    <!-- Blog Comments Area End Here -->
                </div>
                @include('news.partials.left-side-bar-article',['items'=>$itemsCategory,'itemsProductNew'=>$itemsProductNew])  
            </div>
        </div>
    </div>
    <!-- Blog Main Area End Here -->
</div>
@endsection