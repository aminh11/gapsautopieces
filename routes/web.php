<?php

use App\Livewire\CataloguePage;
use App\Livewire\HomePage;
use App\Livewire\ProductPages;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/catalogue',CataloguePage::class);

// Test route (optional)
Route::get('/test-view', function () {
    return view('livewire.components.layouts.app');
});