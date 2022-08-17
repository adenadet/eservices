<?php 
use App\Http\Controllers\Api\Chats\RoomController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'rooms' => 'RoomController',
]);
