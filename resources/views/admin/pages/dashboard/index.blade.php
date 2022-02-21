
@php
    use App\Helpers\Template as Template;
    $arrBox = [
        ['name' => 'Slider', 'total' => $itemSliderCount, 'link' => route('slider')],
        // ['name' => 'Người dùng', 'total' => $itemUserCount, 'link' => route('user')],
        ['name' => 'Danh mục bài viết', 'total' => $itemCategoryCount, 'link' => route('category')],
        ['name' => 'Bài viết', 'total' => $itemArticleCount, 'link' => route('article')],
        ['name' => 'Sản phẩm', 'total' => $itemProductCount, 'link' => route('product')],
        ['name' => 'Danh mục sản phẩm', 'total' => $itemCateProductCount, 'link' => route('cateProduct')],
        ['name' => 'Đơn hàng', 'total' => $itemCartCount, 'link' => route('cart')],
        ['name' => 'Câu hỏi', 'total' => $itemQaCount, 'link' => route('qa')],
        ['name' => 'Câu hỏi', 'total' => $itemQaCount, 'link' => route('qa')],
        ['name' => 'Liên hệ', 'total' => $itemContactCount, 'link' => route('contact')],
        ['name' => 'Review', 'total' => $itemReviewCount, 'link' => route('review')],
    ];

    $xhtmlBoxDashboard = '';

    foreach ($arrBox as $box) {
        $xhtmlBoxDashboard .= sprintf('<div class="col-md-3 col-sm-3 col-xs-3">%s</div>',  Template::showBoxDashboard($box));
    }
    
@endphp

@extends('admin.main')
@section('content')
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Dashboard</h3>
        </div>
    </div>
    <div class="row">
        {!! $xhtmlBoxDashboard !!}
    </div>
 
    @include('admin.pages.dashboard.cart',['items'=>$itemCart])
@endsection