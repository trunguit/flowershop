<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;   

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class CategoryController extends Controller
{
    private $pathViewController = 'news.pages.category.';  // slider
    private $controllerName     = 'category';
    private $params             = [];
    private $model;

    public function __construct()
    {
        
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {   
        
        $params["category_id"]  = $request->category_id;
        $articleModel  = new ArticleModel();
        $categoryModel = new CategoryModel();
        $productModel = new productModel();
        $itemsProductNew = $productModel->listItems(null, ['task'  => 'news-list-items-new']);

        $itemCategory = $categoryModel->getItem($params, ['task' => 'news-get-item']);
        if(empty($itemCategory))  return redirect()->route('home');
        
        $itemsLatest   = $articleModel->listItems(null, ['task'  => 'news-list-items-latest']);
        $itemArticleInCategory = $articleModel->listItems($params, ['task' => 'news-list-items-in-category']);
        $breadcrumbs = $categoryModel->listItems($params, ['task' => 'news-breadcrumbs']);
        $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items']);
        return view($this->pathViewController .  'index', [
            'params'        => $this->params,
            'itemsLatest'   => $itemsLatest,
            'itemCategory'  => $itemCategory,
            'breadcrumbs'  => $breadcrumbs,
            'items'  => $itemArticleInCategory,
            'itemsCategory'  => $itemsCategory,
            'itemsProductNew'  => $itemsProductNew,
        ]);
    }

 
}