@php
    use App\Helpers\URL;
    use App\Helpers\Template;
    $linkAllProduct = 'http://proj_flower.com/danh-muc';
   
@endphp

<div class="col-lg-3 col-12 col-custom">
    <!-- Sidebar Widget Start -->
    <aside class="sidebar_widget widget-mt">
        <div class="widget_inner">
            <div class="widget-list widget-mb-1">
                <h3 class="widget-title">Search</h3>
                <div class="search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search_value" value="{{$search}}" placeholder="Search Our Store" aria-label="Search Our Store">
                        <div class="input-group-append">
                            <button class="btn btn-search-home btn-outline-secondary" type="button">
                                <i class="fa fa-search btn-search-home"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-list widget-mb-1">
                <h3 class="widget-title">Categories</h3>
                <div class="sidebar-body">
                    <ul class="sidebar-list">
                        <li><a href="{!!$linkAllProduct!!}">Tất cả sản phẩm</a></li>
                        @foreach ($itemsCateProduct as $item)
                            @php
                                $name = $item['name'];
                                $link  = URL::linkCateProduct($item['id'], $item['name']);
                            @endphp
                            <li><a href="{!!$link!!}">{!!$name!!}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="widget-list widget-mb-1">
                <h3 class="widget-title">Price Filter</h3>
                <!-- Widget Menu Start -->
                <form action="">
                    <div id="slider-range"></div>
                    <button  class="filter-price">Filter</button>
                    <input class="input-filt-price" type="text" style="width: 150px;" value="{!!$filt_price!!}" name="text" id="amount" />
                </form>
                <!-- Widget Menu End -->
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