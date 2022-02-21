<?php

namespace App\Models;
use App\Helpers\Template;

use DB;
use Cart;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImageModel;
use App\Models\Relations\ProductRelationTrait;

class ProductModel extends AdminModel 
{
    use ProductRelationTrait;

    protected $fillable = ['name', 'slug', 'content', 'description', 'image_extra', 'image_main', 'category_id',  'status', 'date_start', 'date_end', 'category_id', 'created_by', 'modified_by', 'created', 'modified', 'price_default', 'price_sale', 'status','type'];
    protected $path = '/upload/1/product';
    protected $table = 'product';
    protected $folderUpload = 'images/product';
    protected $searchAccepted = ['name', 'slug', 'description'];

    public function listItems($params = null, $options = null)
    {
      
        $result = null;

        
        if($options['task'] == "admin-list-items") {
            $this->table               = 'product as p';
            $query = $this->select('p.id', 'p.name', 'p.status', 'p.content', 'p.image_main', 'p.type', 'c.name as category_name', 'p.category_id')
                          ->leftJoin('category as c', 'p.category_id', '=', 'c.id');


            if ($params['filter']['status'] !== "all")  {
                $query->where('p.status', '=', $params['filter']['status'] );
            }

            if ($params['filter']['category'] !== "all")  {
                $categories = CateProductModel::descendantsAndSelf($params['filter']['category'])->pluck('id')->toArray();
                $query->whereIN('p.category_id', $categories);
            }

            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere('p.' . $column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->where('p.' . $params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                } 
            }

            $result =  $query->orderBy('p.id', 'desc')
                            ->paginate($params['pagination']['totalItemsPerPage']);

        }
        if ($options['task'] == 'news-list-items-featured') {
            $query = $this->select($this->table . '.*')
            ->where('status', '=', 'active')
            ->where('type', '=', 'featured');
            $result = $query->limit(16)->get()->toArray();
            }
            if ($options['task'] == 'news-list-items-bestseller') {
                $query = $this->select($this->table . '.*')
                ->where('status', '=', 'active')
                ->where('type', '=', 'best_seller');
                $result = $query->limit(16)->get()->toArray();
        }
        if ($options['task'] == 'news-list-items-new') {
            $query = $this->select($this->table . '.*')
            ->where('status', '=', 'active');
            $query->orderBy('created','desc');
            $result = $query->limit(10)->get()->toArray();
            }
        if($options['task'] == 'news-list-items') {
           
            $query = $this->select($this->table . '.*')
                ->where('status', '=', 'active');
                if (isset($params['search']['value']) && $params['search']['value'] !== "")  {
                      
                                $query->where('name', 'LIKE',  "%{$params['search']['value']}%" ); 
                                $result =  $query->orderBy('created','desc')
                            ->paginate($params['pagination']['totalItemsPerPage']);             
                }
                if (isset($params['select_sort']) && $params['select_sort'] !== "default")  {
                    
                    switch ($params['select_sort']) {
                        case 'lastest':
                             $result =  $query->orderBy('created','desc')
                            ->paginate($params['pagination']['totalItemsPerPage']);
                            break;
                        case 'price_asc':
                             $result =  $query->orderBy('price_sale','asc')
                            ->paginate($params['pagination']['totalItemsPerPage']);
                            break;
                        case 'price_desc':
                             $result =  $query->orderBy('price_sale','desc')
                            ->paginate($params['pagination']['totalItemsPerPage']);
                            break;
                        default:
                        
                            break;
                    }  
                }else{
                    $result =  $query->orderBy('id', 'desc')
                    ->paginate($params['pagination']['totalItemsPerPage']);
                }
    
               
            
            
            
        }
        if ($options['task'] == 'news-list-items-related') {
            $query = $this->select($this->table . '.*') 
                ->where('status', '=', 'active')
                ->where('id', '!=', $params['product_id'])
                ->where('category_id', '=', $params['cateProduct_id']);
            $query->orderBy('created','desc');
            $result = $query->limit(10)->get()->toArray();
        }
        if($options['task'] == 'news-list-items-in-category') {
           
            $query = $this->select($this->table . '.*')
                ->where('status', '=', 'active')
                ->where('category_id', '=', $params['cateProduct_id'])
            ;
            if (isset($params['select_sort']) && $params['select_sort'] !== "default")  {
                    
                switch ($params['select_sort']) {
                    case 'lastest':
                         $result =  $query->orderBy('created','desc')
                        ->paginate($params['pagination']['totalItemsPerPage']);
                        break;
                    case 'price_asc':
                         $result =  $query->orderBy('price_sale','asc')
                        ->paginate($params['pagination']['totalItemsPerPage']);
                        break;
                    case 'price_desc':
                         $result =  $query->orderBy('price_sale','desc')
                        ->paginate($params['pagination']['totalItemsPerPage']);
                        break;
                    default:
                    
                        break;
                }  
            }else{
                $result =  $query->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
            }
          
            
        }
        return $result;
    }

