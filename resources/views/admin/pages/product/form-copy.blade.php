@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template as Template;

    $formInputAttr = config('zvn.template.form_input');
    $formInputAttrCkEditor = ['class' => $formInputAttr['class'].' ckeditor', 'id' => 'ckeditor'];
    $formLabelAttr = config('zvn.template.form_label');
    $category = ['default' => '-- Chọn danh mục --'] + $cateProduct;

    $submit = [
        [
            'element'  => Form::submit('Lưu', ['class'=>'btn btn-success']),
            'type'      => "btn-submit"
        ],
    ];
    // $pageTitle = 'Quản lý ' . ucfirst(config('zvn.template.header')[$controllerName]);
@endphp
@extends('admin.main')
@section('content')
    {!! Form::open([
               'method'  => 'POST',
               'url'     => route("$controllerName/save"),
               'enctype' => 'multipart/form-data',
               'class'   => 'form-horizontal form-label-left',
               'id'      => 'category-form'
    ]) !!}

    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            {{-- <h3>{{  $pageTitle }}</h3> --}}
        </div>
        <div class="zvn-add-new pull-right">
            {!! sprintf('<a href="%s" class="btn btn-success"><i class="fa fa-arrow-left"></i> Quay về</a>', route($controllerName)) !!}
        </div>
    </div>

    @include ('admin.templates.error')
    @include ('admin.templates.zvn_notify')
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-8">
            @include('admin.pages.product.form-info', ['item' => @$item])
            @include('admin.pages.product.form-image-dropzone', ['item' => @$item])
        </div>
        <div class="col-md-4 col-sm-4 col-sm-4">
            @include('admin.pages.product.form-category', ['item' => @$item])
            @include('admin.pages.product.form-price', ['item' => @$item])
            @include('admin.pages.product.form-config', ['item' => @$item])
        </div>
    </div>
    {!! Form::hidden ('id', @$item['id']) !!}
    {!! FormTemplate::show($submit) !!}
    {!! Form::close() !!}

    <style>
        .cke_contents {
            height: 500px !important;
        }
    </style>
@endsection

