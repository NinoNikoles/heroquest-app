<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Request $request): void
    {
        $rawLang = $request->server('HTTP_ACCEPT_LANGUAGE');
        $lang = explode(',', $rawLang)[0];

        View::share('browserLang', $lang);

        $request->attributes->set('browser_lang', $lang);

        app()->setLocale($lang);
    }
}
