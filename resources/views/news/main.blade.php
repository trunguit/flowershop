@php ob_start() @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    @include('news.elements.head')
    
</head>
<body>

    <div id="preloader">
        <div class="preloader">
            <div class="spinner-block">
                <h1 class="spinner spinner-3 mb-0">.</h1>
            </div>
        </div>
    </div>
	@include('news.elements.header')
    @yield('content')

	@include('news.elements.footer')
{{-- </div> --}}

@include('news.elements.script')
</body>
</html>
@php
    $content = ob_get_clean();
    echo \App\Libs\TinyMinify\TinyMinify::html($content, $options = [
        'collapse_whitespace' => true,
        'collapse_json_lt' => true, // WARNING - EXPERIMENTAL FEATURE
    ]);
@endphp