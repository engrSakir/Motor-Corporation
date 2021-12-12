<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home', compact('dealcars','popularcars'));
    }

    public function carDetails($slug)
    {
        $car = Car::where('slug', $slug)->first();
        return view('frontend.car-details', compact('car'));

    }    
}
