<?php

use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\AttendeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('events', EventController::class);

//le participant sera lié à l'event specifique sinon erreur
Route::apiResource('events.attendees', AttendeeController::class)->scoped()->except(['update']);

//Route::apiResource('events.attendees', AttendeeController::class)->scoped(['attendee' => 'event']);

