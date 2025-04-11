<?php

use App\Livewire\CartPage;
use App\Livewire\CataloguePage;
use App\Livewire\HomePage;
use App\Livewire\PieceoccassionPages;
use App\Livewire\ProduitsPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/catalogue',CataloguePage::class);
Route::get('/pieces-occasion',PieceoccassionPages::class);
Route::get('/cart',CartPage::class);



// Test route (optional)
Route::get('/test-view', function () {
    return view('livewire.components.layouts.app');
});