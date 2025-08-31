<?php

use App\Http\Controllers\PageCourseController;
use App\Http\Controllers\PageDashboardController;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PageVideosController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', PageHomeController::class)->name('pages.home');

Route::get('/courses/{course:slug}', PageCourseController::class)->name('pages.course-details');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', PageDashboardController::class)->name('dashboard');
    Route::get('/videos/{course:slug}/{video:slug?}', PageVideosController::class)->name('page.course-videos');

    Route::redirect('/settings', 'settings/profile');

    Volt::route('/settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('/settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::webhooks('webhooks');

require __DIR__.'/auth.php';
