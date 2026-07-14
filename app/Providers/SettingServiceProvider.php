<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;


class SettingServiceProvider extends ServiceProvider
{

    public function register(): void
    {

    }


    public function boot(): void
    {

        View::composer('*', function ($view) {

            $setting = Setting::first();

            $view->with('setting', $setting);

        });

    }

}