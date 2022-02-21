@php
    use App\Helpers\URL;
    
@endphp


   
<div class="breadcrumb-area gray-bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-content">
                        <div class="home_title" style="font-size: 36px">{!! $item['name'] !!}</div>
                        <div class="breadcrumbs">
                            <ul class="d-flex flex-row align-items-start justify-content-start">
                                <li><a href="{!! route('home')!!}">Trang chủ</a></li>
                                @foreach ($breadcrumbs as $item)
                                    <li><a href="{!! URL::linkCategory($item['id'], $item['name']) !!}">{!! $item['name'] !!}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
