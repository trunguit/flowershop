@php
    $class = 'background-color: #f1f1f1;
    border-radius: 3px;
    color: #242424;
    display: inline-block;
    line-height: 1;
    padding: 11px 13px;';
@endphp
@if ($paginator->hasPages())
<ul>
    @if ($paginator->onFirstPage())
            <li class=" disabled"><span>&laquo;</span></li>
        @else
            <li><a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
    @endif
    @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class=" disabled"><span >{{ $element }}</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="current"><span >{{ $page }}</span></li>
                    @else
                        <li class=""><a class=""  href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
    @endforeach
    @if ($paginator->hasMorePages())
            <li class=""><a class="" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class=" disabled"><span>&raquo;</span></li>
    @endif
</ul>
@endif
