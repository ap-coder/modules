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
    // Route::delete('mcode-features/destroy', 'McodeFeatureController@massDestroy')->name('admin.mcode-features.massDestroy');
    // Route::resource('admin.mcode-features', 'McodeFeatureController');

    // M Code Category
    // Route::delete('mcode-categories/destroy', 'Admin\MCodeCategoryController@massDestroy')->name('m-code-categories.massDestroy');
    // Route::post('mcode-categories/media', 'Admin\MCodeCategoryController@storeMedia')->name('m-code-categories.storeMedia');
    // Route::post('mcode-categories/ckmedia', 'Admin\MCodeCategoryController@storeCKEditorImages')->name('m-code-categories.storeCKEditorImages');
    // Route::resource('m-code-categories', 'Admin\MCodeCategoryController');

});




// Route::group(array(
//     'prefix' => 'admin',
//     'module' => 'mcode',
//     'middleware' => ['web'],
//     'namespace' => 'Modules\Admin\Controllers'), function() {

//     Route::resource('admin', 'AdminController');

// });

Route::resource('admin/mcode-features', '\Modules\Mcode\Http\Controllers\Admin\McodeFeatureController');

// Modules\Admin\Controllers\AdminController@index


Route::prefix('mcode')->group(function() {
    Route::get('/', 'McodeController@index');
});
