<?php

namespace Modules\Qlyloaiquanao\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Qlyloaiquanao\Events\Handlers\RegisterQlyloaiquanaoSidebar;

class QlyloaiquanaoServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterQlyloaiquanaoSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('qlyloaiquanaos', array_dot(trans('qlyloaiquanao::qlyloaiquanaos')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('qlyloaiquanao', 'permissions');

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
            'Modules\Qlyloaiquanao\Repositories\QlyloaiquanaoRepository',
            function () {
                $repository = new \Modules\Qlyloaiquanao\Repositories\Eloquent\EloquentQlyloaiquanaoRepository(new \Modules\Qlyloaiquanao\Entities\Qlyloaiquanao());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Qlyloaiquanao\Repositories\Cache\CacheQlyloaiquanaoDecorator($repository);
            }
        );
// add bindings

    }
}
