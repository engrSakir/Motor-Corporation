<?php
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Livewire\Frontend\Booking;
use App\Http\Livewire\Frontend\Home;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Frontend Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', Home::class)->name('home');
Route::get('/booking', Booking::class)->name('booking');