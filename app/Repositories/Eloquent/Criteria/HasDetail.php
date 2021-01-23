<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\ICriterion;

class HasDetail implements ICriterion
{
    public function apply($model)
    {
        return $model->has('UserDetail');
    }
}