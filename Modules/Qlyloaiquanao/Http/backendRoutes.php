<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/qlyloaiquanao'], function (Router $router) {
    $router->bind('qlyloaiquanao', function ($id) {
        return app('Modules\Qlyloaiquanao\Repositories\QlyloaiquanaoRepository')->find($id);
    });
    $router->get('qlyloaiquanaos', [
        'as' => 'admin.qlyloaiquanao.qlyloaiquanao.index',
        'uses' => 'QlyloaiquanaoController@index',
        'middleware' => 'can:qlyloaiquanao.qlyloaiquanaos.index'
    ]);
    $router->get('qlyloaiquanaos/create', [
        'as' => 'admin.qlyloaiquanao.qlyloaiquanao.create',
        'uses' => 'QlyloaiquanaoController@create',
        'middleware' => 'can:qlyloaiquanao.qlyloaiquanaos.create'
    ]);
    $router->post('qlyloaiquanaos', [
        'as' => 'admin.qlyloaiquanao.qlyloaiquanao.store',
        'uses' => 'QlyloaiquanaoController@store',
        'middleware' => 'can:qlyloaiquanao.qlyloaiquanaos.create'
    ]);
    $router->get('qlyloaiquanaos/{qlyloaiquanao}/edit', [
        'as' => 'admin.qlyloaiquanao.qlyloaiquanao.edit',
        'uses' => 'QlyloaiquanaoController@edit',
        'middleware' => 'can:qlyloaiquanao.qlyloaiquanaos.edit'
    ]);
    $router->put('qlyloaiquanaos/{qlyloaiquanao}', [
        'as' => 'admin.qlyloaiquanao.qlyloaiquanao.update',
        'uses' => 'QlyloaiquanaoController@update',
        'middleware' => 'can:qlyloaiquanao.qlyloaiquanaos.edit'
    ]);
    $router->delete('qlyloaiquanaos/{qlyloaiquanao}', [
        'as' => 'admin.qlyloaiquanao.qlyloaiquanao.destroy',
        'uses' => 'QlyloaiquanaoController@destroy',
        'middleware' => 'can:qlyloaiquanao.qlyloaiquanaos.destroy'
    ]);
// append

});
