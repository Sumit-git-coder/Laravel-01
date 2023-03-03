<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
 */

Route::get('/', [HomeController::class, 'index']);

Route::get('/admin/setting', function () {
    return view('admin.setting.index');
});



Route::view('/tenant-not-found', 'tenant.tenant-not-found');

Auth::routes();

// Import the admin routes file
Route::prefix('admin')->namespace('Admin')->group(base_path('routes/panel/admin.php'));


// Route::get('/email',[EmailController::class,'email']);

Route::get('/user',[EmailController::class,'index'])->name('user');
Route::get('/email/{id}',[EmailController::class,'EmailView'])->name('send.email');
Route::post('/Storeemail/{id}',[EmailController::class,'StoreSingleEmail'])->name('store.user.email');