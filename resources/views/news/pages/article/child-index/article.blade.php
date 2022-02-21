
 @php
    use App\Helpers\Template as Template;
    use App\Helpers\URL;
     $thumb        = asset('images/article/' . $item['thumb']);
     $name = $item['name'];
     $created      = Template::showDatetimeFrontend($item['created']);
     $content = $item['content'];
 @endphp

 <div class="col-lg-8 col-xl-9 col-md-8">
    <div class="blog-details-wrapper">
        <div class="single-blog-wrapper">
            <div class="blog-gallery-slider owl-carousel mb-30">
               
                <a href="#"><img alt="" src="{!!$thumb!!}"></a>
                
            </div>
            <div class="blog-content">
                <h2>{!!$name!!} </h2>
                <div class="blog-date-categori">
                    <ul>
                        <li>{!!$created!!}</li>
                        <li>Admin</li>
                    </ul>
                </div>
            </div>
            <p>{!!$content!!}</p>
            
          
           
            
        </div>
        @include('news.templates.comment')
        @include('news.templates.reply')
       
    </div>
</div>