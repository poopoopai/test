<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('products', ProductContoller::class);
    // $router->resource('product-categories', ProductCategoryController::class);
    
    $router->resource('news', NewsController::class);
    $router->resource('news-categories', NewsCategoryController::class);
    
    $router->resource('category-trees', CategoryTreeController::class);
    
    $router->group(['prefix' => 'product-categories'], function ($router) {
        $router->get('/', 'ProductCategoryController@index');
        $router->get('/create', 'ProductCategoryController@create');
        $router->post('/', 'ProductCategoryController@store');
        $router->get('/{id}/edit', 'ProductCategoryController@edit');
        $router->put('/{id}', 'ProductCategoryController@update');
        $router->delete('/{id}', 'ProductCategoryController@destroy');
    });
});


