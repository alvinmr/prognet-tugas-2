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

Route::get('/', [AnimalController::class, 'index']);
Route::prefix('animal')->group(function () {
    Route::get('/new', [AnimalController::class, 'newanimal'])->name('animal');
    Route::post('/savenew', [AnimalController::class, 'savenewanimal'])->name('save');
    Route::get('/{id}/detail', [AnimalController::class, 'animaldetail'])->name('detail');
    Route::get('/{id}/edit', [AnimalController::class, 'animaledit'])->name('edit');
    Route::post('/{id}/saveedit', [AnimalController::class, 'saveedit'])->name('save.edit');
    Route::post('/{id}/delete', [AnimalController::class, 'deleteanimal'])->name('delete');
});