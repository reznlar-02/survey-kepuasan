<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\SurveyKepuasanController;

// Middleware 'auth' memastikan pengguna telah login.
// Middleware 'role:admin' memastikan pengguna memiliki peran 'admin'.
Route::middleware(['auth', 'role:admin'])->group(function () {

    // Rute Dashboard Admin
    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])
        ->name('admin.dashboard');

    // Rute Manajemen Questioner
    Route::get('/admin/manage/questioner', [AdminAuthController::class, 'manageQuestioner'])
        ->name('admin.manage.questioner');

    // Rute Manajemen Struktur Organisasi
    Route::get('/admin/manage/struktur-organisasi', [AdminAuthController::class, 'manageStrukturOrganisasi'])
        ->name('admin.manage.struktur-organisasi');

    // Survey
    Route::get('/survey/{pendidikan_id}', [SurveyKepuasanController::class, 'showSurvey'])
        ->name('survey.show'); // Rute untuk menampilkan survey berdasarkan pendidikan
    
    Route::get('/survey/thank-you', [SurveyKepuasanController::class, 'storeSurvey'])
        ->name('survey.store'); // Rute untuk menyimpan survey
    
    Route::get('/survey', [SurveyKepuasanController::class, 'index'])
        ->name('survey.index'); // Daftar survey
    
    Route::delete('/survey/delete/{id}', [SurveyKepuasanController::class, 'destroy'])
        ->name('survey.delete'); // Hapus survey
});