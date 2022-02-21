<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\CouponModel as MainModel;
use App\Http\Requests\CouponRequest as MainRequest ;    

class CouponController extends AdminController
{

    public function __construct()
    {
        $this->pathViewController = 'admin.pages.coupon.';  // slider
        $this->controllerName     = 'coupon';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        parent::__construct();
    }
    public function save(Request $request)
    {
        if ($request->method() == 'POST') {

            $params = $request->all();
            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";

            if($params['id'] !== null) {
                $task   = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }
    public function coupon(Request $request) {
       
        $params  = $request->coupon;
        if($params == 'percent'){
            $result = [
                "5"      => "5%",    
                "10"     => "10%",    
                "15"     => "15%",    
                "20"     => "20%",    
            ];
            echo json_encode($result);
        }else if($params == 'direct'){
            $result = [
                "50000"      => "50.000 VNĐ",    
                "100000"     => "100.000 VNĐ",    
                "200000"     => "200.000 VNĐ",    
                "500000"     => "500.000 VNĐ",    
            ];
            echo json_encode($result);
        }else{
            echo json_encode([ "default" => "Chọn giá trị"]);
        }

       
    }

    
}