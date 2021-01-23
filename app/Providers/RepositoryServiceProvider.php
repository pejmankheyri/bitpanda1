<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{
    IUser,
    ICountry,
    IUserDetail,
};
use App\Repositories\Eloquent\{
    UserRepository,
    CountryRepository,
    UserDetailRepository,
};
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IUser::class, UserRepository::class);
        $this->app->bind(ICountry::class, CountryRepository::class);
        $this->app->bind(IUserDetail::class, UserDetailRepository::class);
    }
}
