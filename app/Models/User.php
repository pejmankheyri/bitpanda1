<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'active',
    ];

    /**
     * @return hasOne|UserDetail
     */
    public function userDetail()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id')
            ->where('citizenship_country_id', '=', 15);

    }

    /**
     * @return hasOne|UserDetail
     */
    public function allUserDetail()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id');

    }

}
