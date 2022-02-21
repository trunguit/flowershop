<?php

namespace App\Models\Relations;

use App\Models\ProductModel;
use App\Models\ApplicationModel;

trait CateProductRelationTrait
{
    public function products()
    {
        return $this->hasMany(ProductModel::class, 'category_id');
    }
}