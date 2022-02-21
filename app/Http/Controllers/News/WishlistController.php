<?php

namespace App\Http\Controllers\News;

use App\Helpers\Template;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use App\Models\CartModel;
use App\Models\CategoryModel;

use App\Models\ProductModel;
use Dotenv\Regex\Result;
use App\Mail\MailService;
use Config;
use Cart;

class WishlistController extends Controller
{
    private $pathViewController = 'news.pages.wishlist.';  // slider
    private $controllerName     = 'wishlist';
    private $params             = [];
    
    protected $model;
    public function __construct()
    {
       
       
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {   
      
       
        return view($this->pathViewController .  'index', [ 
            
        ]);
    }
    public function actionWishlist(Request $request)
    {   
            $result = [];
            $totalItemWishlist=0;
            $quantity      = 1;
            $id            = $request->id;
            $data = ProductModel::find($id);
            $img = json_decode($data['thumb'],true);
        
            $image              =  asset('images/product/' . $img[0]['name']);
            Cart::instance('wishlist')->add( $id, $data['name'], $quantity, $data['price_sale'],0,['thumb'=>$image]);
            foreach(Cart::instance('wishlist')->content() as $vl) {
                $totalItemWishlist+=1;
               }
            $result =[
                'totalItem'=>$totalItemWishlist,
                
            ];
            echo json_encode($result);
    }
    
   
    public function ajaxRemove(Request $request)
    {
      
       
        $totalItemWishlist = 0;
        $rowId = $request->id;
        Cart::instance('wishlist')->remove($rowId);
       
            foreach(Cart::instance('wishlist')->content() as $vl) {
             $totalItemWishlist+=1;
            }
       
        $result = [
            'id'=>$rowId,
            'totalItem'=>$totalItemWishlist
        ];
        echo json_encode($result);

    }
   
 
}