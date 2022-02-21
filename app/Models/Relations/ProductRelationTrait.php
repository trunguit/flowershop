<?php

namespace App\Models\Relations;

use App\Models\ApplicationModel;
use App\Models\CateProductModel;

trait ProductRelationTrait
{
    public function category()
    {
        return $this->belongsTo(CateProductModel::class, 'category_id');
    }
}