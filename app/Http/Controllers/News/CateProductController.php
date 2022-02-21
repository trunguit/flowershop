<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;   


use App\Models\ProductModel;
use App\Models\CateProductModel;

class CateProductController extends Controller
{
    private $pathViewController = 'news.pages.cateProduct.';  // slider
    private $controllerName     = 'cateProduct';
    private $params             = [];
    private $model;

    public function __construct()
    {
        
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {  
        if(isset($request->cateProduct_id)){
        
        $params['select_sort'] = $request->input('select_sort', 'default' ) ;
        $params['search']['value'] = $request->input('s', '' ) ;
        $params['sort_price'] = $request->input('p', '' ) ;
        // $str = implode($params['sort_price'][0]);
        
      
            $params["pagination"]["totalItemsPerPage"]  = 9; 
            $productModel                               = new ProductModel();
            $params["cateProduct_id"]                   = $request->cateProduct_id;
            $itemsProductNew = $productModel->listItems(null, ['task'  => 'news-list-items-new']);
            $cateProductModel                           = new CateProductModel();
            $itemCateProduct                            = $cateProductModel->getItem($params, ['task' => 'news-get-item']);
            $itemsCateProduct                           = $cateProductModel->listItems($params, ['task' => 'news-list-items']);
            $itemProductInCategory                               = $productModel->listItems($params, ['task' => 'news-list-items-in-category']);
            if(empty($itemCateProduct))  return redirect()->route('home');
            return view($this->pathViewController .  'index', [
                'params'            => $this->params,
                'itemCateProduct'   =>$itemCateProduct,
                'itemsCateProduct'  =>$itemsCateProduct,
                'itemInCategory'  => $itemProductInCategory,
                'itemsCateProduct'  =>$itemsCateProduct,
                'itemsProductNew'  =>$itemsProductNew,
            ]);
        }else{
            $itemsProductNew = $productModel->listItems(null, ['task'  => 'news-list-items-new']);
            $params['select_sort'] = $request->input('select_sort', 'default' ) ;
            $params['search']['value'] = $request->input('search_value', '' ) ;
            // dd($params);
            $params["pagination"]["totalItemsPerPage"]  = 8; 
            $productModel =  new ProductModel();
            $cateProductModel                           = new CateProductModel();
            $itemsCateProduct                           = $cateProductModel->listItems($params, ['task' => 'news-list-items']);
            $allItemProduct = $productModel->listItems($params, ['task' => 'news-list-items']);
            return view($this->pathViewController .  'index', [
                'params'            => $this->params,
                'itemsCateProduct' => $itemsCateProduct,
                'allItemProduct'  =>$allItemProduct,
                'itemsProductNew'  =>$itemsProductNew,
            ]);
        }
        
    }

 
}