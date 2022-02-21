@php
use App\Helpers\URL;
use App\Helpers\Template;
@endphp
@if (!empty($items))
<div class="blog-post-area mt-text-3">
    <div class="container custom-area">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">From The Blogs</span>
                    <h3 class="section-title-3">Our Latest Posts</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row">
            @foreach ($items as $item)
                @php
                    $name = $item['name'];
                    $thumb = asset('images/article/' . $item['thumb']);
                    $link = URL::linkArticle($item['id'],$item['name']);
                    $descripton = substr($item['content'],0,100);
                    $by = $item['created_by'];
                    $time = Template::showDatetimeFrontend($item['created']);
                @endphp
                <div class="col-12 col-md-4 col-lg-4 col-custom mb-30">
                    <div class="blog-lst">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a class="d-block" href="{{$link}}">
                                    <img src="{{$thumb}}" style="height: 240px" alt="Blog Image" class="w-100">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-text">
                                    <h4><a href="{{$link}}">{{$name}}</a></h4>
                                    <div class="blog-post-info">
                                        <span><a href="{{$link}}">{{$by}}</a></span>
                                        <span>{{$time}}</span>
                                    </div>
                                    <p>{!!$descripton!!}</p>
                                    <a href="{{$link}}" class="readmore">Đọc thêm <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
           
           
        </div>
    </div>
</div>
@endif
