<?php

namespace App\Providers;

use App\Models\Blog\Menu;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        try{
            $menuBlog = Menu::orderBy('m_sort','asc')->get();
        }catch (\Exception $exception)
        {

        }

        \View::share('menuBlog', $menuBlog ?? []);
    }
}
