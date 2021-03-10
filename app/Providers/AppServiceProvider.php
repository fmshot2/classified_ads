<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\General_Info;
use App\State;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        View::composer('*', function($view) {
            $general_info = General_Info::first();
            $check_general_info = collect($general_info)->isEmpty();

            $view->with( compact('general_info', 'check_general_info'));
        });

    }
    

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {

            $view->with('allStates', State::all());
        });
    }

    


}
