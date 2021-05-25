<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/mcode', function (Request $request) {




    return $request->user();
});

// Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {

//     // Mcode Feature
//     Route::apiResource('mcode-features', 'McodeFeatureApiController');

//     // Mcode Category
//     Route::post('mcode-categories/media', 'McodeCategoryApiController@storeMedia')->name('mcode-categories.storeMedia');
//     Route::apiResource('mcode-categories', 'McodeCategoryApiController');

//     // Mcode
//     Route::post('mcodes/media', 'McodeApiController@storeMedia')->name('mcodes.storeMedia');
//     Route::apiResource('mcodes', 'McodeApiController');

//     // Mcode Product Model
//     Route::post('mcode-product-models/media', 'McodeProductModelApiController@storeMedia')->name('mcode-product-models.storeMedia');
//     Route::apiResource('mcode-product-models', 'McodeProductModelApiController');
// });
