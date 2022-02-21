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
            'label'   => Form::label('category_id', 'Danh mục', $formLabelAttr),
            'element' => Form::select('category_id', $category, @$item['category_id'], $formInputAttr),
        ],
        [
            'label'   => Form::label('status', 'Trạng thái', $formLabelAttr),
            'element' => [
                'Kích hoạt'       => Form::radio('status', 'active', ('active' == @$item['status'] || empty(@$item['status']))),
                'Chưa kích hoạt'  => Form::radio('status', 'inactive', ('inactive' == @$item['status'])),
            ],
            'type'    => 'radio'
        ]
    ];


@endphp
<div class="x_panel">
    <div class="x_title">
        <h2>Danh mục</h2>
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
