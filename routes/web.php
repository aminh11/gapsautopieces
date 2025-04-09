<?php

use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('index');

// Test route (optional)
Route::get('/test-view', function () {
    return view('livewire.components.layouts.app');
});