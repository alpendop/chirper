<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('chirps')->group(function () {
    Route::post('/create', [PostController::class, 'store'])->name('chirps.store');
    Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('chirps.destroy');
})->middleware('auth:sanctum');

Route::get('/chirps', [PostController::class, 'index'])->name('chirps.index');
Route::get('/chirps/{id}', [PostController::class, 'show'])->name('chirps.show');

Route::prefix('comments')->group(function () {
    Route::post('/create', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('delete/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::get('comments/{id}', [CommentController::class, 'show'])->name('comments.index');