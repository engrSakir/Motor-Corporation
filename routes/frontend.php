<?php

use App\Http\Livewire\Frontend\BlogDetails;
use App\Http\Livewire\Frontend\Booking;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\ContactForm;
use App\Http\Livewire\Frontend\Details;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Frontend Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', Home::class)->name('home');
Route::get('/booking', Booking::class)->name('booking');
Route::get('/car/{slug}', Details::class)->name('details');
Route::get('/contact-us', ContactForm::class)->name('contact');
Route::get('/blog/{slug}', BlogDetails::class)->name('blogDetails');
