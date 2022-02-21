<?php

namespace App\Models\Relations;

use App\Models\ArticleModel;

trait CateNewsRelationTrait
{
    public function articles()
    {
        return $this->hasMany(ArticleModel::class, 'category_id');
    }
}