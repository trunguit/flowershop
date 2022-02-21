@php
     use App\Helpers\Template as Template;
    
@endphp
@if (count($itemsComment)>0)
<div class="comment-area-wrapper mt-5">
    <div class="comments-view-area">
        <h3 class="mb-5">{{count($itemsComment)}} Comments</h3>
        @foreach ($itemsComment as $item)
        @php 
        $name = $item['name'];
        $time = Template::showDatetimeFrontend($item['time']);
        
        $content = $item['content'];
    @endphp
        <div class="single-comment-wrap mb-4 d-flex">
            <figure class="author-thumb">
                <a href="#">
                    <img src="{{asset('news/img/blog/blog-comment1.png') }}" alt="">
                </a>
            </figure>
            <div class="comments-info">
                <p class="mb-2">{!! $content!!}</p>
                <div class="comment-footer d-flex justify-content-between">
                    <a href="#" class="author"><strong>{!! $name!!}</strong> - {!! $time!!}</a>
                   
                </div>
            </div>
        </div>
       @endforeach
    </div>
</div>
@endif
