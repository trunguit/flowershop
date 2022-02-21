
@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use Illuminate\Support\Str;

   
    $formInputAttr      = config('zvn.template.form_input');

    $formInputAttrCode  = config('zvn.template.form_input_code');
    $formLabelAttr      = config('zvn.template.form_label');
    $itemCode           = isset($item['id']) ? $item['code']   : Str::random(10);
    
    $changeCode         = '<a href="#" class="btn btn-primary" id="change-code" style="margin-left: 0.3vw"><span class="fa fa-undo"></span> Thay đổi</a>';
    $statusValue        = ['default' => 'Chọn trạng thái',    'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $typeValue          = ['default' => 'Chọn kiểu giảm giá', 'percent'=> config('zvn.template.coupon.percent.name'), 'direct' => config('zvn.template.coupon.direct.name')];
    $inputHiddenID      = Form::hidden('id', @$item['id']);
    // $dataURL            = route($controllerName .'/coupon', ['coupon' => 'new_value']) ;        ;  
    $elements = [
        [
            'label'   => Form::label('code', 'Mã', $formLabelAttr),
            'element' => Form::text('code', @$itemCode  , $formInputAttrCode) . $changeCode,
        ],[
            'label'   => Form::label('type', 'Kiểu giảm giá', $formLabelAttr),
           
            'element' => Form::select('type_coupon', $typeValue ,@$item['type_coupon'] , $formInputAttr )
        ],[
            'label'   => Form::label('value', 'Giá trị', $formLabelAttr),
            'element' => Form::text('value' ,@$item['value'],$formInputAttr  )
        ],[
            'label'   => Form::label('price_start', 'Giá trị đơn hàng thấp nhất', $formLabelAttr),
            'element' => Form::text('price_start' , @$item['price_start'], $formInputAttr) 
        ],[
            'label'   => Form::label('total_code', 'Tổng số mã', $formLabelAttr),
            'element' => Form::text('total', @$item['total'], $formInputAttr) 
        ],[
            'label'   => Form::label('date_start', 'Ngày bắt đầu (M-D-Y)', $formLabelAttr),
            'element' => Form::date('date_start', @$item['date_start'], $formInputAttr) 
        ],[
            'label'   => Form::label('date_end', 'Ngày kết thúc (M-D-Y)', $formLabelAttr),
            'element' => Form::date('date_end', @$item['date_end'], $formInputAttr) 
        ],[
            'label'   => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue ,@$item['status'],$formInputAttr  )
        ],[
            'element' => $inputHiddenID . Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp

@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false])
    @include ('admin.templates.error')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Form'])
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
    </div>
@endsection
