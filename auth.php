<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->group(function(){

    
    Route::post('/refresh',[AuthController::class,'refresh'])->name('api.refresh');

    Route::get('/posts',[AuthController::class,'getPosts'])->name('api.users');
    Route::post('/logout',[AuthController::class,'logout'])->name('api.logout');
});  

// **** Route for login && registration

Route::post('/login',[AuthController::class,'loginApi'])->name('api.login');
Route::post('/register',[AuthController::class,'registerApi'])->name('api.register');
