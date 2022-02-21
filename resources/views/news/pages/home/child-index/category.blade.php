@php
use App\Helpers\URL;
use App\Models\ProductModel;

@endphp

@if (!empty($items))
@php
    $xhtml = [];
@endphp
@foreach ($items as $key => $item)
@php
    $link = URL::linkCateProduct($item['id'],$item['name']);
    $name  = $item['name'];
    $thumb        = asset('images/' . $item['thumb']);
    $xhtml[$key]= '<div class="categories-img mb-30">
        <a href="'.$link.'"><img src="'.$thumb.'" alt="'.$name.'"></a>
        <div class="categories-content">
            <h3>'.$name.'</h3>
        </div>
    </div>';
@endphp
    
@endforeach

<div class="categories-area pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="cat-1 col-md-4 col-sm-12 col-custom">
                {!!$xhtml[0]!!}
            </div>
            <div class="cat-2 col-md-8 col-sm-12 col-custom">
                <div class="row">
                    <div class="cat-3 col-md-7 col-custom">
                        {!!$xhtml[1]!!}
                    </div>
                    <div class="cat-4 col-md-5 col-custom">
                        {!!$xhtml[2]!!}
                    </div>
                    <div class="cat-5 col-md-4 col-custom">
                        {!!$xhtml[3]!!}
                    </div>
                    <div class="cat-6 col-md-8 col-custom">
                        {!!$xhtml[4]!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
