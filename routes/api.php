<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::namespace('App\Http\Controllers\Api\Chats')->middleware('auth:api')->name('api.chats.')->prefix('/chats')->group(base_path('routes/api/chat.php'));
Route::namespace('App\Http\Controllers\Api\EMR')->middleware('auth:api')->name('api.emr.')->prefix('/emr')->group(base_path('routes/api/emr.php'));
Route::namespace('App\Http\Controllers\Api\Finance')->middleware('auth:api')->name('api.finance.')->prefix('/finance')->group(base_path('routes/api/finance.php'));
Route::namespace('App\Http\Controllers\Api\Inventory')->middleware('auth:api')->name('api.inventory.')->group(base_path('routes/api/inventory.php'));
Route::namespace('App\Http\Controllers\Api\Shop')->name('api.shop.')->prefix('/shop')->group(base_path('routes/api/shop.php'));
Route::namespace('App\Http\Controllers\Api\Ums')->middleware('auth:api')->name('api.ums.')->group(base_path('routes/api/ums.php'));

Route::namespace('App\Http\Controllers\Api')->middleware('auth:api')->name('api.dashboard.')->prefix('/dashboard')->group(base_path('routes/api/dashboard.php'));

Route::apiResources([
    'member' => 'App\Http\Controllers\Api\MemberController',
]);