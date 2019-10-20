<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(
    [
        'middleware' => ['menu'],
        //'tags' => ['admin']
    ],
    function() {
        // Log Out route
        Route::any('logout', 'Auth\LoginController@logout')->name('logout');

        Route::get('/', 'DashboardController@getDashboard')
             ->name('dashboard');

        Route::get('/client/list', 'ClientController@getList')
             ->name('client.list');

        Route::get('/client/{client}/show', 'ClientController@show')
             ->name('client.show');

        Route::get('/client/create', 'ClientController@getCreate')
             ->name('client.create');
        Route::post('/client/create', 'ClientController@postCreate')
             ->name('client.create');

        Route::get('/client/{client}/edit', 'ClientController@getEdit')
             ->name('client.edit');
        Route::post('/client/{client}/edit', 'ClientController@postEdit')
             ->name('client.edit');

        Route::get('/client/import', 'ClientController@getImport')
             ->name('client.import');
        Route::post('/client/import', 'ClientController@postImport')
             ->name('client.import');
    }
);
