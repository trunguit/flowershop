@php
    use App\Helpers\Template as Template;
    use App\Helpers\URL;
@endphp

<div class="blog-widget mb-45">
    <h4 class="blog-widget-title mb-25">Bài viết mới nhất</h4>
    <div class="blog-recent-post">
        @foreach($itemsLatest as $item) 
            @php
                $name         = $item['name'];
                $thumb        = asset('images/article/' . $item['thumb']);
                $categoryName = $item['category_name'];
                $linkCategory = URL::linkCategory($item['category_id'], $item['category_name']);
                $linkArticle  = URL::linkArticle($item['id'], $item['name']);
                $created      = Template::showDatetimeFrontend($item['created']);
            @endphp

            <!-- Latest Post -->
           

            <div class="recent-post-wrapper mb-25">
                <div class="recent-post-img">
                    <a href="#"><img src="{{ $thumb }}" alt="{{ $name }}"></a>
                </div>
                <div class="recent-post-content">
                    <div class="post_category_small cat_video" ><a style=" color: red " href="{{ $linkCategory }}">{{ $categoryName }}</a></div>
                    <h4><a href="{{ $linkArticle }}">{{ $name }}</a></h4>
                    <span>{{ $created }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>

