<?php
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Frontend Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [FrontendController::class, 'home'])->name('home');