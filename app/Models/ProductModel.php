<?php
namespace App\Models;

use App\Models\AdminModel;
use App\Models\ProductImageModel;

// use App\Models\ProductAttributeModel;
use App\Models\CommentModel;
use App\Models\DiscountModel;
use Illuminate\Support\Facades\DB;

class ProductModel extends AdminModel
{    
    public function __construct()
    {
        $this->table               = 'product';
        $this->folderUpload        = 'product';
        $this->fieldSearchAccepted = ['id', 'name'];
        $this->crudNotAccepted     = [
            'changeInfo','changeSeo','changeCategory','changePrice','changeAttribute','changeSpecial',
            'changeDropzone','dropzone','_token','thumb_current','id','attribute','nameImage','alt','res'
            , 'task_change','task'
        ];    
    }

    // public function attribute()
    // {
    //     return $this->hasMany(ProductAttributeModel::class,'product_id');
    // }

    public function image()
    {
        return $this->hasMany(ProductImageModel::class,'product_id');
    }

    public function listItems($params = null, $options = null) {
        $result = null;
        if ($options['task'] == 'news-list-items-related') {
            $query = $this->select($this->table . '.*') 
                ->where('status', '=', 'active')
                ->where('id', '!=', $params['product_id'])
                ->where('category_id', '=', $params['cateProduct_id']);
            $query->orderBy('created','desc');
            $result = $query->limit(10)->get()->toArray();
        }
        if ($options['task'] == 'news-list-items-new') {
            $query = $this->select($this->table . '.*')
            ->where('status', '=', 'active');
            $query->orderBy('created','desc');
            $result = $query->limit(4)->get()->toArray();
            }
        if ($options['task'] == 'news-list-items-featured') {
          
            $query = $this->select('id','type', 'price_sale', 'name', 'slug', 
             'price_default', 'category_id', 'thumb', 'status')
             ->where('status', '=', 'active' )
            ->where('type', '=', 'featured' )
            
            ->limit(8);
        $result = $query->get()->toArray();

        }
        if($options['task'] == "admin-list-items") {
            $query = $this->select('id','type', 'price_sale', 'name', 'slug', 
             'price_default', 'category_id', 'thumb', 'status');
            

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

            $result =  $query
                ->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage'])
            ;
        }
        if ($options['task'] == 'news-list-items-bestseller') {
            $query = $this->select($this->table . '.*')
            ->where('status', '=', 'active')
            ->where('type', '=', 'best_seller');
            $result = $query->limit(16)->get()->toArray();
    }
        // Home - Recent Products
        if($options['task'] == 'news-list-items') {
           
            $query = $this->select($this->table . '.*')
                ->where('status', '=', 'active');
                if (isset($params['search']['value']) && $params['search']['value'] !== "")  {
                      
                                $query->where('name', 'LIKE',  "%{$params['search']['value']}%" ); 
                                $result =  $query->orderBy('created','desc')
                            ->paginate($params['pagination']['totalItemsPerPage']);             
                }
                if (isset($params['sort_price']) && $params['sort_price'] !== "")  {
                    $arr = explode('-',$params['sort_price']);
                    $newArr['min'] = str_replace('đ ','',$arr[0]);
                    $newArr['max'] = str_replace('đ','',$arr[1]);
                    $newArr['max'] = trim($newArr['max']);
                    $query->where('price_sale', '>' , $newArr['min'] ,'&&' , 'price_sale' , '<' , $newArr['max']  ); 
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
        if($options['task'] == 'news-list-items-in-category') {
          
            $query = $this->select($this->table . '.*')
                ->where('status', '=', 'active')
                ->where('category_id', '=', $params['cateProduct_id'])
            ;
            if (isset($params['search']['value']) && $params['search']['value'] !== "")  {
                      
                $query->where('name', 'LIKE',  "%{$params['search']['value']}%" ); 
                $result =  $query->orderBy('created','desc')
            ->paginate($params['pagination']['totalItemsPerPage']);             
}
if (isset($params['sort_price']) && $params['sort_price'] !== "")  {
    $arr = explode('-',$params['sort_price']);
    $newArr['min'] = str_replace('đ ','',$arr[0]);
    $newArr['max'] = str_replace('đ','',$arr[1]);
    $newArr['max'] = trim($newArr['max']);
    $query->whereBetween('price_sale', [$newArr['min'],$newArr['max'] ]);
          
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
          
            return $result;
        }
        
   
        
        
        // Home - Best Deal
        if($options['task'] == 'news-list-items-best-deal') {
            $query = self::select('id', 'product_code', 'name', 'price', 'price_until', 'slug', 'short_description')
                ->where('status', '=', 'active' )
                ->orderBy('sale', 'desc')
                ->limit(2)
            ;
            // $result = $query->get()->toArray();
            $result = $query->first()->toArray();
        }

        if($options['task'] == 'news-list-items-get-product-info-in-cart') {

            foreach ($params["product_id"] as $value) {
                $result[] = self::select('id', 'name', 'product_code', 'thumb', 'slug')
                ->where('status', 'active')
                ->where('id', $value)
                ->first()->toArray();
            }
        }

        

        if($options['task'] == 'news-get-item-category-search-product-name') {
            $query = self::select('id', 'product_code', 'name', 'thumb', 'price', 'price_until', 'slug', 'short_description');

            // Get Category ID
               $categoryModel        = new CategoryModel();
               $category_id          = $categoryModel->getItem($params, ['task' => 'get-category-id-form-slug']);
            if ($category_id) $query = $query->where('category_id', $category_id);
            
            $result = $query
            ->where('status','active')
            ->where('name', 'LIKE', "%{$params['search_name']}%")
            ->orderBy('ordering', 'asc')
            ->paginate($params['pagination']['totalItemsPerPage']);
            // ->paginate($params['pagination']['totalItemsPerPage'])->toArray();
        }

        if($options['task'] == 'news-get-item-category-search-product-price') {
            $query = self::select('id', 'product_code', 'name', 'thumb', 'price', 'price_until', 'slug', 'short_description');

            // Get Category ID
               $categoryModel        = new CategoryModel();
               $category_id          = $categoryModel->getItem($params, ['task' => 'get-category-id-form-slug']);
            if ($category_id) $query = $query->where('category_id', $category_id);
         
            $result = $query
            ->where('status','active')
            // ->whereBetween('price', [ $params['search_price_min'] * 1000, $params['search_price_max'] * 1000  ])
            ->whereBetween('price', [ $params['search_price_min'], $params['search_price_max']  ])
            ->orderBy('ordering', 'asc')

            ->paginate($params['pagination']['totalItemsPerPage']);
            // ->paginate($params['pagination']['totalItemsPerPage'])->toArray();
        }

        if($options['task'] == 'news-get-item-category-search-product-name-and-price') {
            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
            $query = self::select('id', 'product_code', 'name', 'thumb', 'price', 'price_until', 'slug', 'short_description');

            // Get Category ID
               $categoryModel        = new CategoryModel();
               $category_id          = $categoryModel->getItem($params, ['task' => 'get-category-id-form-slug']);
            if ($category_id) $query = $query->where('category_id', $category_id);
         
            $result = $query
            ->where('status','active')
            ->where('name', 'LIKE', "%{$params['search_name']}%")
            ->whereBetween('price', [ $params['search_price_min'], $params['search_price_max']  ])
            ->orderBy('ordering', 'asc')
            ->paginate($params['pagination']['totalItemsPerPage']);
            // ->paginate($params['pagination']['totalItemsPerPage'])->toArray();

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

    public function getItem($params = null, $options = null) { 
        $result = null;

        if ($options['task'] == 'get-item') {
            $result = self::select()->where('id', '=', $params['id'])->first();
        }
        if ($options['task'] == 'news-get-item') {
            $result = self::select()->where('id', '=', $params['product_id'])->first();
            if($result) $result = $result->toArray();
        }
        if($options['task'] == 'get-list-images-from-product-id') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
            $result = json_decode($result['thumb'],true);
            // $imageModel = new ProductImageModel();
            // $result     = $imageModel->getItem($params, ['task' => 'get-list-images-from-product-id']);
        }


        if($options['task'] == 'news-get-item-product-detail') {
            $result = self::select('id', 'category_id', 'product_code', 'name',
                'thumb', 'price', 'price_until', 'slug', 'short_description', 'description')
            ->where('status','active')
            ->where('id', $params["product_id"])
            ->first()->toArray();
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'news-get-item-category-id') {
            $result = self::select('id', 'category_id', 'product_code', 'name', 'thumb', 'price', 'price_until', 'slug', 'short_description')
            ->where('status','active')
            ->where('category_id', $params["category_id"])
            ->orderBy('ordering', 'asc')
            ->paginate($params['pagination']['totalItemsPerPage']);
            // ->paginate($params['pagination']['totalItemsPerPage'])->toArray();

            // $result = $params;
            // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
        }

        if($options['task'] == 'news-get-item-all-food') {
            $result = self::select('id', 'product_code', 'name', 'thumb', 'price',
                'price_until', 'slug', 'short_description')
            ->where('status','active')
            ->orderBy('ordering', 'asc')
            ->paginate($params['pagination']['totalItemsPerPage']);
            // ->paginate($params['pagination']['totalItemsPerPage'])->toArray();

        }

        // if($options['task'] == 'news-get-items-modal') {
        //     $result = self::select('id', 'name', 'price', 'price_until', 'slug', 'short_description')
        //         ->where('id', $params['product_id'])
        //         ->where('status', 'active')
        //         // ->get()->toArray();
        //         ->first();
            
        //     $productImage = new ProductImageModel();
        //     $result['list_images'] = $productImage->getItem($params, ['task' => 'get-list-thumb-product-id-modal']);
             
        //     $attribute = new AttributeModel();
        //     $result['attribute'] = $attribute->getItem(null, ['task' => 'get-list-thumb-product-id-modal']);
        //     foreach ($result['attribute'] as $value) {
        //         $params['attribute_id'][] = $value['id'];
        //     }

        //     $productAttribute = new ProductAttributeModel();
        //     $result['list_attribute'] = $productAttribute->getItem($params, ['task' => 'get-list-thumb-product-id-modal']);

        // }

        if($options['task'] == 'news-get-items-modal-rating-from-product-id') {
            $commentModel = new CommentModel();
            $result       = $commentModel->getItem($params, ['task' => 'news-get-items-modal-rating-from-product-id']);
        }

        if($options['task'] == 'news-get-items-get-price-coupon') {
            $discountModel = new DiscountModel();
            $result        = $discountModel->getItem($params, ['task' => 'news-get-items-get-price-coupon']);
        }
        if($options['task'] == 'news-get-items-increase-coupon-times-used') {
            $discountModel = new DiscountModel();
            $result        = $discountModel->getItem($params, ['task' => 'news-get-items-increase-coupon-times-used']);
        }

        if($options['task'] == 'get-list-thumb-product-detail') {
            $productImage = new ProductImageModel();
            $result       = $productImage->getItem($params, ['task' => 'get-list-thumb-product-detail']);
        }

        // if($options['task'] == 'get-list-thumb-product-id-modal') {
        //     $attribute = new AttributeModel();
        //     $result    = $attribute->getItem(null, ['task' => 'get-list-thumb-product-id-modal']);
        // }

        // if($options['task'] == 'news-get-item-get-list-tags-from-product-id') {
        //     $productAttribute = new ProductAttributeModel();
        //     $result           = $productAttribute->getItem($params, ['task' => 'news-get-item-get-list-tags-from-product-id']);
        // }

        // if($options['task'] == 'get-list-thumb-product-id-modal-array') {
        //     $productAttribute = new ProductAttributeModel();
        //     $result           = $productAttribute->getItem($params, ['task' => 'get-list-thumb-product-id-modal-array']);
        // }

        if($options['task'] == 'news-get-category-id') {
            $result        = self::where('id', $params['product_id'])->value('category_id');
        }

        if($options['task'] == 'get-product-id-from-product-code') {
            $result = self::where('product_code', $params)->value('id');
        }

        if($options['task'] == 'get-product-info-from-product-list-id') {
            $result = self::select('id', 'product_code', 'name', 'thumb', 'price',
                'price_until', 'slug', 'short_description')
            ->whereIn('id', $params['product_list_id'])
            ->where('status', 'active')
            ->orderBy('ordering')
            // ->paginate($params['pagination']['totalItemsPerPage']);
            ->paginate($params['pagination']['totalItemsPerPage']);
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) {
        $modifiedBy = session('userInfo')['username'];
        $modified   = date('Y-m-d H:i:s');
        $createdBy  = session('userInfo')['username'];
        $created    = date('Y-m-d H:i:s');

        if($options['task'] == 'add-item') {

          $params['created']= $created;
          $params['created_by'] = $createdBy;
          $params['thumb'] = json_encode($params['thumb']);
           
            self::insert($this->prepareParams($params));
            /*================================= dropzone =============================*/
           

        }

        if ($options['task'] == 'change-ordering') {
            $ordering = $params['ordering'];
            $this->where('id', $params['id'])->update(['ordering' => $ordering]);

            return [
                'id'      => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }
        if ($options['task'] == 'change-config') {
            $config = $params['config'];
            $this->where('id', $params['id'])->update(['type' => $config]);
            return [
                'id' => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }
        /*================================= EDIT =============================*/
        if($options['task'] == 'change-product-general'){
            $prepare = $this->prepareParams($params);
            // echo '<pre style="color:red";>$prepare === '; print_r($prepare);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
            self::where('id', $params['id'])->update($prepare);
        }

        /*================================= change dropzone =============================*/
        if($options['task'] == 'edit-item') {
           
            $params['modified']= $modified;
          $params['modified_by'] = $modifiedBy;
          $params['thumb'] = json_encode($params['thumb']);
            self::where('id', $params['id'])->update($this->prepareParams($params));

           
            
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

        /*================================= change category =============================*/
        if ($options['task'] == 'change-category') {
            $params['modified_by'] = $modifiedBy;
            $params['modified']    = $modified;
            $this->where('id', $params['id'])->update($this->prepareParams($params));

            $result = [
                'id'      => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }

    }

    public function deleteItem($params = null, $options = null) 
    { 

        if($options['task'] == 'delete-item') {
            
            /*================================= xoa image va xoa row =============================*/
            $image=$this->where('id',$params['id'])->first()->image->toArray();
            foreach ($image as $item) {
                $this->deleteThumb($item['name']);
            }
            ProductImageModel::where('product_id',$params['id'])->delete();

            // $item   = self::getItem($params, ['task'=>'get-thumb']);
            // $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }

    public function getComment($params = null, $options = null) 
    { 
        if($options['task'] == 'in-product-detail') {

            $commentModel = new CommentModel();
            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';

            $result = $commentModel->getItem($params, ['task' => 'in-product-detail']);
            // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
            return $result;

        }
    }


}