    public function countItems($params = null, $options = null)
    {
        
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
        if($options['task'] == 'new-count-items-group-by-category_id') {
         
            $query = $this::groupBy('category_id')
                        ->select( DB::raw('category_id , COUNT(id) as count') )
                        ->where('category_id', $params['category_id']);
            $result = $query->get()->toArray();
           

        }
        return $result;
    }
   
    public function saveItem($params = null, $options = null)
    {
   
        $username = session('userInfo')['username'];
        if ($options['task'] == 'change-category') {
            $params['modified_by']  = session('userInfo')['username'];
            $params['modified']     = date('Y-m-d H:i:s');
            $this->where('id', $params['id'])->update($this->prepareParams($params));

            $result = [
                'id' => $params['id'],
                'modified' => Template::showItemHistory($params['modified_by'], $params['modified']),
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }
        if ($options['task'] == 'change-config') {
            $config = $params['config'];
            $this->where('id', $params['id'])->update(['type' => $config]);
            return [
                'id' => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }
        if ($options['task'] == 'change-status') {
            $status = $params['currentStatus'] == 'active' ? 'inactive' : 'active';
            $this->where('id', $params['id'])->update(['status' => $status]);

            $result = [
                'id' => $params['id'],
                'status' => ['name' => config("zvn.template.status.$status.name"), 'class' => config("zvn.template.status.$status.class")],
                'link' => route($params['controllerName'] . '/status', ['status' => $status, 'id' => $params['id']]),
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }

        
        if ($options['task'] == 'add-item') {

            
            $data = $params;
            $image_extras = [];
            if (isset($params['document'])) {
                foreach ($params['document'] as $i => $file)
                // dd($this->path);
                    $image_extras[] = [
                        'src' => $this->path . '/' . $file,
                        'alt' => $params['alt'][$i]
                    ];
            }

            if (!empty($params['image_main']))
                $data['image_main'] = json_encode(['src' => $params['image_main'], 'alt' => $params['image_main_alt']]);

            if (!empty($image_extras))
                $data['image_extra'] = json_encode($image_extras);

            if(!empty($data['price_default']))    
                $data['price_default'] = str_replace(',', '', $params['price_default']);    

            if(!empty($data['price_sale']))        
                $data['price_sale'] = str_replace(',', '', $params['price_sale']); 
                
            if(!empty($params['type']))
            { 
                $data['type'] = $params['type'];
            }else{
                $data['type'] = 'normal';
            }

            $data['created_by'] = $username;
            $data['created'] = date('Y-m-d H:m:s', time());
            unset($data['alt']);
            // dd($this->prepareParams($data));
            return self::create($this->prepareParams($data));
        }

        if ($options['task'] == 'edit-item') {
            // die('This is a test 123');
            $data = $params;
            $image_extras = [];
            if (isset($params['document'])) {
                foreach ($params['document'] as $i => $file)
                    $image_extras[] = [
                        'src' => $this->path . '/' . $file,
                        'alt' => $params['alt'][$i]
                    ];
            }

            if (!empty($params['image_main']))
                $data['image_main'] = json_encode(['src' => $params['image_main'], 'alt' => $params['image_main_alt']]);

            if (!empty($image_extras))
                $data['image_extra'] = json_encode($image_extras);

            if(!empty($data['price_default']))    
                $data['price_default'] = str_replace(',', '', $params['price_default']);    

            if(!empty($data['price_sale']))        
                $data['price_sale'] = str_replace(',', '', $params['price_sale']);  
                
                if(!empty($params['type']))
                { 
                    $data['type'] = $params['type'];
                }else{
                    $data['type'] = 'normal';
                }

            $data['modified_by'] = $username;
            $data['modified'] = date('Y-m-d H:m:s', time());

            $object = self::where('id', '=', $params['id'])->get()->first();
            foreach ($data as $kp => $p)
                if (!in_array($kp, ['id', '_token', 'alt', 'document', 'image_main_alt']))
                    if (in_array($kp, ['vi', 'en']))
                        foreach ($p as $ktrans => $trans)
                            $object->translate($kp)->{$ktrans} = $trans;
                    else
                        $object->{$kp} = $p;
            $object->save();
        }
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'get-all') {
            $result = self::select()->get();
        }
        if($options['task'] == 'get-list-images-from-product-id') {
            $imageModel = new ProductImageModel();
            $result     = $imageModel->getItem($params, ['task' => 'get-list-images-from-product-id']);
        }
        if ($options['task'] == 'get-info') {
            $result = self::select()->where('id', '=', $params['id'])->first();
        }

        if ($options['task'] == 'get-item') {
            $result = self::select()->where('id', '=', $params['id'])->first();
        }
        if ($options['task'] == 'news-get-item') {
            $result = self::select()->where('id', '=', $params['product_id'])->first();
            if($result) $result = $result->toArray();
        }

        return $result;
    }
    
    public function ordering($params = null, $options = null)
    {
        $itemCurrent = $this->getItem(['id' => $params['id_current']], ['task' => 'get-item']);
        $itemChange = $this->getItem(['id' => $params['id_change']], ['task' => 'get-item']);

       
    }
    public function ajaxAddToCart($params)
    {
        $cart = session()->get('cart');
        // $total = session()->get('totalCart');
        $id = $params['id'];
        $data = ProductModel::find($id);
        $image = json_decode($data['image_main'],true);
        $quantity = $params->quantity;
        if(empty($cart)){
			$cart['quantity'][$id]  = $quantity;
			$cart['price'][$id]     = $data['price_sale'];
			$cart['name'][$id]      = $data['name'];
			$cart['picture'][$id]   = $image['src'];
			$cart['id'][$id]        = $data['id'];	
            $cart['totalPrice'][$id]= $quantity * $cart['price'][$id] ;
		}else{
			if(key_exists($id,$cart['quantity'])){
				$cart['quantity'][$id]      +=$quantity;
				$cart['totalPrice'][$id]    += $quantity * $cart['price'][$id] ;
			}else{
				$cart['quantity'][$id]=$quantity;  
                $cart['price'][$id]     = $data['price_sale'];
			    $cart['name'][$id]      = $data['name'];
			    $cart['picture'][$id]   = $image['src'];
			    $cart['id'][$id]        = $data['id'];	
                $cart['totalPrice'][$id]= $quantity * $cart['price'][$id] ;         		
			}
			
		}
        // $total = 0;
        // $product = ProductModel::find($id);
        // $image = json_decode($product['image_main'],true);
        // if(isset($cart[$id]))
        // {
        //     $cart[$id]['quantity'] = $cart[$id]['quantity'] + $quantity;
        //     $total = $total + $cart[$id]['quantity'];
        // }else{
        //     $cart[$id]=[
        //         'name' =>$product['name'],
        //         'price'=>$product['price_sale'],
        //         'quantity'=> $quantity,
        //         'image' => $image['src']
        //     ];
        //     $total = $total + $quantity;
        // }
        // $cart['total'] = $total;
        $totalItem = array_sum($cart['quantity']);
        $totalPrice = array_sum($cart['totalPrice']);
        // $totalPrice = number_format(array_sum($cart['price']))
        session()->put('cart',$cart);
        return $data;
    }
    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            self::where('id', $params['id'])->delete();
        }
    }

