<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Mail\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\SettingModel;
class AboutController extends Controller
{
    private $pathViewController = 'news.pages.about.';
    private $controllerName = 'about';
    private $params = [];
   

    public function __construct()
    {
        
        View::share('controllerName', $this->controllerName);
    }

    public function index()
    {
       
        return view($this->pathViewController . 'index');
    }

    
}
