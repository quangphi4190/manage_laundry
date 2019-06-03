<?php

namespace Modules\Qlygoithang\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Qlygoithang\Events\Handlers\RegisterQlygoithangSidebar;

class QlygoithangServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterQlygoithangSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('qlygoithangs', array_dot(trans('qlygoithang::qlygoithangs')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('qlygoithang', 'permissions');

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
            'Modules\Qlygoithang\Repositories\QlygoithangRepository',
            function () {
                $repository = new \Modules\Qlygoithang\Repositories\Eloquent\EloquentQlygoithangRepository(new \Modules\Qlygoithang\Entities\Qlygoithang());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Qlygoithang\Repositories\Cache\CacheQlygoithangDecorator($repository);
            }
        );
// add bindings

    }
}
