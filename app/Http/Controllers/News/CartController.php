<?php

namespace App\Http\Controllers\News;

use App\Helpers\Template;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\ShipModel;
use App\Models\CouponModel;

use App\Models\CartModel as MainModel;
use App\Models\ProductModel;
use Dotenv\Regex\Result;
use App\Mail\MailService;
use Config;
use Cart;

class CartController extends Controller
{
    private $pathViewController = 'news.pages.cart.';  // slider
    private $controllerName     = 'cart';
    private $params             = [];
    
    protected $model;
    public function __construct()
    {
       
        $this->model = new MainModel();
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {   
      
       
        return view($this->pathViewController .  'index', [ 
            
        ]);
    }
    public function addToCart(Request $request)
    {   
            $result = [];
            $quantity      = $request->quantity;
            $id            = $request->id;
            // $cart = session()->get('cart');
        
        
            $data = ProductModel::find($id);
            $img = json_decode($data['thumb'],true);
        
            $image              =  asset('images/product/' . $img[0]['name']);
            Cart::add( $id, $data['name'], $quantity, $data['price_sale'],0,['thumb'=>$image]);
            $result =[
                'totalItem'=>Cart::count(),
                
            ];
            echo json_encode($result);
    }
    public function actionCart(Request $request)
    {
    
    $id            = $request->id;
    $data = ProductModel::find($id);
    $img = json_decode($data['thumb'],true);

    $image              =  asset('images/product/' . $img[0]['name']);
    Cart::add( $id, $data['name'],1, $data['price_sale'],0,['thumb'=>$image]);
    $result =[
        'totalItem'=>Cart::count(),
        
    ];
    echo json_encode($result);
        
    
   
    }
    public function checkCart(Request $request)
    {   
        // $params['code'] = $request->phone;
        // $cart = $this->model->checkCart($params,null);
        return view($this->pathViewController .  'check_cart', [ 
            
        ]);
    }
    public function ajaxShip(Request $request)
    {
       $ship = session()->get('ship');
       $totalPrice = 0;
       $id = $request->id;
       $shipPrice = ShipModel::find($id);
       $ship['price']= $shipPrice['price'];
       $subcart = session()->get('subCart');
       if(!empty($subcart))
       {
           $totalPrice = $subcart['total'];
       }elseif(!empty(Cart::content())){
        $totalPrice = Cart::totalFloat();
       }
       $finalPrice =  $totalPrice + $ship['price'];
       $finalPrice = Template::formatMoney($finalPrice);
      $ship['id'] = $id;
       session()->put('ship',$ship);
       $shipPrice['price'] = Template::formatMoney($shipPrice['price']);
       $result=[
           'finalPrice' => $finalPrice,
           'shipPrice'  =>$shipPrice['price'], 
       ];
        echo json_encode($result);
    }
    public function ajaxCheck(Request $request)
    {
       
       $params['code'] = $request->code;
       $cart = $this->model->checkCart($params,['task'   => 'check-cart']);
       if(!empty($cart))
       {
           $date = date('d/m/Y', strtotime($cart['date'])) ;
        // $date = $cart['date'];
           $products = json_decode($cart['products'],true);
           $detail = '';
           foreach($products as $product){
                
           $detail     .='- '. $product['name']. ' x '. $product['qty'].' = '.  $product['total'] ."</br>";
            }
           $status =  Config::get('zvn.status.' . $cart['status'])['name'];
        $result=[
            'name' => $cart['username'],
            'phone'  =>$cart['phone'], 
            'address'  =>$cart['address'], 
            'date'  =>$date, 
            'detail'  =>$detail, 
            'status'  =>$status, 
            'message'  =>'success' 
        ];
       }else{
        $result=[
            
            'message'  =>'error' 
        ];
       }
       
        echo json_encode($result);
    }
    public function ajaxRemove(Request $request)
    {
      
       
        
        $rowId = $request->id;
        Cart::remove($rowId);

        $result = [
            'id'=>$rowId,
            'totalItem'=> Cart::count(),
            'totalPrice'=> Template::formatMoney(Cart::totalFloat())
        ];
        echo json_encode($result);

    }
    public function checkOut(Request $request)
    {
       
       
        $shipModel = new ShipModel();
        $itemsShip = $shipModel->listItems(null, ['task'   => 'news-list-items-in-selectbox']);
        
        return view($this->pathViewController .  'check_out',['itemsShip'=>$itemsShip]);
    }
    public function coupon(Request $request)
    {
        $subcart = session()->get('subCart');
        
        $params['coupon']= $request->coupon;
      
        $couponModel = new CouponModel();
        $coupon =  $couponModel->checkItem($params);
        if(!empty($coupon))
        {
            $subcart['coupon_value']= $coupon['value'];
            $subcart['coupon_code']= $coupon['code'];
            if($coupon['type_coupon'] == 'direct'){
                $subcart['total'] = Cart::totalFloat()  - $coupon['value'] ;
                $result = ['message'=>'success',
                        'value'=>Template::formatMoney($coupon['value']),
                        'code'=>$coupon['code'],
                        'totalPrice'=> Template::formatMoney( $subcart['total'])
                     ];
            }else{
                $subcart['total'] = Cart::totalFloat()  - (Cart::totalFloat() *  $coupon['value'])/100 ;
                $result = ['message'=>'success',
                        'value'=>$coupon['value'].'%',
                        'code'=>$coupon['code'],
                        'totalPrice'=> Template::formatMoney( $subcart['total'])
                     ];
            }
           
            session()->put('subCart',$subcart);
            
        }else{
            $subcart['total'] =  Cart::totalFloat();
            $subcart['coupon_value'] = '0';
            $subcart['coupon_code']= $params['coupon'];
            session()->put('subCart',$subcart);
            $result = ['message'=>'error',
            'value'=> '0đ',
            'code'=>'',
            'totalPrice'=> Template::formatMoney(Cart::totalFloat() )
                     ];
        }
        
        echo json_encode($result);
    }
    public function postCheckOut(Request $request)
    {
       
      
        if ($request->method() == 'POST') {
            $params = $request->all();
            
		    $this->model->saveItem($params, ['task' => 'submit-cart']);
           
            Cart::destroy();
             session()->flush('subCart');
             session()->flush('ship');
            return redirect()->route('notify/notice');
        }
    }
    public function ajaxQuantity(Request $request)
    {
        
        $id = $request->id;
        $quantity = $request->quantity;
       
       foreach (Cart::content() as $rowId =>  $row) {
          if($row->id==$id){
              Cart::update($rowId,$quantity);
              $itemPrice = Template::formatMoney($row->total);
              $totalPrice = Template::formatMoney(Cart::totalFloat());
          }
       }
       
       
        $result = [
            'id'=>$id,
            'itemPrice' =>$itemPrice,
            'quantity' => $quantity,
            'totalItem'=> Cart::count(),
            'totalPrice'=> $totalPrice
        ];
        echo json_encode($result);

    }
   
 
}