<?php

use App\Http\Controllers\VesselController;
use App\Http\Controllers\VoyageController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


// ******* Voyage ******* //
Route::post('/voyages', [VoyageController::class, 'create']);
Route::put('/voyages/{id}', [VoyageController::class, 'update']);

// ****** Vessel ****** //
Route::post('/vessels/{id}/vessel-opex', [VesselController::class, 'create']);
Route::get('/vessels/{id}/financial-report', [VesselController::class, 'report']);
