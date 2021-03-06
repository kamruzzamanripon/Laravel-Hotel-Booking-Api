<?php

//header('Access-Control-Allow-Headers: Authorization');

use App\Http\Controllers\API\BookingPaymentController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// header('Access-Control-Allow-Origin:*');
// header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
// header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('room', function () {
    return "hello Ripon, how are youxxx";
});

Route::post('login', [UserController::class, "login"]);
Route::post('register', [UserController::class, 'register']);



Route::get('all-room', [RoomController::class, 'index']);


Route::group(["middleware" => ["auth:sanctum"]], function(){
    Route::post('logout', [UserController::class, "logout"]);
    
    Route::get('single-room/{id}', [RoomController::class, 'singleRoomDetails']);
    Route::post('single-room-create', [RoomController::class, 'singleRoomCreate']);
    Route::put('single-room-update/{id}', [RoomController::class, 'singleRoomUpdate']);
    Route::delete('single-room-delete/{id}', [RoomController::class, 'singleRoomDelete']);

    //booking/?id=${id}&checkin=${checkin}&checkout=${checkout}
    Route::get('booking', [BookingPaymentController::class, 'bookingRoom']);
    Route::get('booking-date/{id}', [BookingPaymentController::class, 'bookingDateCollection']);
});

