<?php

namespace Modules\Qlyuser\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Qlyuser\Events\Handlers\RegisterQlyuserSidebar;

class QlyuserServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterQlyuserSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('qlyusers', array_dot(trans('qlyuser::qlyusers')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('qlyuser', 'permissions');

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
            'Modules\Qlyuser\Repositories\QlyuserRepository',
            function () {
                $repository = new \Modules\Qlyuser\Repositories\Eloquent\EloquentQlyuserRepository(new \Modules\Qlyuser\Entities\Qlyuser());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Qlyuser\Repositories\Cache\CacheQlyuserDecorator($repository);
            }
        );
// add bindings

    }
}
