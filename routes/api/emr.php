<?php 
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EMR\AppointmentController;
    
Route::apiResources([
    '/agencies'     => 'AgencyController',
    '/appointments' => 'AppointmentController',
    '/doctors'      => 'DoctorController',
    '/hospitals'    => 'HospitalController',
    '/payments'     => 'PaymentController',
]);
