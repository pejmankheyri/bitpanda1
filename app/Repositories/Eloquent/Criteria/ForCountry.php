<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\ICriterion;

class ForCountry implements ICriterion
{
    protected $country_id;

    /**
     * @constructor for getting extra variables.
     */
    public function __construct($country_id)
    {
        $this->country_id = $country_id;
    }

    /**
     * criteria for apply joining user with details by country id.
     * 
     * @param  Object  $model
     * 
     * @return Object
     */
    public function apply($model)
    {
        $country_id = $this->country_id;
        $usersDetails = $model->whereHas('userDetail', function ($query) use ($country_id) {
            $query->where('user_details.citizenship_country_id', $country_id);
        });

        return $usersDetails;
    }
}