@php
    use App\Helpers\Form as FormTemplate;
        use App\Helpers\Template;

        $formInputAttr = config('zvn.template.form_input');
        $formInputSlug = config('zvn.template.form_slug');
        $formEditor = config('zvn.template.form_ckeditor');
        $formLabelAttr = config('zvn.template.form_label');

        $name = $slug = $meta_title = $meta_description = $meta_keyword = $description = $content = '';

        $elementsInfo = [];
            if(!empty($item)){
                $name        = @$item->name;
                $slug        = @$item->slug;
                $description = @$item->description;
                $content     = @$item->content;
                // $meta_title  = @$item->meta_title;
                // $meta_keyword = @$item->meta_keyword;
                // $meta_description = @$item->meta_description;
            }
            $elements = [
                [
                    'label'   => Form::label('name', 'Tên', $formLabelAttr),
                    'element' => Form::text('name', $name, $formInputSlug),
                ],
               
                [
                    'label'   => Form::label('description', 'Mô tả ngắn', $formLabelAttr),
                    'element' => Form::textarea('description', $description, $formInputAttr),
                ],
                [
                    'label'   => Form::label('content', 'Chi tiết sản phẩm', $formLabelAttr),
                    'element' => Form::textarea('content', $content, $formEditor),
                ],
                
            ];
@endphp

<div class="x_panel">
    @include ('admin.templates.x_title', ['title' => "Thông tin"])
    <div class="x_content">
        <ul id="infoTab" role="tablist">
            {!! FormTemplate::show($elements) !!}
        </ul>
    </div>
</div>
