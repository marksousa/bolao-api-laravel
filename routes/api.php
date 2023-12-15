<?php

use App\Http\Controllers\Api\V1\TournamentController;
use App\Http\Controllers\Api\V1\SportController;
use App\Http\Controllers\Api\V1\BetController;
use App\Http\Controllers\Api\V1\GameController;
use App\Http\Controllers\Api\V1\Auth;
use App\Http\Controllers\Api\V1\RankingController;
use App\Http\Controllers\Api\V1\SeasonController;
use App\Http\Controllers\Api\V1\TeamController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::post('auth/register', Auth\RegisterController::class);
Route::post('auth/login', Auth\LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [Auth\ProfileController::class, 'show']);
    Route::put('profile', [Auth\ProfileController::class, 'update']);
    Route::put('password', Auth\PasswordUpdateController::class);
    Route::post('auth/logout', Auth\LogoutController::class);

    Route::apiResource('tournaments', TournamentController::class);
    Route::apiResource('sports', SportController::class);
    Route::apiResource('games', GameController::class);
    Route::apiResource('bets', BetController::class);
    Route::apiResource('teams', TeamController::class);
    Route::apiResource('seasons', SeasonController::class);
    Route::apiResource('rankings', RankingController::class);
});
