<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/qlygoithang'], function (Router $router) {
    $router->bind('qlygoithang', function ($id) {
        return app('Modules\Qlygoithang\Repositories\QlygoithangRepository')->find($id);
    });
    $router->get('qlygoithangs', [
        'as' => 'admin.qlygoithang.qlygoithang.index',
        'uses' => 'QlygoithangController@index',
        'middleware' => 'can:qlygoithang.qlygoithangs.index'
    ]);
    $router->get('qlygoithangs/create', [
        'as' => 'admin.qlygoithang.qlygoithang.create',
        'uses' => 'QlygoithangController@create',
        'middleware' => 'can:qlygoithang.qlygoithangs.create'
    ]);
    $router->post('qlygoithangs', [
        'as' => 'admin.qlygoithang.qlygoithang.store',
        'uses' => 'QlygoithangController@store',
        'middleware' => 'can:qlygoithang.qlygoithangs.create'
    ]);
    $router->get('qlygoithangs/{qlygoithang}/edit', [
        'as' => 'admin.qlygoithang.qlygoithang.edit',
        'uses' => 'QlygoithangController@edit',
        'middleware' => 'can:qlygoithang.qlygoithangs.edit'
    ]);
    $router->put('qlygoithangs/{qlygoithang}', [
        'as' => 'admin.qlygoithang.qlygoithang.update',
        'uses' => 'QlygoithangController@update',
        'middleware' => 'can:qlygoithang.qlygoithangs.edit'
    ]);
    $router->delete('qlygoithangs/{qlygoithang}', [
        'as' => 'admin.qlygoithang.qlygoithang.destroy',
        'uses' => 'QlygoithangController@destroy',
        'middleware' => 'can:qlygoithang.qlygoithangs.destroy'
    ]);
// append

});
