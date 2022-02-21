@extends('news.main')

@section('content')
    <div class="section-category">
        @include('news.block.breadcrumb1', ['item' => ['name' => $title]])
        <!-- Content Container -->
        <div class="content_container container_category">
            <div class="container">
                <div class="row">
                    <!-- Main Content -->
                    <div class="col-lg-12">
                        @include('news.pages.rss.child-index.list', ['items' => $items])
                    </div>
                    <!-- Sidebar -->
                   
                </div>
            </div>
        </div>
    </div>
    @include('news.pages.rss.child-index.template_box')
@endsection