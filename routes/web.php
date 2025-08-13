<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\KomandanController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\QuestionerController;
use App\Http\Controllers\SurveyKepuasanController; // Pastikan controller ini sudah diimport
use App\Http\Controllers\ElibraryController;

// Static Pages
Route::view('/', 'landing')->name('landing');
Route::view('/home', 'home')->name('home');
Route::view('/struktur-organisasi', 'struktur_organisasi')->name('struktur_organisasi');

// E-Library Routes
Route::prefix('elibrary')->name('elibrary.')->group(function () {
    Route::get('/', [ElibraryController::class, 'index'])->name('index');
    Route::get('/create', [ElibraryController::class, 'create'])->name('create');
    Route::post('/', [ElibraryController::class, 'store'])->name('store');
    Route::get('/search', [ElibraryController::class, 'search'])->name('search');
});

// Questioner Routes
Route::prefix('questioner')->group(function () {
    Route::get('/form', [QuestionerController::class, 'form'])->name('questioner.form');
    Route::post('/datadiri', [DataDiriController::class, 'store'])->name('datadiri.store');
    Route::post('/kunjungan/store', [KunjunganController::class, 'store'])->name('kunjungan.store');
    Route::get('/list', [QuestionerController::class, 'index'])->name('questioner.index');
    Route::get('/survey/{pendidikan_id}', [SurveyKepuasanController::class, 'showSurvey'])->name('survey.form');
    Route::get('/survey/thank-you', [SurveyKepuasanController::class, 'storeSurvey'])->name('survey.store');
    Route::post('/survey/store', [SurveyKepuasanController::class, 'storeSurvey'])->name('survey.store');
    Route::get('/survey', [SurveyKepuasanController::class, 'index'])->name('survey.index');
    Route::delete('/survey/delete/{id}', [SurveyKepuasanController::class, 'destroy'])->name('survey.delete');
});

// Komandan Routes
Route::prefix('komandan')->group(function () {
    Route::get('/', [KomandanController::class, 'index'])->name('komandan.index');
});

// Pengumuman Routes
Route::prefix('pengumuman')->group(function () {
    Route::get('/', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::get('/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('/', [PengumumanController::class, 'store'])->name('pengumuman.store');
});

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login');

    Route::middleware('auth::admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});

