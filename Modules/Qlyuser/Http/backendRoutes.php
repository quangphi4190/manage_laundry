<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/qlyuser'], function (Router $router) {
    $router->bind('qlyuser', function ($id) {
        return app('Modules\Qlyuser\Repositories\QlyuserRepository')->find($id);
    });
    $router->get('qlyusers', [
        'as' => 'admin.qlyuser.qlyuser.index',
        'uses' => 'QlyuserController@index',
        'middleware' => 'can:qlyuser.qlyusers.index'
    ]);
    $router->get('qlyusers/create', [
        'as' => 'admin.qlyuser.qlyuser.create',
        'uses' => 'QlyuserController@create',
        'middleware' => 'can:qlyuser.qlyusers.create'
    ]);
    $router->post('qlyusers', [
        'as' => 'admin.qlyuser.qlyuser.store',
        'uses' => 'QlyuserController@store',
        'middleware' => 'can:qlyuser.qlyusers.create'
    ]);
    $router->get('qlyusers/{qlyuser}/edit', [
        'as' => 'admin.qlyuser.qlyuser.edit',
        'uses' => 'QlyuserController@edit',
        'middleware' => 'can:qlyuser.qlyusers.edit'
    ]);
    $router->put('qlyusers/{qlyuser}', [
        'as' => 'admin.qlyuser.qlyuser.update',
        'uses' => 'QlyuserController@update',
        'middleware' => 'can:qlyuser.qlyusers.edit'
    ]);
    $router->delete('qlyusers/{qlyuser}', [
        'as' => 'admin.qlyuser.qlyuser.destroy',
        'uses' => 'QlyuserController@destroy',
        'middleware' => 'can:qlyuser.qlyusers.destroy'
    ]);
// append

});
