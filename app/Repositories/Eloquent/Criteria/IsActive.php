<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\ICriterion;

class IsActive implements ICriterion
{
    public function apply($model)
    {
        return $model->where('active', true);
    }
}