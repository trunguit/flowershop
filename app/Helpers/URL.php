<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class URL
{
    public static function linkCategory($id, $name) 
    {
        return route('category/index', [
            'category_id'   => $id, 
            'category_name' => Str::slug($name) 
        ]);

    }
    public static function linkCateProduct($id, $name) 
    {
        return route('cateProduct/index', [
            'cateProduct_id'   => $id, 
            'cateProduct_name' => Str::slug($name) 
        ]);

    }
    public static function linkArticle($id, $name) 
    {
        return route('article/index', [
            'article_id'   => $id, 
            'article_name' => Str::slug($name) 
        ]);

    }
    public static function linkProduct($id, $name) 
    {
        return route('product/index', [
            'product_id'   => $id, 
            'product_name' => Str::slug($name) 
        ]);

    }
}