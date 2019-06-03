<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/qlytiems'], function (Router $router) {
    $router->bind('qlytiems', function ($id) {
        return app('Modules\Qlytiems\Repositories\QlytiemsRepository')->find($id);
    });
    $router->get('qlytiems', [
        'as' => 'admin.qlytiems.qlytiems.index',
        'uses' => 'QlytiemsController@index',
        'middleware' => 'can:qlytiems.qlytiems.index'
    ]);
    $router->get('qlytiems/create', [
        'as' => 'admin.qlytiems.qlytiems.create',
        'uses' => 'QlytiemsController@create',
        'middleware' => 'can:qlytiems.qlytiems.create'
    ]);
    $router->post('qlytiems', [
        'as' => 'admin.qlytiems.qlytiems.store',
        'uses' => 'QlytiemsController@store',
        'middleware' => 'can:qlytiems.qlytiems.create'
    ]);
    $router->get('qlytiems/{qlytiems}/edit', [
        'as' => 'admin.qlytiems.qlytiems.edit',
        'uses' => 'QlytiemsController@edit',
        'middleware' => 'can:qlytiems.qlytiems.edit'
    ]);
    $router->put('qlytiems/{qlytiems}', [
        'as' => 'admin.qlytiems.qlytiems.update',
        'uses' => 'QlytiemsController@update',
        'middleware' => 'can:qlytiems.qlytiems.edit'
    ]);
    $router->delete('qlytiems/{qlytiems}', [
        'as' => 'admin.qlytiems.qlytiems.destroy',
        'uses' => 'QlytiemsController@destroy',
        'middleware' => 'can:qlytiems.qlytiems.destroy'
    ]);
// append

});
