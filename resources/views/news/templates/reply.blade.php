{{--  @php
   
@endphp
<div class="blog-reply-wrapper mt-50">
    @include('news.templates.notify')
    <h4 class="blog-dec-title">VIẾT BÌNH LUẬN</h4>
    <form action="{{ route('article/post-comment') }}" id="comment-form" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="leave-form">
                    <input type="text" placeholder="Tên của bạn" id="name" name="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="leave-form">
                    <input type="email" placeholder="Email của bạn" id="email" name="email">
                </div>
            </div>
            <input type="hidden" id="article_id" name="article_id" value="{{$itemArticle['id']}}">
            <div class="col-md-12">
                <div class="text-leave">
                    <textarea placeholder="Bình luận" id="content" name="content"></textarea>
                    <input type="submit" value="Gửi bình luận">
                </div>
            </div>
        </div>
    </form>
</div>  --}}
<form action="{{ route('article/post-comment') }}" method="POST">
    @csrf
    <div class="comment-box">
        @include('news.templates.notify')
        <h3>Để lại bình luận</h3>
        <div class="row">
            <div class="col-12 col-custom">
                <div class="input-item mt-4 mb-4">
                    <textarea cols="30" rows="5" name="content" class="border rounded-0 w-100 custom-textarea input-area" placeholder="Lời nhắn"></textarea>
                </div>
            </div>
            <input type="hidden" id="article_id" name="article_id" value="{{$itemArticle['id']}}">
            <div class="col-md-6 col-custom">
                <div class="input-item mb-4">
                    <input class="border rounded-0 w-100 input-area name" type="text" placeholder="Tên">
                </div>
            </div>
            <div class="col-md-6 col-custom">
                <div class="input-item mb-4">
                    <input class="border rounded-0 w-100 input-area email" type="text" placeholder="Email">
                </div>
            </div>
            <div class="col-12 col-custom mt-40">
                <button type="submit" class="btn flosun-button primary-btn rounded-0 w-100">Gửi bình luận</button>
            </div>
        </div>
    </div>
</form>