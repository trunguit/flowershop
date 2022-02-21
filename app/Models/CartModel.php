<?php

namespace App\Models;

use DB;
use App\Mail\MailService;
use Cart;
use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\ProductRelationTrait;
use App\Models\CouponModel;
use App\Models\ShipModel;
class CartModel extends AdminModel 
{
    
    protected $table = 'cart';
   
    protected $searchAccepted = ['name', 'slug', 'description'];

    public function listItems($params = null, $options = null) {
     
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id','code','username','phone', 'address','note', 'products', 'status', 'date','total_price','shiping_price');
               
            if ($params['filter']['status'] !== "all")  {
                $query->where('status', '=', $params['filter']['status'] );
            }

            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                } 
            }
            
    
            $result =  $query->orderBy('id', 'desc')
                            ->paginate($params['pagination']['totalItemsPerPage']);

        }
        if($options['task'] == "admin-list-items-dashboard") {
            $query = $this->select('id','code','username','phone', 'address','note', 'products', 'status', 'date','total_price','shiping_price');
            $result =  $query->orderBy('id', 'desc');
            $result = $query->get()->toArray();
        }
        if($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'description','description_sale', 'link', 'thumb')
                        ->where('status', '=', 'active' )
                        ->limit(5);

            $result = $query->get()->toArray();
        }



        return $result;
    }
    public function getItem($params = null, $options = null) {
     
        $result = null;

      
            
        if($options['task'] == 'get-item') {
            $result = self::select('id','code','username','coupon_price','phone', 'address','note', 'products', 'status', 'date','total_price','shiping_price')->where('id', $params['id'])->first();
        }

        return $result;
    }
    public function countItems($params = null, $options  = null) {
     
        $result = null;

        if($options['task'] == 'admin-count-items-group-by-status') {
         
            $query = $this::groupBy('status')
                        ->select( DB::raw('status , COUNT(id) as count') );

            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                } 
            }

            $result = $query->get()->toArray();
           

        }

        return $result;
    }
    public function checkCart($params = null, $options  = null) {
     
        $result = null;

      
         
            if($options['task'] == 'check-cart') {
                $result = self::select('username', 'phone', 'address','date','status','products')->where('code', $params['code'])->first();
            }

        

        return $result;
    }
    public function saveItem($params = null, $options = null)
    {
       
        $result = null;
        if ($options['task'] == 'change-status') {
            $status = $params['currentStatus'];
            $this->where('id', $params['id'])->update(['status' => $status]);
            return [
                'id' => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }

        if ($options['task'] == 'submit-cart') {
            $district = ShipModel::find($params['district'])['name'];
            $product = [];
            $i= 0;
             $data['code'] = $this->randomString(7);
             foreach (Cart::content() as $key => $row) {
 
                 $product[$i]['id'] = $row->id ;
                 $product[$i]['name'] = $row->name ;
                 $product[$i]['qty'] = $row->qty ;
                 $product[$i]['total'] = $row->total ;
                 $product[$i]['price'] = $row->price ;
                 $product[$i]['thumb'] = $row->options->has('thumb') ? $row->options->thumb : '' ;
                 $i++;
             }
           
             $data['products'] = json_encode($product,JSON_UNESCAPED_UNICODE);
             // $data['username'] = $this->_userInfo['username'];
             
             $data['status'] = 'pending';
             $data['note'] = $params['note'];
             $data['date'] = date('Y-m-d');
             $data['shiping_price'] = $params['shiping_price'];
             $data['total_price'] = $params['total_price'];
             $data['coupon'] = $params['coupon'] ? $params['coupon'] : '';
             $data['coupon_price'] = $params['coupon_price'] ? $params['coupon_price'] : '' ;
             $data['username'] = $params['name'];
             $data['email'] = $params['email'];
            
             $data['phone'] = $params['phone'];
             $data['address'] = $params['address'].$district;
             
             $data['total_price'] = Cart::totalFloat();
            
             
             
          
          
             self::insert($this->prepareParams($data));    
             
        }


    }
    private function randomString($length = 5){
	
		$arrCharacter = array_merge(range('a','z'), range(0,9),range('A','Z'));
		$arrCharacter = implode('',$arrCharacter);
		$arrCharacter = str_shuffle($arrCharacter);
	
		$result		= substr($arrCharacter, 0, $length);
		return $result;
	}


}
