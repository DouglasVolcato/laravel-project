<?php

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
Route::get('/{page?}', function ($page = 1) {
    $cardController = new CardSearchController();
    $cards = $cardController->getCards($page);

    return view('home', ['cards' => $cards]);
})->name('cards');
