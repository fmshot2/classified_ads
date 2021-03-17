<?php

namespace App\Providers;

use App\Advertisement;
use App\AdvertLocation;
use App\Category;
use Illuminate\Support\ServiceProvider;
use App\General_Info;
use App\PageContent;
use App\Service;
use App\State;
use App\Tourism;
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
            $pages_contents = PageContent::first();
            $pages_contents_page = collect($pages_contents)->isEmpty();

            $advertisements = Advertisement::all();
            $advertlocations = AdvertLocation::all();
            $services = Service::all();
            $states = State::all();
            $categories = Category::orderBy('name', 'asc')->get();

            $view->with( compact('general_info', 'check_general_info', 'advertisements', 'categories', 'advertlocations', 'pages_contents', 'pages_contents_page', 'states'));
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
            $view->with('tourist_attractions', Tourism::all());
        });
    }




}
