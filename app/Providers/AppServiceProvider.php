<?php

namespace App\Providers;

use App\Helpers\Telegram;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
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
        $this->app->bind(Telegram::class, function ($app){
            return new Telegram(new Http(), config('bots.bot'));
        });

        View::composer('layouts.footer', function ($view){
            $view->with([
                'categories' => Category::get(),
                'contact' => Contact::first(),
            ]);
        });
//        dd((string)view('layouts.footer'));
    }
}
