<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubscribeModel as MainModel;

class SubscribeController extends AdminController
{
    public function __construct()
    {
        $this->controllerName = 'subscribe';
        $this->pathViewController = 'admin.pages.subscribe.';
        parent::__construct();
        $this->model = new MainModel();
    }
}
