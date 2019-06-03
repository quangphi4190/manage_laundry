<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/qlydotkhuyenmai'], function (Router $router) {
    $router->bind('qlydotkhuyenmai', function ($id) {
        return app('Modules\Qlydotkhuyenmai\Repositories\QlydotkhuyenmaiRepository')->find($id);
    });
    $router->get('qlydotkhuyenmais', [
        'as' => 'admin.qlydotkhuyenmai.qlydotkhuyenmai.index',
        'uses' => 'QlydotkhuyenmaiController@index',
        'middleware' => 'can:qlydotkhuyenmai.qlydotkhuyenmais.index'
    ]);
    $router->get('qlydotkhuyenmais/create', [
        'as' => 'admin.qlydotkhuyenmai.qlydotkhuyenmai.create',
        'uses' => 'QlydotkhuyenmaiController@create',
        'middleware' => 'can:qlydotkhuyenmai.qlydotkhuyenmais.create'
    ]);
    $router->post('qlydotkhuyenmais', [
        'as' => 'admin.qlydotkhuyenmai.qlydotkhuyenmai.store',
        'uses' => 'QlydotkhuyenmaiController@store',
        'middleware' => 'can:qlydotkhuyenmai.qlydotkhuyenmais.create'
    ]);
    $router->get('qlydotkhuyenmais/{qlydotkhuyenmai}/edit', [
        'as' => 'admin.qlydotkhuyenmai.qlydotkhuyenmai.edit',
        'uses' => 'QlydotkhuyenmaiController@edit',
        'middleware' => 'can:qlydotkhuyenmai.qlydotkhuyenmais.edit'
    ]);
    $router->put('qlydotkhuyenmais/{qlydotkhuyenmai}', [
        'as' => 'admin.qlydotkhuyenmai.qlydotkhuyenmai.update',
        'uses' => 'QlydotkhuyenmaiController@update',
        'middleware' => 'can:qlydotkhuyenmai.qlydotkhuyenmais.edit'
    ]);
    $router->delete('qlydotkhuyenmais/{qlydotkhuyenmai}', [
        'as' => 'admin.qlydotkhuyenmai.qlydotkhuyenmai.destroy',
        'uses' => 'QlydotkhuyenmaiController@destroy',
        'middleware' => 'can:qlydotkhuyenmai.qlydotkhuyenmais.destroy'
    ]);
// append

});
