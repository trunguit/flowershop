@php
    use App\Helpers\URL;
    
@endphp



    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">{!! $item['name'] !!}</h3>
                        <ul>
                            <li><a href="{!! route('home')!!}">Trang chủ</a></li>
                            <li>{!! $item['name'] !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>