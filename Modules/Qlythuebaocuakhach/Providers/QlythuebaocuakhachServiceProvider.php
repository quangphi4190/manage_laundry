<?php

namespace Modules\Qlythuebaocuakhach\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Qlythuebaocuakhach\Events\Handlers\RegisterQlythuebaocuakhachSidebar;

class QlythuebaocuakhachServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterQlythuebaocuakhachSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('qlythuebaocuakhaches', array_dot(trans('qlythuebaocuakhach::qlythuebaocuakhaches')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('qlythuebaocuakhach', 'permissions');

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
            'Modules\Qlythuebaocuakhach\Repositories\QlythuebaocuakhachRepository',
            function () {
                $repository = new \Modules\Qlythuebaocuakhach\Repositories\Eloquent\EloquentQlythuebaocuakhachRepository(new \Modules\Qlythuebaocuakhach\Entities\Qlythuebaocuakhach());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Qlythuebaocuakhach\Repositories\Cache\CacheQlythuebaocuakhachDecorator($repository);
            }
        );
// add bindings

    }
}
