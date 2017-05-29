<?php

namespace App\Providers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Support\ServiceProvider;

use App\Auth\CustomUserProvider;

class CustomAuthProvider  extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        
         $this->app['auth']->provider('custom',function()
            {

                return new CustomUserProvider();
            });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

