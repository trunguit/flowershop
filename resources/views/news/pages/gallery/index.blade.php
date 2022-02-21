@extends('news.main')

@section('content')
    <div class="section-category">
        @include('news.block.breadcrumb1', ['item' => ['name' => 'Thư viện hình ảnh']])
        <div class="row">
            @foreach ($images as $image)
            <div class="col-lg-4">
                <a href="{{ asset(config('zvn.path.gallery') . $image->getFilename()) }}" data-fancybox="gallery">
                    <img style="width: 100%;" src="{{ asset(config('zvn.path.gallery') . $image->getFilename()) }}" alt="{{ $image->getFilename() }}" />
                </a>
            </div>
        @endforeach      
        </div>
@endsection