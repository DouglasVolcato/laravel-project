<?php

use App\Http\Controllers\collection\AddCardController;
use App\Http\Controllers\mtg\CardSearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CardSearchController::class, 'showCardListView'])->name('cardList');

Route::get('/register-card-form', [AddCardController::class, 'showCardRegistrationView'])->name('cardRegistrationView');
Route::get('/register-card', [AddCardController::class, 'addCard'])->name('cardRegistration');
