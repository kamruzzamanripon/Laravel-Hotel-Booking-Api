<?php

use App\Http\Controllers\API\Frontend\RoomController;
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

Route::get('room', function () {
    return "hello Ripon, how are youxxx";
});

Route::get('all-room', [RoomController::class, 'index']);
Route::get('single-room/{id}', [RoomController::class, 'singleRoomDetails']);