<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Mail\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\SubscribeModel as MainModel;
use App\Models\SettingModel;
class SubscribeController extends Controller
{
    private $pathViewController = 'news.pages.contact.';
    private $controllerName = 'contact';
    private $params = [];
    private $model;

    public function __construct()
    {
        $this->model = new MainModel();
        View::share('controllerName', $this->controllerName);
    }

   

    public function postSubscribe(Request $request)
    {
        $data = [
           
            'email' => $request->email,
            
        ];

        $this->model->saveItem($data, ['task' => 'news-add-item']);

        // $mailService = new MailService();
        // $mailService->sendContactConfirm($data);
        // $mailService->sendContactInfo($data);

        return redirect()->route($this->controllerName . '/index')->with('news_notify', 'Cảm ơn bạn đã subscribe . Chúng tôi sẽ gửi những tin tức mới nhất cho bạn ');
    }
}
