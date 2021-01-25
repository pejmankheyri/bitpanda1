<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\ICriterion;

class IsActive implements ICriterion
{
    /**
     * criteria for apply active users.
     * 
     * @param  Object  $model
     * 
     * @return Object
     */
    public function apply($model)
    {
        return $model->where('active', true);
    }
}