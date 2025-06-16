<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use function Pest\Laravel\post;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('user', UserController::class)->only(['index', 'show', 'store', 'update', 'destroy'])->names([
    'index' => 'api.user.index',
    'show' => 'api.user.show',
    'store' => 'api.user.strore',
    'update' => 'api.user.update',
    'destroy' => 'api.user.destroy'
]);