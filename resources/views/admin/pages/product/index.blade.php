
@extends('admin.main')
@section('content')
    @php
        use App\Helpers\Template as Template;
        use App\Models\CateProductModel;
        $formInputAttributes = config('zvn.template.form_input');
        $cateProductModel =  new CateProductModel();
        $xhtmlButtonFilter = Template::showButtonFilter($controllerName, $itemsStatusCount, $params['filter']['status'], $params['search']);
        $itemsCategory = $cateProductModel->listItems(null, ['task' => 'admin-list-items-in-select-box-for-product']);
        $category = ['default' => '-- Chọn danh mục --'] + $itemsCategory;
        $xhtmlSelectCategory = Template::showSelectFilter('category_id' , $category, $params['search']['value'], false);
        $xhtmlAreaSeach    = Template::showAreaSearch($controllerName, $params['search']);
        $itemsCategory = $cateProductModel->listItems(null, ['task' => 'admin-list-items-in-select-box-for-product']);
    @endphp

    @include ('admin.templates.page_header', ['pageIndex' => true, 'ordering' => true])
    @include ('admin.templates.zvn_notify')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include ('admin.templates.x_title', ['title' => "Bộ lọc"])
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-4">{!! $xhtmlButtonFilter !!}</div>
                        <div class="col-md-2">{{ Form::select('filter_category', ['all' => 'Tất cả'] + $itemsCategory, request()->get('filter_category', 'all') , $formInputAttributes + ['data-url' => '']) }}</div>
                        <div class="col-md-6">{!! $xhtmlAreaSeach !!}</div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Danh sách'])
                @include('admin.pages.product.list')
            </div>
        </div>
    </div>

    @if (count($items) > 0)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('admin.templates.x_title', ['title' => 'Phân trang'])
                    @include('admin.templates.pagination')
                </div>
            </div>
        </div>
    @endif
@endsection