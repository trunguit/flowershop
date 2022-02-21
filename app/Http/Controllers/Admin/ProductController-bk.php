<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateProductModel;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest as MainRequest;
use App\Models\ProductModel as MainModel;

class ProductController extends Controller
{
    private $pathViewController = 'admin.pages.product.';
    private $controllerName = 'product';
    private $params = [];
    private $model;
    private $path = '/upload/1/product';

    public function __construct()
    {
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        $categoryModel = new CateProductModel();
        $categories = $categoryModel->createSelectCategory();
        $cateProduct = [];
        foreach ($categories as $id => $category)
        $cateProduct[$id] = preg_replace('/\|------/', '', $category, 1);
        view()->share('cateProduct', $cateProduct);
        view()->share('controllerName', $this->controllerName);
        
    }

    public function index(Request $request)
    {

        $this->params['filter']['status'] = $request->input('filter_status', 'all' ) ;
        $this->params['filter']['category'] = $request->input('filter_category', 'all' ) ;
        $this->params['search']['field']  = $request->input('search_field', '' ) ; // all id description
        $this->params['search']['value']  = $request->input('search_value', '' ) ;

        $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        
        return view($this->pathViewController . 'index', [
            'params' => $this->params,
            'items' => $items,
            'itemsStatusCount' => $itemsStatusCount,
        ]);
    }
    public function getImage($id)
    {
        $params['id'] = $id;
        $itemProduct = $this->model->getItem($params, ['task' => 'get-item']);
        $productImage = $itemProduct->image->toArray();
        return json_encode($productImage);
    }
    public function image(Request $request)
    {
        /*================================= object file =============================*/
        $file = $request->file('file');

        
        /*================================= tra ve ten file image =============================*/
        return $this->model->uploadThumb($file, 'tmp');
    }

    public function form(Request $request)
    {
        $item = null;
        $key_value = $request->key_value;

        if ($request->id != null) {
            $params["id"] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-info']);
        }
        return view($this->pathViewController . 'form', [
            'item' => $item,
            'key_value' => $key_value
        ]);
    }
    public function status(Request $request)
    {
        $params["currentStatus"]  = $request->status;
        $params["id"]             = $request->id;
        $params['controllerName'] = $this->controllerName;
        $result = $this->model->saveItem($params, ['task' => 'change-status']);
        echo json_encode($result);
    }
    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $params['dropzone'] = $this->model->dropzone($params);
            $params['thumb']='/images/product/'.array_column($params['dropzone'],'name')[0];
            $task = "add-item";
            $msg = "Thêm phần tử thành công!";
            if ($params['id'] != null) {
                $task = "edit-item";
                $msg = "Cập nhật phần tử thành công!";
            }
            $idNew = $this->model->saveItem($params, ['task' => $task]);
            // dd($idNew);
            $id = ($task == 'add-item') ? $idNew : $request->id;
            return redirect()->route($this->controllerName )->with("zvn_notify", $msg);
        }
    }
    public function config(Request $request)
    {
        $this->params['config'] = $request->config;
        $this->params['id'] = $request->id;
        $result = $this->model->saveItem($this->params, ['task' => 'change-config']);
        echo json_encode($result);
    }
    public function update(Request $request)
    {
        if ($request->method() == 'POST') {
            $msg = null;
            $params = $request->all();
            if($params['type'] == 'ordering') {
                if(!empty($params['cid'])) {
                    foreach ($params['cid'] as $id => $value)
                        $this->model->saveItem(['sort' => $params['ordering'][$id], 'id' => $id], ['task' => 'edit-item']);
                    $msg = 'Cập nhật sắp xếp thành công!';
                }
            }

            return redirect()->route($this->controllerName)->with("zvn_notify", $msg);
        }
    }

    public function media(Request $request)
    {
        $path = public_path($this->path);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    // public function status(Request $request)
    // {
    //     try {
    //         $params["currentStatus"] = $request->status;
    //         $params["id"] = $request->id;
    //         $this->model->saveItem($params, ['task' => 'change-status']);
    //         $response = ($params["currentStatus"] == 'active') ? 'inactive' : 'active';
    //         return response()->json([
    //             'status' => true,
    //             'response' => $response,
    //             'link' => route($this->controllerName . '/status', ['status' => $response, 'id' => $params["id"]])
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'error' => $e->getMessage()
    //         ]);
    //     }
    // }

    public function ordering(Request $request)
    {
        $params["id_current"] = $request->id_current;
        $params["id_change"] = $request->id_change;
        $this->model->ordering($params);
        return back()->with("zvn_notify", "Sắp xếp phần tử thành công!");
    }

   
    public function changeCategory(Request $request) {
        $params['category_id'] = $request->category_id;
        $params['id'] = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-category']);
        return response()->json($result);
    }
    public function attribute(Request $request)
    {
        try {
            $params = [
                'id' => $request->id,
                $request->field => $request->value
            ];
            $this->model->saveItem($params, ['task' => 'edit-item']);
            return response()->json([
                'status' => true,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function delete(Request $request)
    {
        $params["id"] = $request->id;
        $this->model->deleteItem($params, ['task' => 'delete-item']);

        return redirect()->route($this->controllerName)->with("zvn_notify", "Xóa phần tử thành công!");
    }
}
