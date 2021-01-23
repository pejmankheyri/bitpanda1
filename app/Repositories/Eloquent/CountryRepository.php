<?php

namespace App\Repositories\Eloquent;

use App\Models\Country;
use App\Repositories\Contracts\ICountry;

class CountryRepository extends BaseRepository implements ICountry
{

    /**
     * method for define model.
     * 
     * @return model class
     */
    public function model()
    {
        return Country::class;
    }

    /**
     * method for getting country id by name.
     * 
     * @param  string  $country_name
     * 
     * @return model object
     */
    public function getCountryIdByName($country_name)
    {
        return $this->model->where('name', $country_name)->first();
    }
}
