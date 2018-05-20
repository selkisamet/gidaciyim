<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use App\Ayar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config()->set('ayarlar',Ayar::lists('value','name')->all());

        $this->app['form']->component('bsText', 'form_components.text', ['name', 'label_name', 'value' => null, 'attributes' => [] ]);
        $this->app['form']->component('bsSubmit', 'form_components.submit', ['name', 'url' => URL::previous()]);
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
