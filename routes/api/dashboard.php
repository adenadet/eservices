<?php 

use Illuminate\Support\Facades\Route;
    
Route::get('/admin', 'DashboardController@admin')->name('dashboard.admin');
Route::get('/customer', 'DashboardController@customer')->name('dashboard.customer');
Route::get('/patient', 'DashboardController@patient')->name('dashboard.patient');
