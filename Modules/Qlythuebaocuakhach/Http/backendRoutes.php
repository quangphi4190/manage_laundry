<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/qlythuebaocuakhach'], function (Router $router) {
    $router->bind('qlythuebaocuakhach', function ($id) {
        return app('Modules\Qlythuebaocuakhach\Repositories\QlythuebaocuakhachRepository')->find($id);
    });
    $router->get('qlythuebaocuakhaches', [
        'as' => 'admin.qlythuebaocuakhach.qlythuebaocuakhach.index',
        'uses' => 'QlythuebaocuakhachController@index',
        'middleware' => 'can:qlythuebaocuakhach.qlythuebaocuakhaches.index'
    ]);
    $router->get('qlythuebaocuakhaches/create', [
        'as' => 'admin.qlythuebaocuakhach.qlythuebaocuakhach.create',
        'uses' => 'QlythuebaocuakhachController@create',
        'middleware' => 'can:qlythuebaocuakhach.qlythuebaocuakhaches.create'
    ]);
    $router->post('qlythuebaocuakhaches', [
        'as' => 'admin.qlythuebaocuakhach.qlythuebaocuakhach.store',
        'uses' => 'QlythuebaocuakhachController@store',
        'middleware' => 'can:qlythuebaocuakhach.qlythuebaocuakhaches.create'
    ]);
    $router->get('qlythuebaocuakhaches/{qlythuebaocuakhach}/edit', [
        'as' => 'admin.qlythuebaocuakhach.qlythuebaocuakhach.edit',
        'uses' => 'QlythuebaocuakhachController@edit',
        'middleware' => 'can:qlythuebaocuakhach.qlythuebaocuakhaches.edit'
    ]);
    $router->put('qlythuebaocuakhaches/{qlythuebaocuakhach}', [
        'as' => 'admin.qlythuebaocuakhach.qlythuebaocuakhach.update',
        'uses' => 'QlythuebaocuakhachController@update',
        'middleware' => 'can:qlythuebaocuakhach.qlythuebaocuakhaches.edit'
    ]);
    $router->delete('qlythuebaocuakhaches/{qlythuebaocuakhach}', [
        'as' => 'admin.qlythuebaocuakhach.qlythuebaocuakhach.destroy',
        'uses' => 'QlythuebaocuakhachController@destroy',
        'middleware' => 'can:qlythuebaocuakhach.qlythuebaocuakhaches.destroy'
    ]);
// append

});
