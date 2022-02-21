@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttributes = config('zvn.template.form_input');
    $formCKEditorAttributes = config('zvn.template.form_ckeditor');
    $formLabelAttributes = config('zvn.template.form_label');


   
    $elements = [
       
    
        [
            'label'     => Form::label('story', 'Story', $formLabelAttributes),
            'element'   => Form::textarea('story', $item['story'] ?? '', $formCKEditorAttributes)
        ],
        [
            'label'     => Form::label('min', 'Giá tiền nhỏ nhất', $formLabelAttributes),
            'element'   => Form::text('min', $item['min'] ?? '', $formInputAttributes)
        ],[
            'label'     => Form::label('max', 'Giá tiền lớn nhất', $formLabelAttributes),
            'element'   => Form::text('max', $item['max'] ?? '', $formInputAttributes)
        ],
        [
            'label'     => Form::label('range', 'Khoảng tìm', $formLabelAttributes),
            'element'   => Form::text('range', $item['range'] ?? '', $formInputAttributes)
        ],
        [
            'element'   => Form::submit('Lưu', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]
    ]
@endphp

<div class="x_panel">
    <div class="x_content">
        {!! Form::open([
            'url' => route("$controllerName/page_setting"), 
            'method' => 'POST', 
            'class' => 'form-horizontal form-label-left',
            'files' => true,
            'id' => 'main-form'
        ]) !!}
            {!! FormTemplate::show($elements) !!}
        {!! Form::close() !!}
    </div>
</div>

