<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Helpers\URL;
use App\Helpers\Template;
use App\Models\SettingsModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\ProductModel;
use App\Models\CateProductModel;
use Gloudemans\Shoppingcart\Contracts\Buyable;


class ProductController extends Controller
{
    private $pathViewController = 'news.pages.product.';
    private $controllerName = 'product';
    private $params             = [];

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        

       
        $params["product_id"]  = $request->product_id;
        
        $productModel  = new ProductModel();
        

        $itemProduct = $productModel->getItem($params, ['task' => 'news-get-item']);
        $params["cateProduct_id"]  = $itemProduct['category_id'];
        if(empty($itemProduct))  return redirect()->route('home');
        
        $itemsLatest   = $productModel->listItems(null, ['task'  => 'news-list-items-latest']);
        $itemsComment   = $productModel->listItems($params, ['task'  => 'news-list-comment']);
        
        $params["category_id"]  = $itemProduct['category_id'];
        $itemProductRelated = $productModel->listItems($params, ['task' => 'news-list-items-related']);

        $cateProductModel = new CateProductModel();
        $breadcrumbs = $cateProductModel->listItems($params, ['task' => 'news-breadcrumbs']);
     
        return view($this->pathViewController .  'index', [
            'params'        => $this->params,
            'itemsLatest'   => $itemsLatest,
            'itemsComment'   => $itemsComment,
            'itemProduct'  => $itemProduct,
            'breadcrumbs'  => $breadcrumbs,
            'itemsRelated'=> $itemProductRelated 
        ]);
    }
    
    
    public function quickView($id, Request $request)
    {
        
        $params["id"]             = $request->id;
        $params['controllerName'] = $this->controllerName;
        $product = ProductModel::find($params["id"]);
        $result= [];
        $img = json_decode($product['thumb'],true);
        $image              = asset('images/product/'.$img[0]['name']);
        $name = $product['name'];
        $id = $product['id'];
        
        $price_sale = Template::formatMoney($product['price_sale']);
        $price_default = Template::formatMoney($product['price_default']);
       
        $description = $product['description'];
        $linkAddToCart = route('cart/addToCart',['id'=>$id,'quantity'=>'value_new']);
        $result = [
            'name'=>$name,
            'description'=>$description,
            'thumb'=>$image,
            'price_default'=>$price_default,
            'price_sale'=>$price_sale,
            'linkAddToCart'=>$linkAddToCart,
            
        ];
            echo json_encode($result);
		
        
        
    }

  
    private function sendEmail($email, $title, $content, $bcc = [], $attach = '', $option = [])
    {
        $mail = json_decode(SettingsModel::where('key_value', '=', 'setting-email')->first()->value, true);
        if (empty($mail)) {
            return false;
        } else {
            Config::set('mail.username', $mail['email']);
            Config::set('mail.password', $mail['password']);

            Mail::send([], [], function ($message) use ($mail, $email, $bcc, $title, $content) {
                $message->from($mail['email'], 'Shop Flower');
                $message->to($email);
                $message->bcc($bcc);
                $message->subject($title);
                $message->setBody($content, 'text/html');
            });
            return true;
        }
    }
}