<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\ICriterion;

class EagerLoad implements ICriterion
{
    protected $relationships;

    /**
     * @constructor for getting extra variables.
     */
    public function __construct($relationships)
    {
        $this->relationships = $relationships;
    }

    /**
     * criteria for apply relationships eager loading.
     * 
     * @param  Object  $model
     * 
     * @return Object
     */
    public function apply($model)
    {
        return $model->with($this->relationships);
    }
}