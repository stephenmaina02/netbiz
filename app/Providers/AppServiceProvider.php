<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'user_relation' => 'App\UserRelation',
            'user' => 'App\User',
            'withdrawal' => 'App\Withdrawal',
            'bonus' => 'App\Bonus',
            'payment' => 'App\Payment',
        ]);
    }
}
