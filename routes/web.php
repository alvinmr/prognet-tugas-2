<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[AnimalController::class,'index']);
Route::get('/new',[AnimalController::class,'newanimal']);
Route::post('/savenew',[AnimalController::class,'savenewanimal']);
Route::get('/{id}/detail',[AnimalController::class,'animaldetail']);
Route::get('/{id}/edit',[AnimalController::class,'animaledit']);
Route::post('/{id}/saveedit',[AnimalController::class,'saveedit']);
Route::post('/{id}/delete',[AnimalController::class,'deleteanimal']);