    public function getItemsNew()
    {
        return $this->select()
            ->where('config', 'like', '%"1":"1"%')
            ->Where('status', '=', 'active')
            ->limit(config('zvn.product_config.countProductNew'))
            ->orderBy('id', 'asc')
            ->get();
    }

    public function getItemsRelative($categoryId, $id, $limit = 4)
    {
        return $this->select()
            ->where('status', 'active')
            ->where('category_id', $categoryId)
            ->where('id', '<>', $id)
            ->limit($limit)
            ->get();
    }

    public function getBestSellers($limit = 6)
    {
        return $this->select()
            ->where('status', 'acitve')
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }

    public function getItemCategory($slug , $limit = 12)
    {
        return $this->select($this->table . '.*')
            ->join('cate_product', 'cate_product.id', '=', $this->table.'.category_id') //id
            ->where($this->table.'.status', 'active')
            ->where('cate_product.slug', '=', $slug)
            ->orderBy($this->table.'.id', 'asc')
            ->paginate($limit);
    }

    public function getItemSearch($keyword, $locale)
    {
        return $this->select($this->table .'.*')
            ->where($this->table.'.status', 'active')
            ->where('name', 'like', "%$keyword%")
            ->orderBy($this->table.'.id', 'asc')
            ->get();
    }
    public function quickView($params = null)
    {
        $id = $params['id'];
        $product = ProductModel::find($id);
        return $product;
    }
}
