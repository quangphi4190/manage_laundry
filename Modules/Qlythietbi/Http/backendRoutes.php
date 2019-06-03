<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/qlythietbi'], function (Router $router) {
    $router->bind('qlythietbi', function ($id) {
        return app('Modules\Qlythietbi\Repositories\QlythietbiRepository')->find($id);
    });
    $router->get('qlythietbis', [
        'as' => 'admin.qlythietbi.qlythietbi.index',
        'uses' => 'QlythietbiController@index',
        'middleware' => 'can:qlythietbi.qlythietbis.index'
    ]);
    $router->get('qlythietbis/create', [
        'as' => 'admin.qlythietbi.qlythietbi.create',
        'uses' => 'QlythietbiController@create',
        'middleware' => 'can:qlythietbi.qlythietbis.create'
    ]);
    $router->post('qlythietbis', [
        'as' => 'admin.qlythietbi.qlythietbi.store',
        'uses' => 'QlythietbiController@store',
        'middleware' => 'can:qlythietbi.qlythietbis.create'
    ]);
    $router->get('qlythietbis/{qlythietbi}/edit', [
        'as' => 'admin.qlythietbi.qlythietbi.edit',
        'uses' => 'QlythietbiController@edit',
        'middleware' => 'can:qlythietbi.qlythietbis.edit'
    ]);
    $router->put('qlythietbis/{qlythietbi}', [
        'as' => 'admin.qlythietbi.qlythietbi.update',
        'uses' => 'QlythietbiController@update',
        'middleware' => 'can:qlythietbi.qlythietbis.edit'
    ]);
    $router->delete('qlythietbis/{qlythietbi}', [
        'as' => 'admin.qlythietbi.qlythietbi.destroy',
        'uses' => 'QlythietbiController@destroy',
        'middleware' => 'can:qlythietbi.qlythietbis.destroy'
    ]);
// append

});
