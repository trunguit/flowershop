@php
    use App\Helpers\Template as Template;
    use App\Helpers\URL;
@endphp
 @if (count($itemsArticleNew)>0)

              

<section class="blog-home sec-pdd-90 bg-news zvn-pd zvn-blog-news">
  <div class="container">
     <div class="sec-title text-center">
        <h2>Tin mới nhất</h2>
        <span class="decor">
        <span class="inner"></span>
        </span>
     </div>
     <div class="row">
      @foreach ($itemsArticleNew as $item)
      @php
          $name         = $item['name'];
          $thumb        = asset('images/article/' . $item['thumb']);
         
         
          $linkArticle  = URL::linkArticle($item['id'], $item['name']);
        
         
      @endphp 

        <div class="col-md-3 col-sm-6 col-xs-12">
           <div class="single-blog-post">
              <div class="img-box">
                 <img src="{!!$thumb!!}" alt="" style="height: 155px">
              </div>
              <div class="content-box">
                 <div class="content">
                    <a href="{!!$linkArticle!!}">
                       <h3>{!!$name!!}</h3>
                    </a>
                 </div>
              </div>
           </div>
        </div>
      @endforeach 
     </div>
  </div>
</section>
@endif