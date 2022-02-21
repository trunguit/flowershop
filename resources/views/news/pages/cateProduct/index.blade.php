
@php
use App\Models\SettingModel ;
$model = new SettingModel();
$settingPage = $model->listItems(null, ['task'   => 'news-list-items-page']);
$url = $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    if(isset($url_components['query'])){
        parse_str($url_components['query'], $params);
    }
   
$filt_price = '';
$search = '';
if(!empty($params['s'])){
    $search = $params['s'];
}
if(!empty($params['p'])){
    $filt_price = $params['p'];
}

    if(isset($itemCateProduct)){
        $thumb        = asset('images/' . $itemCateProduct['thumb']);
        $breadcrum    = $itemCateProduct['name'];
        $items =     $itemInCategory;
    }else {
        $breadcrum = 'Tất cả sản phẩm';
        $items = $allItemProduct;
        $thumb        = asset('news/img/default.jpg');
    }
    $formInputAttributes = config('zvn.template.form_input_sort');
    $itemSort = config('zvn.template.sort');
    
@endphp
@extends('news.main')

@section('content')

    @include('news.block.breadcrumb1', ['item' => ['name' =>$breadcrum]])
    <div class="shop-main-area">
        <input type="hidden"  id="min" value="{{$settingPage['min']}}" >
        <input type="hidden"  id="max" value="{{$settingPage['max']}}" >
        <input type="hidden"  id="range" value="{{$settingPage['range']}}" >
        <div class="container container-default custom-area">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-12 col-custom widget-mt">
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper mb-30">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-3" title="Grid"><i class="fa fa-th"></i></button>
                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i class="fa fa-th-list"></i></button>
                        </div>
                      
                            <div class="shop-select">
                                {{ Form::select('filter_sort',  $itemSort, request()->get('filter_sort', 'default') , $formInputAttributes + ['data-url' => '']) }}
                            </div>
                           
                    </div>
                    <!--shop toolbar end-->
                    <!-- Shop Wrapper Start -->
                    <div class="row shop_wrapper grid_3">
                        @foreach ($items as $item)
                             @include('news.pages.cateProduct.child-index.product',['item'=>$item])
                        @endforeach
               
            </div>
            <!-- Shop Wrapper End -->
            <!-- Bottom Toolbar Start -->
            @if (count($items) > 0)
            <div class="row">
                <div class="col-sm-12 col-custom">
                    <div class="toolbar-bottom">
                    @include('news.templates.pagination')
                </div>
            </div>
        </div>
            @endif
            
                       
                       
                       
                   
            <!-- Bottom Toolbar End -->
        </div>
        @include('news.pages.cateProduct.child-index.side_bar')
    </div>
    </div>
</div>
    @include('news.pages.home.child-index.modal')  
@endsection