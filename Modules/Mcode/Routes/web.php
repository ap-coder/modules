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



    // Mcode Feature
    Route::delete('mcode-features/destroy', '\Modules\Mcode\Http\Controllers\Admin\McodeFeatureController@massDestroy')->name('mcode-features.massDestroy');
    Route::resource('mcode-features', '\Modules\Mcode\Http\Controllers\Admin\McodeFeatureController');


    Route::delete('mcode-categories/destroy', '\Modules\Mcode\Http\Controllers\Admin\McodeCategoryController@massDestroy')->name('mcode-categories.massDestroy');
    Route::resource('mcode-categories', '\Modules\Mcode\Http\Controllers\Admin\McodeCategoryController');
    // M Code Category
    // Route::delete('mcode-categories/destroy', 'Admin\McodeCategoryController@massDestroy')->name('mcode-categories.massDestroy');
    // Route::post('mcode-categories/media', 'Admin\McodeCategoryController@storeMedia')->name('mcode-categories.storeMedia');
    // Route::post('mcode-categories/ckmedia', 'Admin\MCodeCategoryController@storeCKEditorImages')->name('mcode-categories.storeCKEditorImages');
    // Route::resource('m-code-categories', 'Admin\MCodeCategoryController');

});


// Route::resource('admin/mcode-features', '\Modules\Mcode\Http\Controllers\Admin\McodeFeatureController');

// Modules\Admin\Controllers\AdminController@index


Route::prefix('mcode')->group(function() {
    Route::get('/', 'McodeController@index');
});
