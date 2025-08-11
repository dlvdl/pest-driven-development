<?php

use App\Http\Controllers\PageHomeController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', PageHomeController::class)->name('home');

require __DIR__.'/auth.php';
