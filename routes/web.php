<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PinController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/verify-pin', [PinController::class, 'showPin'])->name('pin.show');
    Route::post('/verify-pin', [PinController::class, 'verifyPin'])->name('pin.verify');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/leads', [LeadController::class, 'index']);
    Route::get('/leads/create', [LeadController::class, 'create']);
    Route::post('/leads', [LeadController::class, 'store']);
    Route::get('/leads/{id}/edit', [LeadController::class, 'edit']);
    Route::put('/leads/{id}', [LeadController::class, 'update']);
    Route::delete('/leads/{id}', [LeadController::class, 'destroy']);
    Route::post('/leads/{id}/convert', [LeadController::class, 'convert']);

    Route::get('/clients', [ClientController::class, 'index']);
    Route::get('/clients/{id}', [ClientController::class, 'show']);
    Route::post('/clients/{id}/update', [ClientController::class, 'update']);

    Route::get('/meetings', [MeetingController::class, 'index']);
    Route::get('/meetings/create', [MeetingController::class, 'create']);
    Route::post('/meetings', [MeetingController::class, 'store']);

    Route::get('/chat', [MessageController::class, 'index']);
    Route::get('/chat/{user_id}', [MessageController::class, 'show']);
    Route::post('/chat/send', [MessageController::class, 'send']);

    Route::get('/client', function () {
        return view('client', ['user' => auth()->user()]);
    });
});

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
