<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\ICriterion;

class HasDetail implements ICriterion
{
    /**
     * criteria for apply user model has details.
     * 
     * @param  Object  $model
     * 
     * @return boolean
     */
    public function apply($model)
    {
        return $model->has('UserDetail');
    }
}