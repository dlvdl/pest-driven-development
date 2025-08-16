<?php

use App\Http\Controllers\PageCourseController;
use App\Http\Controllers\PageDashboardController;
use App\Http\Controllers\PageHomeController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', PageHomeController::class)->name('pages.home');

Route::get('/courses/{course:slug}', PageCourseController::class)->name('pages.course-details');

Route::middleware(['auth', 'verified'])
    ->get('dashboard', PageDashboardController::class)
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
