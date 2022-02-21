<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\VideoModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class VideoController extends Controller
{
    private $pathViewController = 'news.pages.video.';
    private $controllerName = 'video';
    private $params = [];

    public function __construct()
    {
        View::share('controllerName', $this->controllerName);
    }

    public function index()
    {
        $link =  VideoModel::find(1);
        return view($this->pathViewController . 'index',['link'=>$link['link']]);
    }
}
