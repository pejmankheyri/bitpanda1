<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\ICriterion;

class ForCountry implements ICriterion
{
    protected $country_id;

    public function __construct($country_id)
    {
        $this->country_id = $country_id;
    }

    public function apply($model)
    {
        return $model->where('citizenship_country_id', $this->country_id);
    }
}