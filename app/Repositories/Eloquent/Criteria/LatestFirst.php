<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\ICriterion;

class LatestFirst implements ICriterion
{
    /**
     * criteria for get latest data.
     * 
     * @param  Object  $model
     * 
     * @return Object
     */
    public function apply($model)
    {
        return $model->latest();
    }
}