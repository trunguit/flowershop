<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\Models\QaModel;
class QaController extends Controller
{
    private $pathViewController = 'news.pages.qa.';
    private $controllerName = 'qa';
    private $params = [];

    public function __construct()
    {
        View::share('controllerName', $this->controllerName);
    }

    public function index()
    {   $QaModel = new QaModel();
        $itemsQa   = $QaModel->listItems(null, ['task'   => 'news-list-items']);
        return view($this->pathViewController . 'index',['itemQa'=>$itemsQa]);
    }
}
