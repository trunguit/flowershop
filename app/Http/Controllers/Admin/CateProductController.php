<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CateProductRequest as MainRequest;
use App\Models\CateProductModel as MainModel;

class CateProductController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.cate_product.';
        $this->controllerName = 'cateProduct';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 50;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params["search"]["field"] = $request->input('search_field', null);
        $this->params["search"]["value"] = $request->input('search_value', null);
        $this->params["select"]["field"] = $request->input('select_field', null);
        $this->params["select"]["value"] = $request->input('select_value', 'default');

        $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        $listTree = $this->model->createSelectMenus();
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items']);

        foreach ($items as &$val) {
            $id = $val['id'];
            $val['nameByLv'] = preg_replace('/\|------/', '', $listTree[$id], 1);
        }

        return view($this->pathViewController . 'index', [
            'params' => $this->params,
            'items' => $items,
            'itemsStatusCount' => $itemsStatusCount,
        ]);
    }

    public function form(Request $request)
    {
        $item = null;
        $itemContents = null;
        if ($request->id !== null) {
            $params["id"] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-item']);
        }
        $listMenus = $this->model->createSelectMenus();

        return view($this->pathViewController . 'form', [
            'item' => $item,
            'listMenus' => $listMenus,
        ]);
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $task = "add-item";
            $msg = "Th??m ph???n t??? th??nh c??ng!";
            if ($params['id'] !== null) {
                $task = "edit-item";
                $msg = "C???p nh???t ph???n t??? th??nh c??ng!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $msg);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $node = $this->model::find($id);
        $node->delete();
        return redirect()->route($this->controllerName)->with("zvn_notify", "X??a ph???n t??? th??nh c??ng!");
    }

    public function ordering(Request $request)
    {
        $type = $request->type;
        $id = $request->id;
        $node = $this->model::find($id);

        if ($type == 'up') {
            $node->up();
        } else {
            $node->down();
        }

        return redirect()->route($this->controllerName)->with("zvn_notify", "Thay ?????i ph???n t??? th??nh c??ng!");
    }

    public function isHome(Request $request)
    {
        try {
            $params["currentStatus"] = $request->is_home;
            $params["id"] = $request->id;
            $this->model->saveItem($params, ['task' => 'change-isHome']);
            $response = ($params["currentStatus"] == 'active') ? 'inactive' : 'active';
            return response()->json([
                'status' => true,
                'response' => $response,
                'link' => route($this->controllerName . '/isHome', ['is_home' => $response, 'id' => $params["id"]])
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

}
