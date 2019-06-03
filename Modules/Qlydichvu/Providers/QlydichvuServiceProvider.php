<?php

namespace Modules\Qlydichvu\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Qlydichvu\Events\Handlers\RegisterQlydichvuSidebar;

class QlydichvuServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterQlydichvuSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('qlydichvus', array_dot(trans('qlydichvu::qlydichvus')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('qlydichvu', 'permissions');

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
            'Modules\Qlydichvu\Repositories\QlydichvuRepository',
            function () {
                $repository = new \Modules\Qlydichvu\Repositories\Eloquent\EloquentQlydichvuRepository(new \Modules\Qlydichvu\Entities\Qlydichvu());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Qlydichvu\Repositories\Cache\CacheQlydichvuDecorator($repository);
            }
        );
// add bindings

    }
}
