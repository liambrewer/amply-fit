<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:web'])->group(static function(): void {
    Route::view('/', 'app.dashboard')->name('dashboard');
});

Route::middleware(['guest'])->group(static function(): void {
    Route::view('login', 'app.auth.login')->name('login:show');
    Route::get('login/{email}', LoginController::class)->middleware(['signed'])->name('login:store');

    Route::view('register', 'app.auth.register')->name('register:show');

    Route::view('email-sent', 'app.auth.email-sent')->name('email-sent');
});
