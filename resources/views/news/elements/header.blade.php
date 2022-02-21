@php
use App\Helpers\URL;
use App\Helpers\Template;
use App\Models\CateProductModel;
use App\Models\CategoryModel;
$categoryModel = new CategoryModel();
$cateProductModel = new cateProductModel();
$itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items']);
$itemsCateProduct = $cateProductModel->listItems(null, ['task' => 'news-list-items']);
    $totalItem = 0;
   
    if (!empty(Cart::content())){
        $totalItem= Cart::count();
    }
    $totalItemWishlist = 0;
   
    if (!empty(Cart::instance('wishlist')->content())){
        foreach(Cart::instance('wishlist')->content() as $vl) {
         $totalItemWishlist+=1;
        }
     }
    $thumbLogo = asset('images/logo/logo.png');
    $class = "background-color: #E72463;
    border-radius: 50%;
    color: #ffffff;
    display: block;
    font-size: 12px;
    text-align: center;
    line-height: 18px;
    height: 18px;
    width: 18px;
    position: absolute;
    right: -10px;
    top: 25px;";
@endphp
<header class="main-header-area">
    <!-- Main Header Area Start -->
    <div class="main-header header-sticky">
        <div class="container custom-area">
            <div class="row align-items-center">
                <div class="col-lg-2 col-xl-2 col-md-6 col-6 col-custom">
                    <div class="header-logo d-flex align-items-center">
                        <a href="{{route('home')}}">
                            <img class="img-full" src="{{$thumbLogo}}" alt="Header Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-flex justify-content-center col-custom">
                    <nav class="main-nav d-none d-lg-flex">
                        <ul class="nav">
                            <li>
                                <a href="{{route('home')}}">
                                    <span class="menu-text"> Home</span>
                                </a>
                            </li>        
                            <li>
                                <a href="blog-details-fullwidth.html">
                                    <span class="menu-text">Sản phẩm</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-submenu dropdown-hover">
                                    @foreach ($itemsCateProduct as $item)      
                                    @php
                                        $name = $item['name'];
                                        $link  = URL::linkCateProduct($item['id'], $item['name']);
                                    @endphp
                                    
                                    <li><a href="{{$link}}">{{$name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="menu-text">Tin tức</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-submenu dropdown-hover">
                                    <li><a href="{{route('rss/index')}}">Tin tức tổng hợp</a></li>
                                    @foreach ($itemsCategory as $item)      
                                    @php
                                        $name = $item['name'];
                                        $link  = URL::linkCategory($item['id'], $item['name']);
                                    @endphp
                                    
                                    <li><a href="{{$link}}">{{$name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="menu-text">Về chúng tôi</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-submenu dropdown-hover">
                                    <li><a href="{{route('video/index')}}">Thư viện video</a></li>
                                    <li><a href="{{route('gallery/index')}}">Thư viện hình ảnh</a></li>
                                    <li><a href="{{route('about/index')}}">About Us</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('contact/index')}}">
                                    <span class="menu-text">Liên hệ</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-6 col-6 col-custom">
                    <div class="header-right-area main-nav">
                        <ul class="nav">
                            <li class="minicart-wrap">
                                <a href="{{route('cart/index')}}" class="minicart-btn toolbar-btn">
                                    <i class="fa fa-shopping-cart">Giỏ hàng</i>
                                    <span class="cart-item_count">{{$totalItem}}</span>
                                </a>
                            </li>
                            <li class="account-menu-wrap d-none d-lg-flex">
                                <a href="{{route('wishlist/index')}}" class="off-canvas-menu-btn">
                                    <i class="fa fa-heart"></i>
                                    <span style="{{$class}}" class="wishlist-item_count">{{$totalItemWishlist}}</span>
                                </a>
                            </li>
                            <li class="mobile-menu-btn d-lg-none">
                                <a class="off-canvas-btn" href="#">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header Area End -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper" id="mobileMenu">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="fa fa-times"></i>
            </div>
            <div class="off-canvas-inner">
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Search product...">
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- mobile menu start -->
                <div class="mobile-navigation">
                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a href="#">Home</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home Page 1</a></li>
                                    <li><a href="index-2.html">Home Page 2</a></li>
                                    <li><a href="index-3.html">Home Page 3</a></li>
                                    <li><a href="index-4.html">Home Page 4</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Shop</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title has-children"><a href="#">Shop Layouts</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.html">Shop Left Sidebar</a></li>
                                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                            <li><a href="shop-list-left.html">Shop List Left Sidebar</a></li>
                                            <li><a href="shop-list-right.html">Shop List Right Sidebar</a></li>
                                            <li><a href="shop-fullwidth.html">Shop Full Width</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Product Details</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Single Product Details</a></li>
                                            <li><a href="variable-product-details.html">Variable Product Details</a></li>
                                            <li><a href="external-product-details.html">External Product Details</a></li>
                                            <li><a href="gallery-product-details.html">Gallery Product Details</a></li>
                                            <li><a href="countdown-product-details.html">Countdown Product Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Others</a>
                                        <ul class="dropdown">
                                            <li><a href="error404.html">Error 404</a></li>
                                            <li><a href="compare.html">Compare Page</a></li>
                                            <li><a href="cart.html">Cart Page</a></li>
                                            <li><a href="checkout.html">Checkout Page</a></li>
                                            <li><a href="wishlist.html">Wish List Page</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="#">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                    <li><a href="blog-list-fullwidth.html">Blog List Fullwidth</a></li>
                                    <li><a href="blog-grid.html">Blog Grid Page</a></li>
                                    <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                    <li><a href="blog-grid-fullwidth.html">Blog Grid Fullwidth</a></li>
                                    <li><a href="blog-details-sidebar.html">Blog Details Sidebar Page</a></li>
                                    <li><a href="blog-details-fullwidth.html">Blog Details Fullwidth Page</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="frequently-questions.html">FAQ</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="login-register.html">login &amp; register</a></li>
                                </ul>
                            </li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->
                <div class="offcanvas-widget-area">
                    <div class="switcher">
                        <div class="language">
                            <span class="switcher-title">Language: </span>
                            <div class="switcher-menu">
                                <ul>
                                    <li><a href="#">English</a>
                                        <ul class="switcher-dropdown">
                                            <li><a href="#">German</a></li>
                                            <li><a href="#">French</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="currency">
                            <span class="switcher-title">Currency: </span>
                            <div class="switcher-menu">
                                <ul>
                                    <li><a href="#">$ USD</a>
                                        <ul class="switcher-dropdown">
                                            <li><a href="#">€ EUR</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="top-info-wrap text-left text-black">
                        <ul class="address-info">
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="info%40yourdomain.html">(1245) 2456 012</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="info%40yourdomain.html">info@yourdomain.com</a>
                            </li>
                        </ul>
                        <div class="widget-social">
                            <a class="facebook-color-bg" title="Facebook-f" href="#"><i class="fa fa-facebook-f"></i></a>
                            <a class="twitter-color-bg" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="linkedin-color-bg" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                            <a class="youtube-color-bg" title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                            <a class="vimeo-color-bg" title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- off-canvas menu start -->
   
    <!-- off-canvas menu end -->
</header>