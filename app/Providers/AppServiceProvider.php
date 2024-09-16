<?php

namespace App\Providers;

use App\Models\Utility\Menu;
use App\Models\Utility\Page;
use App\Models\Utility\Settings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
// use App\Models\SEO;
// use Artesaos\SEOTools\Facades\JsonLd;
// use Artesaos\SEOTools\Facades\OpenGraph;
// use Artesaos\SEOTools\Facades\SEOMeta;
// use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\Request;

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
    public function boot(): void
    {

        if (\App::runningInConsole()) return; //чтобы не было проблем с миграциями


        if (Request::ajax()) return; //при AJAX запросах то что ниже не нужно
        $setting = Settings::find(1);
        $page = Page::where('url', Request::path())->first();
        if (explode('/', Request::path())[0] === 'vacancies')
            $page = Page::where('url', 'vacancies')->first();


        View::composer('*', fn ($view) => $view->with([
            'setting' => $setting,
            'page' => $page
        ]));

        $path = '/' . Request::path();
        if ($path == '//') $path = '/';
        // $seo = new \App\Services\SEO\SEO(
        //     SEO::where('url' , $path)->first(),
        //     new SEOMeta(),
        //     new OpenGraph(),
        //     new TwitterCard(),
        //     new JsonLd()
        // );
        // $seo->buildSets();

        // View::composer('layouts.head', fn($view) => $view->with(['seo' => $seo]));



        $header = Menu::where('type', 'HEADER')->first();
        $footer = Menu::where('type', 'FOOTER')->first();
        View::composer('layouts.header', fn ($view) => $view->with(['header' => $header]));
        View::composer('layouts.footer', fn ($view) => $view->with(['footer' => $footer]));
    }
}
