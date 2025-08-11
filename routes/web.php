<?php

use App\Http\Controllers\PageCourseController;
use App\Http\Controllers\PageHomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', PageHomeController::class)->name('home');

Route::get('/courses/{course:slug}', PageCourseController::class)->name('course.details');

require __DIR__.'/auth.php';
