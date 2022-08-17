<?php

use Illuminate\Support\Facades\Route;

Route::get('/',  [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/category/{any}', function () {return view('welcome');})->where('any', '.*');
Route::get('/shop/{any}', function () {return view('welcome');})->where('any', '.*');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/app', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/patient', [App\Http\Controllers\HomeController::class, 'index'])->name('patient');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/app/admin',        [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/app/appointment',  [App\Http\Controllers\ModuleController::class, 'appointment'])->name('appointment');
    Route::get('/app/chats',        [App\Http\Controllers\ModuleController::class, 'chat'])->name('chats');
    Route::get('/app/dashboard',    [App\Http\Controllers\ModuleController::class, 'dashboard'])->name('dashboard');
    Route::get('/app/wallet',       [App\Http\Controllers\ModuleController::class, 'wallet'])->name('wallet');

    Route::get('/admin/{any}',      [App\Http\Controllers\AdminController::class, 'index'])->where('any', '.*')->name('admin/{any}');
    Route::get('/app/chats/{any}',  [App\Http\Controllers\ModuleController::class, 'chat'])->where('any', '.*'); 
    
});

Route::get('/app/{any}', [App\Http\Controllers\HomeController::class, 'index'])->where('any', '.*');
Route::get('/patient/{any}', [App\Http\Controllers\HomeController::class, 'index'])->where('any', '.*');
/*Routes for Payment 
Route::post('/pay', 'FlutterWaveController@initialize')->name('pay');
Route::get('/rave/callback', 'FlutterWaveController@callback')->name('callback');
*/
