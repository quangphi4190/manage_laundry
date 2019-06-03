<?php

namespace Modules\Qlythietbi\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Qlythietbi\Events\Handlers\RegisterQlythietbiSidebar;

class QlythietbiServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterQlythietbiSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('qlythietbis', array_dot(trans('qlythietbi::qlythietbis')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('qlythietbi', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Qlythietbi\Repositories\QlythietbiRepository',
            function () {
                $repository = new \Modules\Qlythietbi\Repositories\Eloquent\EloquentQlythietbiRepository(new \Modules\Qlythietbi\Entities\Qlythietbi());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Qlythietbi\Repositories\Cache\CacheQlythietbiDecorator($repository);
            }
        );
// add bindings

    }
}
