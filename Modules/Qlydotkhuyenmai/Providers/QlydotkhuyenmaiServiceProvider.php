<?php

namespace Modules\Qlydotkhuyenmai\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Qlydotkhuyenmai\Events\Handlers\RegisterQlydotkhuyenmaiSidebar;

class QlydotkhuyenmaiServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterQlydotkhuyenmaiSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('qlydotkhuyenmais', array_dot(trans('qlydotkhuyenmai::qlydotkhuyenmais')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('qlydotkhuyenmai', 'permissions');

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
            'Modules\Qlydotkhuyenmai\Repositories\QlydotkhuyenmaiRepository',
            function () {
                $repository = new \Modules\Qlydotkhuyenmai\Repositories\Eloquent\EloquentQlydotkhuyenmaiRepository(new \Modules\Qlydotkhuyenmai\Entities\Qlydotkhuyenmai());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Qlydotkhuyenmai\Repositories\Cache\CacheQlydotkhuyenmaiDecorator($repository);
            }
        );
// add bindings

    }
}
