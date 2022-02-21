@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template as Template;

   
    // $pageTitle = 'Quản lý ' . ucfirst(config('zvn.template.header')[$controllerName]);
@endphp
@extends('admin.main')
@section('content')
    

 
            @include('admin.pages.product.child-index.form-general')
           
           
        
   
@endsection

