{{-- <nav>
    <ul>                                  
        <li class="top-hover"><a href="blog-left-sidebar.html">blog</a>
            <ul class="submenu">
                <li><a href="blog-masonry.html">Blog Masonry</a></li>
                <li><a href="#">Blog Standard <span><i class="ion-ios-arrow-right"></i></span></a>
                    <ul class="lavel-menu">
                        <li><a href="blog-left-sidebar.html">left sidebar</a></li>
                        <li><a href="blog-right-sidebar.html">right sidebar</a></li>
                        <li><a href="blog-no-sidebar.html">no sidebar</a></li>
                    </ul>
                </li>
                <li><a href="#">Post Types <span><i class="ion-ios-arrow-right"></i></span> </a>
                    <ul class="lavel-menu">
                        <li><a href="blog-details-standerd.html">Standard post</a></li>
                        <li><a href="blog-details-audio.html">audio post</a></li>
                        <li><a href="blog-details-video.html">video post</a></li>
                        <li><a href="blog-details-gallery.html">gallery post</a></li>
                        <li><a href="blog-details-link.html">link post</a></li>
                        <li><a href="blog-details-quote.html">quote post</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        
    </ul>
</nav> --}}
@php 
    use App\Models\CategoryModel as CategoryModel;
    use App\Models\MenuModel;
    use App\Helpers\URL;
    use App\Helpers\Template;

    $menuModel = new MenuModel();
    $itemsMenu = $menuModel->listItems(null, ['task' => 'news-list-items']);

    $xhtmlMenu = '';
    $xhtmlMenuMobile = '';

    if (count($itemsMenu) > 0) {
        
        $xhtmlMenu = '<nav><ul>';
        $xhtmlMenuMobile = '<nav class="menu_nav"><ul class="menu_mm">';

            foreach ($itemsMenu as $item) {
            $link = $item['link'];
            $target = config('zvn.template.type_link.' . $item['type_link'] . '.target');

            switch ($item['type_menu']) {
                case 'link':
                    $xhtmlMenu .= sprintf('<li><a href="%s" target="%s">%s</a></li>', $link, $target, $item['name']);
                    $xhtmlMenuMobile .= sprintf('<li class="menu_mm"><a href="%s" target="%s">%s</a></li>', $link, $target, $item['name']);
                    break;
                case 'category_article':
                    $xhtmlMenu .= sprintf('<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" data-name="category_article">%s <span class="caret"></span></a>', $item['name']);
                    $xhtmlMenuMobile .= sprintf('<li class="dropdown menu_mm"><a class="dropdown-toggle" data-toggle="dropdown" href="#">%s <span class="caret"></span></a>', $item['name']);

                    $categoryModel = new CategoryModel();
                    $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items']);

                    if (count($itemsCategory) > 0) {
                        $xhtmlMenu .= '<ul class="dropdown-menu">';
                        $xhtmlMenuMobile .= '<ul class="dropdown-menu">';

                        Template::showNestedMenu($itemsCategory, $xhtmlMenu);

                        $xhtmlMenu .= '</ul>';
                        $xhtmlMenuMobile .= '</ul>';
                    }

                    $xhtmlMenu .= '</li>';
                    $xhtmlMenuMobile .= '</li>';
                    break;
            }
        }

        if (session('userInfo')) {
            $xhtmlMenuUser = sprintf('<li><a href="%s">%s</a></li>', route('auth/logout'), 'Logout');
        }else {
            $xhtmlMenuUser = sprintf('<li><a href="%s">%s</a></li>', route('auth/login'), 'Login');
        }

        $xhtmlMenu .= $xhtmlMenuUser . '</ul></nav>';
        $xhtmlMenuMobile .= $xhtmlMenuUser . '</ul></nav>';
    }

@endphp