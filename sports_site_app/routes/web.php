<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Nfl\Users\TopController;
use App\Http\Controllers\Nfl\Users\TeamController;
use App\Http\Controllers\Nfl\Users\StandingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('nfl')->group(function () {
  Route::get('/', [TopController::class, 'index']);
  Route::get('/teams', [TeamController::class, 'show']);
  Route::get('/standing', [StandingController::class, 'index']);
});

Route::prefix('/api/nfl')->group(function () {
  Route::post('/standings', [StandingController::class, 'standings']);
});

?>
