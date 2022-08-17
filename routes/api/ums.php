<?php 
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Ums\BioController;
use App\Http\Controllers\Api\Ums\NOKController;
use App\Http\Controllers\Api\Ums\RoleController;
use App\Http\Controllers\Api\Ums\UserController;

Route::group(['prefix'=>'ums'], function () {
    
    Route::get('/profile', 'UserController@profile')->name('profile.initials');
    Route::post('/password', 'UserController@password')->name('profile.password');
    Route::get('/users/initials', 'UserController@initials')->name('users.initials');
    Route::get('/users/registration', 'UserController@registration')->name('users.registration');
    Route::get('/users/search', 'UserController@search')->name('users.search');
    
    Route::apiResources([
        '/bios' => 'BioController',
        '/nok' => 'NOKController',
        '/roles' => 'RoleController',
        '/users' => 'UserController',
        //'/profile' => 'ProfileController',
    ]);
});