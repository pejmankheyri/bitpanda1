<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * @return belongsToMany|UserDetail
     */
    public function userDetails()
    {
        return $this->belongsToMany(UserDetail::class);
    }

}
