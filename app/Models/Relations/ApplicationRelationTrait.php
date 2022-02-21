<?php

namespace App\Models\Relations;

use App\Models\CateApplicationModel;

trait ApplicationRelationTrait
{
    public function category()
    {
        return $this->belongsTo(CateApplicationModel::class, 'category_id');
    }
}