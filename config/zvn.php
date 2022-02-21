<?php

return [
    'url'              => [
        'prefix_admin' => 'admin123',
        'prefix_news'  => '',
    ],
    'format'           => [
        'long_time'    => 'H:m:s d/m/Y',
        'short_time'   => 'd/m/Y',
    ],'status'         =>['pending' => ['name' => 'Chờ xác nhận'],
                            'all'      => ['name' => 'Tất cả', 'class' => 'btn-success'],
                          'confirm' => ['name' => 'Xác nhận'],
                          'delivering' => ['name' => 'Đang giao'],
                          'susscess' => ['name' => 'Hoàn thành'],
                          'default'      => ['name' => 'Chưa xác định', 'class' => 'btn-success'],],

    'template'         => [
        'form_input' => [
            'class' => 'form-control col-md-6 col-xs-12'
        ],
        'form_input_sort' => [
            'class' => 'form-control nice-select w-100'
        ],       
        'header' => [
            'class' => 'form-control col-md-6 col-xs-12'
        ],
        'form_input_tags' => [
            'class' => 'tags form-control col-md-6 col-xs-12'
        ],
        'form_input_code' => [
            'class' => 'form-control col-md-6 col-xs-12',
            'style' => 'width:78%',
        ],
        'form_label' => [
            'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
        ],
        'form_label_edit' => [
            'class' => 'control-label col-md-4 col-sm-3 col-xs-12'
        ],
        'form_ckeditor' => [
            'class' => 'form-control col-md-6 col-xs-12 ckeditor',
            'id' => 'ckeditor'
        ],
        'form_datepicker' => [
            'class' => 'form-control col-md-6 col-xs-12 datepicker',
            'id' => 'ckeditor'
        ],
        'form_multi' => [
            'class' => 'form-control col-md-6 col-xs-12 select-multi',
            'multiple' => true
        ],
        'form_slug' => [
            'class' => 'form-control col-md-6 col-xs-12 slug'
        ],
        'form_currency' => [
            'class' => 'form-control col-md-6 col-xs-12 currency'
        ],
        'coupon' => [
            'percent'   => ['name'=> 'Phần trăm'],
            'direct'     => ['name'=> 'Trực tiếp'],
        ],
        'status'       => [
            'all'      => ['name' => 'Tất cả', 'class' => 'btn-success'],
            'active'   => ['name' => 'Kích hoạt', 'class'      => 'btn-success'],
            'inactive' => ['name' => 'Chưa kích hoạt', 'class' => 'btn-info'],
            'block' => ['name' => 'Bị khóa', 'class' => 'btn-danger'],
            'default'      => ['name' => 'Chưa xác định', 'class' => 'btn-success'],
        ],
        'is_home'  => [
            'yes'    =>  ['name'=> 'Hiển thị', 'class'=> 'btn-primary'],
            'no'     => ['name'=> 'Không hiển thị', 'class'=> 'btn-warning']
        ],
        'config'    => 
             [
                'featured'  =>  ['name'=> 'Sản phẩm nổi bật'],
                'best_seller'  => ['name'=> 'Sản phẩm bán chạy'],
                'normal'  => ['name'=> 'Sản phẩm bình thường']
            ]
        ,
        'display'       => [
            'list'      => ['name'=> 'Danh sách'],
            'grid'      => ['name'=> 'Lưới'],
        ],
        'type' => [
            'featured'   => ['name'=> 'Nổi bật'],
            'normal'     => ['name'=> 'Bình thường'],
        ],'sort' => [
            'default'       =>  'Mặc định',
            'lastest'       =>  'Mới nhất',
            'price_asc'     =>  'Giá tăng dần',
            'price_desc'    =>  'Giá giảm dần',
        ],
        'type_menu' => [
            'link' => ['name' => 'Link'],
            'category_article' => ['name' => 'Danh mục bài viết'],
            'category_product' => ['name' => 'Danh mục sản phẩm'],
        ],
        'type_link' => [
            'new_tab' => ['name' => 'Tab mới', 'target' => '_blank'],
            'current' => ['name' => 'Trang hiện tại', 'target' => '_self'],
        ],'status_cart' => [
            'pending' => ['name' => 'Chờ xác nhận'],
            'confirm' => ['name' => 'Xác nhận'],
            'delivering' => ['name' => 'Đang giao'],
            'susscess' => ['name' => 'Hoàn thành'],
        ],
        'level'       => [
            'admin'      => ['name'=> 'Quản trị hệ thống'],
            'member'      => ['name'=> 'Người dùng bình thường'],
        ],
        'rss_source' => [
            'vnexpress' => ['name' => 'VNExpress'],
            'cafebiz' => ['name' => 'CafeBiz'],
            'tuoitre' => ['name' => 'Tuổi Trẻ'],
        ],
        'search'       => [
            'all'           => ['name'=> 'Search by All'],
            'id'            => ['name'=> 'Search by ID'],
            'name'          => ['name'=> 'Search by Name'],
            'username'      => ['name'=> 'Search by Username'],
            'fullname'      => ['name'=> 'Search by Fullname'],
            'email'         => ['name'=> 'Search by Email'],
            'description'   => ['name'=> 'Search by Description'],
            'link'          => ['name'=> 'Search by Link'],
            'content'       => ['name'=> 'Search by Content'],
            'phone'         => ['name'=> 'Search by Phone'],
            'message'       => ['name'=> 'Search by Message'],
            'type'          => ['name'=> 'Search by Type'],
            
        ],
        'button' => [
            'edit'      => ['class'=> 'btn-success' , 'title'=> 'Edit'      , 'icon' => 'fa-pencil' , 'route-name' => '/form'],
            'delete'    => ['class'=> 'btn-danger btn-delete'  , 'title'=> 'Delete'    , 'icon' => 'fa-trash'  , 'route-name' => '/delete'],
            'info'      => ['class'=> 'btn-info'    , 'title'=> 'View'      , 'icon' => 'fa-pencil' , 'route-name' => '/delete'],
            'pdf'      => ['class'=> 'btn-info'    , 'title'=> 'Pdf'      , 'icon' => 'fa-pencil' , 'route-name' => '/pdf'],
        ]
            
    ],
    'path' => [
        'gallery' => 'images/beautiful/'
    ],
    'config' => [
        'search' => [
            'default'   => ['all', 'id', 'fullname'],
            'slider'    => ['all', 'id', 'name', 'description', 'link'],
            'productAttribute'    => ['all', 'id', 'name', 'type'],
            'category'  => ['all', 'name'],
            'article'   => ['all', 'name', 'content'],
            'user'      => ['all', 'username', 'email', 'fullname'],
            'menu'      => ['all', 'name', 'link'],
            'rss'       => ['all', 'name', 'link'],
            'contact'   => ['all', 'name', 'phone', 'email', 'message'],
            'cateProduct' => ['all', 'name'],
            'qa' => ['all', 'id'],
            'ship' => ['all', 'name'],
            'quoste' => ['all', 'id'],
            'articleComment' => ['all', 'id'],
            'cart' => ['all', 'id'],
            'coupon' => ['all', 'id'],
            'video' => ['all', 'id'],
            'review' => ['all', 'id'],
            'banner' => ['all', 'id', 'name', 'description', 'link'],

        ],
        'button' => [
            'default'   => ['edit', 'delete'],
            'slider'    => ['edit', 'delete'],
            'productAttribute'    => ['edit', 'delete'],
            'category'  => ['edit', 'delete'],
            'article'   => ['edit', 'delete'],
            'user'      => ['edit'],
            'menu'      => ['edit', 'delete'],
            'rss'       => ['edit', 'delete'],
            'cateProduct'  => ['edit', 'delete'],
            'product'      => ['edit', 'delete'],
            'qa'      => ['edit', 'delete'],
            'ship'      => ['edit', 'delete'],
            'quoste'      => ['edit', 'delete'],
            'articleComment'      => ['edit', 'delete'],
            'video'      => ['edit', 'delete'],
            'cart'      => ['delete','pdf'],
            'coupon'      => ['edit','delete'],
            'review'      => ['edit','delete'],
            'banner'      => ['edit','delete'],
        ]
    ],
    'notify' => [
        'success' => [
            'update' => 'Cập nhật thành công!'
        ]
    ],
    'product_config' => [
        
        'featured' =>['name'=>'Sản phẩm nổi bật'] ,
        'best_seller' =>['name'=>'Sản phẩm bán chạy'] ,
    ]
    
    
];