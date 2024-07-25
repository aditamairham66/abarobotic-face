<?php

use App\Http\Controllers\Api\v1\Face\FaceController;
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

# face
Route::group([
  'prefix' => 'face',
  'as' => 'face.',
  'controller' => FaceController::class
], function () {
  Route::post('/', 'index')->name('index');
});