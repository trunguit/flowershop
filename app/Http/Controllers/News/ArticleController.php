<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class ArticleController extends Controller
{
    private $pathViewController = 'news.pages.article.';  // slider
    private $controllerName     = 'article';
    private $params             = [];
    private $model;
   
    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {   
        $params["article_id"]  = $request->article_id;
        $articleModel  = new ArticleModel();
        
        $productModel = new productModel();
        $itemsProductNew = $productModel->listItems(null, ['task'  => 'news-list-items-new']);
        
        $itemArticle = $articleModel->getItem($params, ['task' => 'news-get-item']);
        if(empty($itemArticle))  return redirect()->route('home');
        
        $itemsLatest   = $articleModel->listItems(null, ['task'  => 'news-list-items-latest']);
        $itemsComment   = $articleModel->listItems($params, ['task'  => 'news-list-comment']);
        
        $params["category_id"]  = $itemArticle['category_id'];
        $itemArticle['related_articles'] = $articleModel->listItems($params, ['task' => 'news-list-items-related-in-category']);

        $categoryModel = new CategoryModel();
        $breadcrumbs = $categoryModel->listItems($params, ['task' => 'news-breadcrumbs']);
     
        return view($this->pathViewController .  'index', [
            'params'        => $this->params,
            'itemsLatest'   => $itemsLatest,
            'itemsComment'   => $itemsComment,
            'itemArticle'  => $itemArticle,
            'breadcrumbs'  => $breadcrumbs,
            'itemsProductNew'  => $itemsProductNew,
        ]);
    }
    public function postComment(Request $request)
    {
        $articleModel  = new ArticleModel();
        $data = [
            'name' => $request->name,
            'article_id' => $request->article_id,
            'email' => $request->email,
            'content' => $request->content,
        ];
        $params["article_id"]  = $data['article_id'];
        $itemArticle = $articleModel->getItem($params, ['task' => 'news-get-item']);
        $articleModel->saveItem($data, ['task' => 'news-add-comment']);
        return redirect()->route('article/index', [
            'article_id'   => $itemArticle['id'], 
            'article_name' => Str::slug($itemArticle['name']) 
        ])->with('news_notify', 'Cảm ơn bạn đã bình luận bài viết , bình luận của bạn sẽ được kiểm duyệt');
    }

 
}