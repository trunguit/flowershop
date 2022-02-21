<div class="posts">
    <div class="row" id="posts-content">
        @foreach ($items as $item)
            @php
                $name = $item['name'];
                $thumb = $item['thumb'];
                $link = $item['link'];
                $date = $item['pubDate'];
                $description = $item['description']
            @endphp
            <div class="col-12 col-md-6 col-custom mb-30">
                <div class="blog-lst">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a class="d-block" href="{{$link}}">
                                <img src="{!!$thumb!!}" alt="Blog Image" class="w-100">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-text">
                                <h4><a href="{{$link}}">{{$name}}</a></h4>
                                <div class="blog-post-info">
                                   
                                    <span>{{$date}}</span>
                                </div>
                                <p>{!!$description!!}</p>
                                <a href="{{$link}}" class="readmore">Đọc thêm <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>