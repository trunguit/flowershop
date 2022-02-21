@extends('news.main')
@section('content')

   
    <div class="content_container">
        <div class="container">
            <div class="row">

                <!-- Main Content -->
                <div class="col-lg-9">
                    <div class="main_content">
                        <h3>Bạn đã đặt hàng thành công , chúng tôi sẽ chuyển hoa cho bạn trong thời gian sớm nhất <a style="color: red" href="{{route('home')}}">Click </a> vào đây để trở về trang chủ </h3>
                       
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <!-- Latest Posts -->
                        @include ('news.block.latest_posts', ['items' => $itemsLatest])

                       
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection