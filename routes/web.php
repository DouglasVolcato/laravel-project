<?php

use App\Http\Controllers\collection\AddCardController;
use App\Http\Controllers\collection\DeleteCardController;
use App\Http\Controllers\collection\EditCardController;
use App\Http\Controllers\collection\GetCardController;
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

Route::post('/register-card-form', [AddCardController::class, 'showCardRegistrationView'])->name('cardRegistrationViewParameters');
Route::get('/register-card-form', [AddCardController::class, 'showCardRegistrationView'])->name('cardRegistrationView');

Route::post('/register-card', [AddCardController::class, 'addCard'])->name('cardRegistration');
Route::patch('/edit-card', [EditCardController::class, 'editCard'])->name('cardEdition');

Route::get('/card-collection', [GetCardController::class, 'showCardCollectionListView'])->name('cardCollection');

Route::get('/remove-card', [DeleteCardController::class, 'deletecard'])->name('removeCard');
