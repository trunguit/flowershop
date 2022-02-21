@php
use App\Helpers\URL;

@endphp
<div class="col-lg-3 col-12 col-custom">
    <!-- Sidebar Widget Start -->
    <aside class="sidebar_widget widget-mt">
        <div class="widget_inner">
           
            <div class="widget-list widget-mb-1">
                <h3 class="widget-title">Danh mục bài viết</h3>
                <div class="sidebar-body">
                    <ul class="sidebar-list">
                       
                        @foreach ($items as $item)
                            @php
                                $link = URL::linkCategory($item['id'],$item['name']);
                            @endphp
                            <li><a href="{{$link}}">{{$item['name']}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if (!empty($itemsProductNew))
            <div class="widget-list mb-0">
                <h3 class="widget-title">Recent Products</h3>
                <div class="sidebar-body">
                    @foreach ($itemsProductNew as $item)
                    @include('news.pages.cateProduct.child-index.side_bar_product',['item'=>$item])  
                    @endforeach
                </div>
            </div>
            @endif
            
        </div>
    </aside>
    <!-- Sidebar Widget End -->
</div>