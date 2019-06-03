<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/qlydichvu'], function (Router $router) {
    $router->bind('qlydichvu', function ($id) {
        return app('Modules\Qlydichvu\Repositories\QlydichvuRepository')->find($id);
    });
    $router->get('qlydichvus', [
        'as' => 'admin.qlydichvu.qlydichvu.index',
        'uses' => 'QlydichvuController@index',
        'middleware' => 'can:qlydichvu.qlydichvus.index'
    ]);
    $router->get('qlydichvus/create', [
        'as' => 'admin.qlydichvu.qlydichvu.create',
        'uses' => 'QlydichvuController@create',
        'middleware' => 'can:qlydichvu.qlydichvus.create'
    ]);
    $router->post('qlydichvus', [
        'as' => 'admin.qlydichvu.qlydichvu.store',
        'uses' => 'QlydichvuController@store',
        'middleware' => 'can:qlydichvu.qlydichvus.create'
    ]);
    $router->get('qlydichvus/{qlydichvu}/edit', [
        'as' => 'admin.qlydichvu.qlydichvu.edit',
        'uses' => 'QlydichvuController@edit',
        'middleware' => 'can:qlydichvu.qlydichvus.edit'
    ]);
    $router->put('qlydichvus/{qlydichvu}', [
        'as' => 'admin.qlydichvu.qlydichvu.update',
        'uses' => 'QlydichvuController@update',
        'middleware' => 'can:qlydichvu.qlydichvus.edit'
    ]);
    $router->delete('qlydichvus/{qlydichvu}', [
        'as' => 'admin.qlydichvu.qlydichvu.destroy',
        'uses' => 'QlydichvuController@destroy',
        'middleware' => 'can:qlydichvu.qlydichvus.destroy'
    ]);
// append

});
