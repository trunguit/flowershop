@extends('news.main')
@section('content')

    <!-- Content Container -->
    @include('news.block.breadcrumb1', ['item' => ['name' => 'Error 404']])
    <div class="error-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="error_form">
                        <h1>404</h1>
                        <h2>Opps! PAGE NOT BE FOUND</h2>
                        <p>Sorry but the page you are looking for does not exist, have been<br> removed, name changed or is temporarily unavailable.</p>
                        
                        <a href="{{route('home')}}">Back to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection