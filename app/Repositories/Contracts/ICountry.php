<?php

namespace App\Repositories\Contracts;

interface ICountry
{
    public function getCountryIdByName($country_name);
}