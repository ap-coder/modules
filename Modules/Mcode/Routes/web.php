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
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Mcode', 'middleware' => ['auth']], function () {

    // Route::prefix('mcode')->group(function() {
    //     Route::get('/', 'McodeController@index');
    //     // Route::resource('mcode-features', 'Admin\\McodeFeatureController@index');
    // });


    // Mcode
    Route::delete('mcodes/destroy', '\Modules\Mcode\Http\Controllers\Admin\McodeController@massDestroy')->name('mcodes.massDestroy');
    Route::post('mcodes/media', '\Modules\Mcode\Http\Controllers\Admin\McodeController@storeMedia')->name('mcodes.storeMedia');
    Route::post('mcodes/ckmedia', '\Modules\Mcode\Http\Controllers\Admin\McodeController@storeCKEditorImages')->name('mcodes.storeCKEditorImages');
    Route::resource('mcodes', '\Modules\Mcode\Http\Controllers\Admin\McodeController');


    // Mcode Feature
    Route::delete('mcode-features/destroy', '\Modules\Mcode\Http\Controllers\Admin\McodeFeatureController@massDestroy')->name('mcode-features.massDestroy');
    Route::resource('mcode-features', '\Modules\Mcode\Http\Controllers\Admin\McodeFeatureController');


    Route::delete('mcode-categories/destroy', '\Modules\Mcode\Http\Controllers\Admin\McodeCategoryController@massDestroy')->name('mcode-categories.massDestroy');
    Route::post('mcode-categories/media', '\Modules\Mcode\Http\Controllers\Admin\McodeCategoryController@storeMedia')->name('mcode-categories.storeMedia');
    Route::post('mcode-categories/ckmedia', '\Modules\Mcode\Http\Controllers\Admin\MCodeCategoryController@storeCKEditorImages')->name('mcode-categories.storeCKEditorImages');
    Route::resource('mcode-categories', '\Modules\Mcode\Http\Controllers\Admin\McodeCategoryController');

    // Mcode Product Model
    Route::delete('mcode-product-models/destroy', '\Modules\Mcode\Http\Controllers\Admin\McodeProductModelController@massDestroy')->name('mcode-product-models.massDestroy');
    Route::post('mcode-product-models/media', '\Modules\Mcode\Http\Controllers\Admin\McodeProductModelController@storeMedia')->name('mcode-product-models.storeMedia');
    Route::post('mcode-product-models/ckmedia', '\Modules\Mcode\Http\Controllers\Admin\McodeProductModelController@storeCKEditorImages')->name('mcode-product-models.storeCKEditorImages');
    Route::resource('mcode-product-models', '\Modules\Mcode\Http\Controllers\Admin\McodeProductModelController');

});


// Route::resource('admin/mcode-features', '\Modules\Mcode\Http\Controllers\Admin\McodeFeatureController');

// Modules\Admin\Controllers\AdminController@index


Route::prefix('support/mcodes')->group(function() {
    Route::get('/', 'McodeController@index');
    Route::post('/getCategory', 'McodeController@getCategory');
    Route::post('/getFeature', 'McodeController@getFeature');
    Route::post('/getQrModalDetails', 'McodeController@getQrModalDetails');
    Route::post('/getGenerateModalDetails', 'McodeController@getGenerateModalDetails');
    Route::get('/getPdf', 'McodeController@generatePdf');
    Route::get('/getSinglePdf', 'McodeController@getSinglePdf');
});


 Route::get('/pdf', '\Modules\Mcode\Http\Controllers\McodeController@viewPdf');