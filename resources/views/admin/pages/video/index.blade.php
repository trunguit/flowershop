@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\VideoModel ;

    $videoModel = new VideoModel();
    $item  = $videoModel->getItem( null , ['task' => 'get-item']);    
    // echo '<pre>';
    // print_r($item);
    // echo '</pre>';
    // die();
    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $elements = [
        [
            'label'   => Form::label('link', 'Playlist Link', $formLabelAttr),
            'element' => Form::text('link', @$item['link'], $formInputAttr )
        ],[
            'element' => Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp 

@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false , 'hidden' => true])
    @include ('admin.templates.zvn_notify')
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
    @if(!empty($item->link))
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('admin.templates.x_title', ['title' => 'Playlist Video '])
                    @include('admin.pages.video.list' , ['link'  => $item->link])
                </div>
            </div>
        </div>
    @endif
@endsection



