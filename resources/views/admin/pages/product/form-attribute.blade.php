@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template as Template;

    $formInputAttr = config('zvn.template.form_input');
    $formInputCurrency = config('zvn.template.form_currency');
    $formLabelAttr = config('zvn.template.form_label');
    $statusValue     = ['default' => 'Tùy chọn', 'active' => 'Kích hoạt', 'inactive' => 'Chưa kích hoạt'];
    $category = ['default' => '-- Chọn danh mục --'] + $cateProduct;

    $elements = [
        [
            'label'   => Form::label('price_default', 'Giá sản phẩm', $formLabelAttr),
            'element' => Form::text('price_default', @$item['price_default'], $formInputCurrency),
        ],
        [
            'label'   => Form::label('price_sale', 'Giá khuyến mãi', $formLabelAttr),
            'element' => Form::text('price_sale', @$item['price_sale'], $formInputCurrency),
        ],    
    ];


@endphp
<div class="x_panel">
    <div class="x_title">
        <h2>Thuộc tính</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        {!! FormTemplate::show($elements) !!}
    </div>
</div>
