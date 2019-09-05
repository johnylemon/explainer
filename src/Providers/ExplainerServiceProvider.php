<?php

namespace Lemon\Explainer\Providers;

use Illuminate\Support\ServiceProvider;
use Lemon\Explainer\Commands\{
    Explainer,
    ExplainRoute,
    ExplainResponse,
    ExplainRequest
};
use ReflectionClass;

class ExplainerServiceProvider extends ServiceProvider
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
        $this->publishes([
            __DIR__.'/../../config/explainer.php' => config_path('explainer.php'),
        ], 'explainer-config');

        $this->publishes([
            __DIR__.'/../../resources/js' => public_path('js'),
            __DIR__.'/../../resources/css' => public_path('css'),
            __DIR__.'/../../resources/fonts' => public_path('fonts'),
            __DIR__.'/../../resources/images' => public_path('images'),
        ], 'explainer-assets');

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'explainer');

        if ($this->app->runningInConsole())
        {
            $this->commands([
                Explainer::class,
                ExplainRoute::class,
                ExplainResponse::class,
                ExplainRequest::class,
            ]);
        }
    }
}
