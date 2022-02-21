<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

$prefixNews  = config('zvn.url.prefix_news');

Route::group(['prefix' => $prefixNews, 'namespace' => 'News'], function () {
    // ============================== HOMEPAGE ==============================
    $prefix         = '';
    $controllerName = 'home';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('/not-found',                    [ 'as' => $controllerName. '/not-found',                  'uses' => $controller . 'notFound' ]);
    });

    // ============================== CATEGORY ==============================
    $prefix         = 'chuyen-muc';
    $controllerName = 'category';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/{category_name}-{category_id}.html',  [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])
            ->where('category_name', '[0-9a-zA-Z_-]+')
            ->where('category_id', '[0-9]+');
    });
// ============================== CATEPRODUCT ==============================
$prefix         = 'danh-muc';
$controllerName = 'cateProduct';
Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
    $controller = ucfirst($controllerName)  . 'Controller@';
    Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
    Route::get('/{cateProduct_name}-{cateProduct_id}.html',  [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])
        ->where('cateProduct_name', '[0-9a-zA-Z_-]+')
        ->where('cateProduct_id', '[0-9]+');
});
    // ====================== ARTICLE ========================
    $prefix         = 'bai-viet';
    $controllerName = 'article';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/{article_name}-{article_id}.html',  [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])
                ->where('article_name', '[0-9a-zA-Z_-]+')
                ->where('article_id', '[0-9]+');
        Route::post('/post-comment',                 [ 'as' => $controllerName . '/post-comment',                  'uses' => $controller . 'postComment' ]);
    });
// ====================== Product ========================
$prefix         = 'san-pham';
$controllerName = 'product';
Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
    $controller = ucfirst($controllerName)  . 'Controller@';
    Route::get('/{product_name}-{product_id}.html',  [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])
            ->where('product_name', '[0-9a-zA-Z_-]+')
            ->where('product_id', '[0-9]+');
   
    Route::get('/quickView/{id}',           [ 'as' => $controllerName.'/quickView',    'uses' => $controller . 'quickView' ]);
    Route::get('/danh-sach',           [ 'as' => $controllerName.'/list',    'uses' => $controller . 'list' ]);
    Route::post('/post-comment',                 [ 'as' => $controllerName . '/post-comment',                  'uses' => $controller . 'postComment' ]);
});
    // ============================== NOTIFY ==============================
    $prefix         = 'thong-bao';
    $controllerName = 'notify';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/no-permission',                             [ 'as' => $controllerName . '/noPermission',                  'uses' => $controller . 'noPermission' ]);
        Route::get('/dat-hang-thanh-cong',                             [ 'as' => $controllerName . '/notice',                  'uses' => $controller . 'notice' ]);
    });

    // ====================== LOGIN ========================
    // news69/login
    $prefix         = '';
    $controllerName = 'auth';
    
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/login',        ['as' => $controllerName.'/login',      'uses' => $controller . 'login'])->middleware('check.login');;
        Route::post('/postLogin',   ['as' => $controllerName.'/postLogin',  'uses' => $controller . 'postLogin']);

        // ====================== LOGOUT ========================
        Route::get('/logout',       ['as' => $controllerName.'/logout',     'uses' => $controller . 'logout']);
    });

    // ============================== RSS ============================== //
    $prefix = 'tin-tuc-tong-hop';
    $controllerName = 'rss';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', $controller . 'index')->name($controllerName . '/index');
        Route::get('/get-gold', $controller . 'getGold')->name("$controllerName/get-gold");
        Route::get('/get-coin', ['as' => $controllerName.'/get-coin',  'uses' => $controller . 'getCoin']);
    });

    // ============================== GALLERY ============================== //
    $prefix = 'thu-vien-hinh-anh';
    $controllerName = 'gallery';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName.'/index',                  'uses' => $controller . 'index' ]);
    });
     // ============================== video ============================== //
     $prefix = 'thu-vien-video';
     $controllerName = 'video';
     Route::group(['prefix' => $prefix], function () use ($controllerName) {
         $controller = ucfirst($controllerName) . 'Controller@';
         Route::get('/',                             [ 'as' => $controllerName.'/index',                  'uses' => $controller . 'index' ]);
     });
