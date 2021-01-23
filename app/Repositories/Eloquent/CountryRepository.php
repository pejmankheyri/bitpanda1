<?php

namespace App\Repositories\Eloquent;

use App\Models\Country;
use App\Repositories\Contracts\ICountry;

class CountryRepository extends BaseRepository implements ICountry
{
    public function model()
    {
        return Country::class;
    }

    public function getIdByName($country_name)
    {
        return $this->model->where('name', $country_name)->first();
    }
}
