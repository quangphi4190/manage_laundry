<?php

namespace Modules\Qlytiems\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Qlytiems\Events\Handlers\RegisterQlytiemsSidebar;

class QlytiemsServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterQlytiemsSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('qlytiems', array_dot(trans('qlytiems::qlytiems')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('qlytiems', 'permissions');

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
            'Modules\Qlytiems\Repositories\QlytiemsRepository',
            function () {
                $repository = new \Modules\Qlytiems\Repositories\Eloquent\EloquentQlytiemsRepository(new \Modules\Qlytiems\Entities\Qlytiems());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Qlytiems\Repositories\Cache\CacheQlytiemsDecorator($repository);
            }
        );
// add bindings

    }
}