// ============================== Gio hang ============================== //
$prefix = 'gio-hang';
$controllerName = 'cart';
Route::group(['prefix' => $prefix], function () use ($controllerName) {
    $controller = ucfirst($controllerName) . 'Controller@';
    Route::get('/',                             [ 'as' => $controllerName.'/index',                  'uses' => $controller . 'index' ]);
    Route::get('/actionCart/{id}',           [ 'as' => $controllerName.'/actionCart',    'uses' => $controller . 'actionCart' ]);
    Route::get('/check-out',                    [ 'as' => $controllerName . '/check-out',                  'uses' => $controller . 'checkOut' ]);
    Route::get('/check-cart',                 [ 'as' => $controllerName . '/checkCart',                  'uses' => $controller . 'checkCart' ]);
    Route::get('/add-to-cart',                 [ 'as' => $controllerName . '/addToCart',                  'uses' => $controller . 'addToCart' ]);
    Route::get('/coupon/{coupon}',                 [ 'as' => $controllerName . '/coupon',                  'uses' => $controller . 'coupon' ]);
    Route::get('/ajaxShip/{id}',                 [ 'as' => $controllerName . '/ajaxShip',                  'uses' => $controller . 'ajaxShip' ]);
    Route::get('/ajaxCheck/{code}',                 [ 'as' => $controllerName . '/ajaxCheck',                  'uses' => $controller . 'ajaxCheck' ]);
    Route::get('/ajaxRemove/{id}',                 [ 'as' => $controllerName . '/ajaxRemove',                  'uses' => $controller . 'ajaxRemove' ]);
    Route::get('/ajax-quantity-{quantity}/{id}',                 [ 'as' => $controllerName . '/ajaxQuantity',                  'uses' => $controller . 'ajaxQuantity' ]);
    Route::post('/post-check-out',                 [ 'as' => $controllerName . '/postCheckOut',                  'uses' => $controller . 'postCheckOut' ]);
});
$prefix = 'yeu-thich';
$controllerName = 'wishlist';
Route::group(['prefix' => $prefix], function () use ($controllerName) {
    $controller = ucfirst($controllerName) . 'Controller@';
    Route::get('/',                             [ 'as' => $controllerName.'/index',                  'uses' => $controller . 'index' ]);
   
    Route::get('/actionWishlist/{id}',                 [ 'as' => $controllerName . '/actionWishlist',                  'uses' => $controller . 'actionWishlist' ]);
   
    Route::get('/ajaxRemove/{id}',                 [ 'as' => $controllerName . '/ajaxRemove',                  'uses' => $controller . 'ajaxRemove' ]);
   
});
    // ============================== Q&a ============================== //
    $prefix = 'cau-hoi-thuong-gap';
    $controllerName = 'qa';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
    });
    // ============================== About ============================== //
    $prefix = 've-chung-toi';
    $controllerName = 'about';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName.'/index',                  'uses' => $controller . 'index' ]);
    });
    // ============================== CONTACT ============================== //
    $prefix = 'lien-he';
    $controllerName = 'contact';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName .'/index',                  'uses' => $controller . 'index' ]);
        Route::post('/post-contact',                 [ 'as' => $controllerName . '/postContact',                  'uses' => $controller . 'postContact' ]);
    });
    $prefix = 'dang-ky';
    $controllerName = 'subscribe';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::post('/post-subscribe',                 [ 'as' => $controllerName . '/postSubscribe',                  'uses' => $controller . 'postSubscribe' ]);
    });


    
});

// bai-viet/suc-khoe-3.php

