<?php

use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CataloguePage;
use App\Livewire\DetailmescommandesPage;
use App\Livewire\DetailpieceoccassionPage;
use App\Livewire\EncheresPages;
use App\Livewire\HomePage;
use App\Livewire\MescommandesPages;
use App\Livewire\PieceoccassionPages;
use App\Livewire\SuccessPage;
use App\Livewire\VerifierpaiementPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/catalogue', CataloguePage::class);
Route::get('/pieceoccassion', PieceoccassionPages::class);
Route::get('/cart', CartPage::class);
Route::get('/pieceoccassion/{slug}', DetailpieceoccassionPage::class);

// Middleware invité
Route::middleware('guest')->group(function () {
    Route::get('/login', LoginPage::class)->name('login');  
    Route::get('/register', RegisterPage::class);
    Route::get('/forgot', ForgotPasswordPage::class)->name('password.request');
    Route::get('/reset/{token}', ResetPasswordPage::class)->name('password.reset');
});

// Middleware authentifié
Route::middleware('auth')->group(function () {
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/verifierpaiment', VerifierpaiementPage::class);
    Route::get('/mescommandes', MescommandesPages::class);
    Route::get('/mescommandes/{order_id}', DetailmescommandesPage::class)->name('mes-commandes.afficher');
    Route::get('/success', SuccessPage::class)->name('success');
    Route::get('/cancel', CancelPage::class)->name('cancel');
    Route::get('/encheres', EncheresPages::class);
    Route::get('/encheres/{id}', \App\Livewire\AuctionDetailPage::class)->name('auction.detail');
});

// Test View
Route::get('/test-view', function () {
    return view('livewire.components.layouts.app');
});