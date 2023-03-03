<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Mail\EmailTemplateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
 */

# login routes
Route::middleware('guest:Admin.dashboard')->name('Admin.')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/dologin', [AdminAuthController::class, 'doLogin'])->name('doLogin');
});

Route::middleware('admin')->name('Admin.')->group(function () {
    # dashboard route
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');

    Route::get('/change-password', [AdminController::class, 'showChangePassword'])->name('change-password');

    // catch-all route for non-existent admin routes
    // Route::any('{any}', function () {
    //     return redirect(route('Admin.login'));
    // })->where('any', '.*');

    Route::get('/', function () {
        return redirect(route('Admin.login'));
    });



    # admin agency routes
    Route::prefix('agency')->group(function () {
        Route::get('/', [AgencyController::class, 'showAgencies'])->name('agencyListing');
        Route::get('/json', [AgencyController::class, 'tableJson'])->name('agencyJson');

        Route::get('/show/{id}', [AgencyController::class, 'viewAgency'])->name('viewAgency');
        Route::get('/edit/{id}', [AgencyController::class, 'editAgency'])->name('editAgency');
        Route::post('/update/{id}', [AgencyController::class, 'updateAgency'])->name('updateAgency');
        Route::get('/add', [AgencyController::class, 'addAgency'])->name('addAgency');
        Route::post('/create', [AgencyController::class, 'createAgency'])->name('createAgency');
        Route::delete('/delete/{id}', [AgencyController::class, 'deleteAgency'])->name('deleteAgency');

        Route::post('/delete/agency/{id}', [AgencyController::class, 'deleteAgencyByAdmin'])->name('deleteAgencyByAdmin');

    });

    # admin Client routes
    // Route::prefix('client')->group(function () {
    //     Route::get('/', [ClientController::class, 'showClients'])->name('clientListing');
    //     Route::get('/json', [ClientController::class, 'tableJson'])->name('clientJson');
    //     Route::get('/show/{id}', [ClientController::class, 'viewClient'])->name('');
    //     Route::get('/edit/{id}', [ClientController::class, 'editClient'])->name('');
    //     Route::post('/update/{id}', [ClientController::class, 'updateClient'])->name('updateClient');
    //     Route::get('/add', [ClientController::class, 'addClient'])->name('addClient');
    //     Route::post('/create', [ClientController::class, 'createClient'])->name('createClient');
    //     Route::delete('/delete/{id}', [ClientController::class, 'deleteClient'])->name('deleteClient');
    // });

    # admin candidate routes
    Route::prefix('candidate')->group(function () {
        Route::get('/', [CandidateController::class, 'showCandidates'])->name('candidateListing');
        Route::get('/json', [CandidateController::class, 'tableJson'])->name('candidateJson');
        Route::get('/show/{id}', [CandidateController::class, 'viewCandidate'])->name('viewCandidate');
        Route::get('/edit/{id}', [CandidateController::class, 'editCandidate'])->name('editCandidate');
        Route::post('/update/{id}', [CandidateController::class, 'updateCandidate'])->name('updateCandidate');
        Route::get('/add', [CandidateController::class, 'addCandidate'])->name('addCandidate');
        Route::post('/create', [CandidateController::class, 'createCandidate'])->name('createCandidate');
        Route::delete('/delete/{id}', [CandidateController::class, 'deleteCandidate'])->name('deleteCandidate');
    });

    # routes
    Route::prefix('email-templates')->group(function () {
        Route::get('/', [EmailTemplateController::class, 'showEmailTemplates'])->name('emailTemplateListing');
        Route::get('/json', [EmailTemplateController::class, 'tableJson'])->name('emailTemplateJson');
        Route::get('/show/{id}', [EmailTemplateController::class, 'viewEmailTemplate'])->name('viewEmailTemplate');
        Route::get('/edit/{id}', [EmailTemplateController::class, 'editEmailTemplate'])->name('editEmailTemplate');
        Route::post('/update/{id}', [EmailTemplateController::class, 'updateEmailTemplate'])->name('updateEmailTemplate');
        Route::get('/add', [EmailTemplateController::class, 'addEmailTemplate'])->name('addEmailTemplate');
        Route::post('/create', [EmailTemplateController::class, 'createEmailTemplate'])->name('createEmailTemplate');
        Route::delete('/delete/{id}', [EmailTemplateController::class, 'deleteEmailTemplate'])->name('deleteEmailTemplate');
    });

});
