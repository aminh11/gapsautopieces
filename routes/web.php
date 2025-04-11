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
use App\Livewire\HomePage;
use App\Livewire\MescommandesPages;
use App\Livewire\PieceoccassionPages;
use App\Livewire\SuccessPage;
use App\Livewire\VerifierpaiementPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/catalogue',CataloguePage::class);
Route::get('/pieceoccassion',PieceoccassionPages::class);
Route::get('/cart',CartPage::class);
Route::get('/pieceoccassion/{pieceoccassion}', DetailpieceoccassionPage::class);
Route::get('/verifierpaiment',VerifierpaiementPage::class);
Route::get('/mescommandes',MescommandesPages::class);
Route::get('/mescommandes/{commande}', DetailmescommandesPage::class);
Route::get('/login', LoginPage::class);
Route::get('/register', RegisterPage::class);
Route::get('/forgot', ForgotPasswordPage ::class);
Route::get('/reset', ResetPasswordPage ::class);
Route::get('/success', SuccessPage::class);
Route::get('/cancel', CancelPage::class);





// Test route (optional)
Route::get('/test-view', function () {
    return view('livewire.components.layouts.app');
});