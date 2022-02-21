<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderModel;
use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\CateProductModel;
use App\Models\ArticleModel;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\QaModel;
use App\Models\ContactModel;
use App\Models\ReviewModel;



class DashboardController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.dashboard.';
        $this->controllerName = 'dashboard';
        parent::__construct();
    }

    public function index(Request $request)
    {
        $cartModel = new CartModel();
        $itemCart = $cartModel->listItems($this->params, ['task'  => 'admin-list-items-dashboard']);
        $itemSliderCount   = SliderModel::countItemsDashboad(); 
        $itemUserCount     = UserModel::countItemsDashboad(); 
        $itemCategoryCount = CategoryModel::countItemsDashboad(); 
        $itemCateProductCount = CateProductModel::countItemsDashboad(); 
        $itemArticleCount  = ArticleModel::countItemsDashboad(); 
        $itemProductCount  = ProductModel::countItemsDashboad(); 
        $itemCartCount      =CartModel::countItemsDashboad(); 
        $itemQaCount      =QaModel::countItemsDashboad(); 
        $itemContactCount      =ContactModel::countItemsDashboad(); 
        $itemReviewCount      =ReviewModel::countItemsDashboad(); 
        
        return view($this->pathViewController .  'index', compact([
            'itemSliderCount', 'itemUserCount', 'itemCategoryCount', 'itemArticleCount','itemProductCount','itemCateProductCount','itemCartCount','itemQaCount','itemContactCount','itemReviewCount','itemCart'
        ]));
    }

}

