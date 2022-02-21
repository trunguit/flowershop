@extends('news.main')

@section('content')
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">FAQ</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Faq</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@if (!empty(@itemQa))
@php
    $id = 0;
@endphp
<div class="faq-area">
    <!-- Faq Content Start  -->
    <div class="faq_content_area mt-text-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="faq_content_wrapper">
                        <h4>Below are frequently asked questions, you may find the answer for yourself</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id erat sagittis, faucibus metus malesuada, eleifend turpis. Mauris semper augue id nisl aliquet, a porta lectus mattis. Nulla at tortor augue. In eget enim diam. Donec gravida tortor sem, ac fermentum nibh rutrum sit amet. Nulla convallis mauris vitae congue consequat. Donec interdum nunc purus, vitae vulputate arcu fringilla quis. Vivamus iaculis euismod dui.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Faq Content End -->
    <!--Accordion area-->
    <div class="accordion_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="accordion" class="card__accordion">
                        @foreach ($itemQa as $key => $item)
                        @php
                        $id = $key+1;
                        @endphp
                        
                        <div class="card card_dipult">
                            <div class="card-header card_accor" id="heading{!!$id!!}">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{!!$id!!}" aria-expanded="true" aria-controls="collapse{!!$id!!}">{{$item['question']}}<i class="fa fa-plus"></i><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <div id="collapse{!!$id!!}" class="collapse" aria-labelledby="heading{!!$id!!}" data-parent="#accordion">
                                <div class="card-body">
                                    <p>{!!$item['answer']!!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Accordion area end-->
</div>

@endif

@endsection