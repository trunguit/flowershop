@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr        = config('zvn.template.form_input');
    $formInputAttrMoney   = config('zvn.template.form_input');
    $formInputAttrPercent = config('zvn.template.form_input');
    $formLabelAttr        = config('zvn.template.form_label');
    $formCkeditor         = config('zvn.template.form_ckeditor');
    $class                = 'form-control col-md-10 col-xs-12';
    $arrType = [];
    $statusValue     = ['active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $inputHiddenID   = Form::hidden('id', @$item['id'] );
    $inputHiddenTask = Form::hidden('task', 'add-item');
    $typeValue = config('zvn.template.config');
    foreach($typeValue as $key =>$value){
        $arrType[$key] = $value['name'];
    }


    $inputOrdering = '<input type="number" name="ordering" 
    class="'.$class.'" value="'.@$item['ordering'].'" min="1"/>';
    
    $elements = [[
            'label'   => Form::label('name', 'Name', $formLabelAttr),
            'element' => Form::text('name', $item['name'], $formInputAttr ),
            
        ],[
            'label'   => Form::label('slug', 'Slug', $formLabelAttr),
            'element' => Form::text('slug', $item['slug'],  $formInputAttr ),
            
        ],[
            'label'   => Form::label('category_id', 'Category', $formLabelAttr),
            'element' => Form::select('category_id', $itemsCategory, @$item['category_id'],  $formInputAttr),
            
        ],[
            'label'   => Form::label('type', 'Loại sản phẩm', $formLabelAttr),
            'element' => Form::select('type', $arrType, @$item['type'],  $formInputAttr),
            
        ],[
            'label'   => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, @$item['status'],  $formInputAttr),
            
        ],[
            'label'   => Form::label('price_default', 'Giá Gốc ', $formLabelAttr),
            'element' => Form::text('price_default', @$item['price_default'], $formInputAttrMoney ),
            
        ],[
            'label'   => Form::label('price_sale', 'Giá Khuyến mãi ', $formLabelAttr),
            'element' => Form::text('price_sale', @$item['price_sale'], $formInputAttrMoney ),
            
        ],[
            'label'   => Form::label('ordering', 'Ordering', $formLabelAttr),
            'element' => $inputOrdering,
            
        ],[
            'label'   => Form::label('description', 'Chi tiết sản phẩm', $formLabelAttr),
            'element' => Form::textArea('description', @$item['description'],  $formCkeditor ),
            
        ],[
            'label'   => Form::label('short_description', 'Mô tả ngắn', $formLabelAttr),
            'element' => Form::textArea('short_description', @$item['short_description'],  $formCkeditor ),
            
        ],[
            'label'   => Form::label('', 'Hình ảnh sản phẩm', $formLabelAttr),
            'element' => '<div class="needsclick dropzone" id="document-dropzone"></div>',
            
        ]
        ,[
            'element' => $inputHiddenID . $inputHiddenTask . Form::submit('Save', [
                'class' => 'btn btn-danger'
            ]),
            'type'    => "btn-submit"
    ]];
@endphp


<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Thông tin cơ bản'])
        <div class="x_content">
            {{ Form::open([
                'method'         => 'POST', 
                'url'            => route("$controllerName/save"),
                'accept-charset' => 'UTF-8',
                'enctype'        => 'multipart/form-data',
                'class'          => 'form-horizontal form-label-left',
                'id'             => 'main-form' ])  }}
                {!! FormTemplate::show($elements)  !!}
            {{ Form::close() }}
        </div>
    </div>
</div>
