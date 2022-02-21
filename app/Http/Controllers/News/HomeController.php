<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;    

use App\Models\SliderModel;
use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\CatePRoductModel;
use App\Models\QuosteModel;
use App\Models\ProductModel;
use App\Models\ReviewModel;
use App\Models\BannerModel;
use Cart;
use DB;

class HomeController extends Controller
{
    private $pathViewController = 'news.pages.home.';  // slider
    private $controllerName     = 'home';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {   
        // $request->session()->forget('cart');
        $sliderModel   = new SliderModel();
        $quosteModel   = new QuosteModel();
        $categoryModel = new CategoryModel();
        $cateProductModel = new CateProductModel();
        $articleModel  = new ArticleModel();
        $productModel = new ProductModel();
        $reviewModel = new ReviewModel();
        $bannerModel = new BannerModel();
        // $product = DB::table('product')->where('config', 'like', '%"1":"1"%')->limit(16)->get()->toArray();
        
        $itemsSlider   = $sliderModel->listItems(null, ['task'   => 'news-list-items']);
       
        // $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items-is-home']);
        $itemsCateProduct = $cateProductModel->listItems(null, ['task' => 'news-list-items-is-home']);
        $itemsArticleNew = $articleModel->listItems(null, ['task'  => 'news-list-items-new']);
        // $itemsProductNew = $productModel->listItems(null, ['task'  => 'news-list-items-new']);
        // $itemsLatest   = $articleModel->listItems(null, ['task'  => 'news-list-items-latest']);
        $itemsProductFeatured = $productModel->listItems(null,['task'  => 'news-list-items-featured']);
        $itemsProductBestseller = $productModel->listItems(null,['task'  => 'news-list-items-bestseller']);
        $itemsReview = $reviewModel->listItems(null,['task'  => 'news-list-items']);
        $itemsBanner = $bannerModel->listItems(null,['task'  => 'news-list-items']);
      
        return view($this->pathViewController .  'index', [
            'params'        => $this->params,
            'itemsSlider'   => $itemsSlider,
            'itemsBanner' => $itemsBanner,
            'itemsCateProduct' => $itemsCateProduct,
            'itemsArticleNew' => $itemsArticleNew,
            // 'itemsProductNew' => $itemsProductNew,
            'itemsProductFeatured' => $itemsProductFeatured,
            'itemsProductBestseller' => $itemsProductBestseller,
            // 'itemsLatest'   => $itemsLatest,
            'itemsReview'   => $itemsReview,
        ]);
    }

    public function notFound(Request $request)
    {   
        return view($this->pathViewController .  'not-found', [
        ]);
    }

 
}