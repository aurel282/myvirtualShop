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

        // Client
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

        // Provider
        Route::get('/provider/list', 'ProviderController@getList')
             ->name('provider.list');

        Route::get('/provider/{provider}/show', 'ProviderController@show')
             ->name('provider.show');

        Route::get('/provider/create', 'ProviderController@getCreate')
             ->name('provider.create');
        Route::post('/provider/create', 'ProviderController@postCreate')
             ->name('provider.create');

        Route::get('/provider/{provider}/edit', 'ProviderController@getEdit')
             ->name('provider.edit');
        Route::post('/provider/{provider}/edit', 'ProviderController@postEdit')
             ->name('provider.edit');

        Route::get('/provider/import', 'ProviderController@getImport')
             ->name('provider.import');
        Route::post('/provider/import', 'ProviderController@postImport')
             ->name('provider.import');


        // Product
        Route::get('/product/list', 'ProductController@getList')
             ->name('product.list');
        Route::get('/{product}/product/show', 'ProductController@show')
             ->name('product.show');
        Route::get('/{provider}/product/import', 'ProductController@getImport')
             ->name('product.import');
        Route::post('/{provider}/product/import', 'ProductController@postImport')
             ->name('product.import');
        Route::get('/{provider}/product/create', 'ProductController@getCreate')
             ->name('product.create');
        Route::post('/{provider}/product/create', 'ProductController@postCreate')
             ->name('product.create');
        Route::get('/{product}/product/edit', 'ProductController@getEdit')
             ->name('product.edit');
        Route::post('/{product}/product/edit', 'ProductController@postEdit')
             ->name('product.edit');
        Route::get('/{provider}/product/{product}/edit', 'ProductController@getEditFromProvider')
             ->name('product.provider.edit');
        Route::post('/{provider}/product/{product}/edit', 'ProductController@postEditFromProvider')
             ->name('product.provider.edit');
        Route::get('/{provider}/product/{product}/delete', 'ProductController@postDeleteFromProvider')
             ->name('product.provider.delete');
        Route::get('/product/{product}/delete', 'ProductController@postDelete')
             ->name('product.delete');
        Route::get('/{provider}/product/delete_all', 'ProductController@bulkDeleteFromProvider')
             ->name('product.bulk_delete');
        Route::get('/{provider}/product/export_all', 'ProductController@exportAllProductFromProvider')
             ->name('product.export_all');


        // Purchase
        Route::get('/purchase/list', 'PurchaseController@getList')
             ->name('purchase.list');
        Route::get('{bill}/purchase/add', 'PurchaseController@getAdd')
             ->name('bill.purchase.add');
        Route::post('{bill}/purchase/add', 'PurchaseController@postAdd')
             ->name('bill.purchase.add');
        Route::get('/{bill}/{purchase}/purchase/delete', 'PurchaseController@deleteFromBill')
             ->name('bill.purchase.delete');

        // Bill
        Route::get('/bill/list', 'BillController@getList')
             ->name('bill.list');
        Route::get('/{client}/bill/create', 'BillController@postCreateFromClient')
             ->name('bill.create');
        Route::get('/{bill}/bill/show', 'BillController@show')
             ->name('bill.show');
        Route::get('/{client}/{bill}/bill/delete', 'BillController@deleteFromClient')
             ->name('client.bill.delete');
    }
);
