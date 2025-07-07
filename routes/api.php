<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use function Pest\Laravel\post;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('user', UserController::class)->only(['index', 'show', 'store', 'destroy'])->names([
    'index' => 'api.user.index',
    'show' => 'api.user.show',
    'store' => 'api.user.strore',
    'destroy' => 'api.user.destroy'
]);

Route::post('user/{user}/update', [UserController::class, 'update'])->name('api.user.update');