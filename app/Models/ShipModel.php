<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
class ShipModel extends AdminModel
{
    public function __construct() {
        $this->table               = 'ship';
        $this->folderUpload        = 'ship'; 
        $this->fieldSearchAccepted = ['id', 'name']; 
        $this->crudNotAccepted     = ['_token'];
    }

    public function listItems($params = null, $options = null) {
     
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name', 'status' , 'price','created', 'created_by', 'modified', 'modified_by');
               
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

        if($options['task'] == 'news-list-items-in-selectbox') {
            $query = $this->select('id', 'name')
                        ->where('status', '=', 'active' );
                       

            $arr = $query->get()->toArray();
            foreach ($arr as $key => $value) {
                $result[$value['id']] = $value['name'];
            }
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
        
        if($options['task'] == 'get-item') {
            $result = self::select('id', 'name', 'price', 'status')->where('id', $params['id'])->first();
        }

       

        return $result;
    }

    public function saveItem($params = null, $options = null) { 
        if($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status ]);
        }

        if($options['task'] == 'add-item') {
            $params['created_by'] = "admin";
            $params['created']    = date('Y-m-d');
           
            self::insert($this->prepareParams($params));        
        }

        if($options['task'] == 'edit-item') {
            
            $params['modified_by']   = "admin";
            $params['modified']      = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
           
           
            self::where('id', $params['id'])->delete();
        }
    }

}

