<?php 
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Finance\PaymentController;
use App\Http\Controllers\Api\Finance\TopUpController;
use App\Http\Controllers\Api\Finance\WalletController;
    
Route::apiResources([
    '/payments' => 'PaymentController',
    '/topups'   => 'TopUpController',
    '/wallet'   => 'WalletController',
]);
