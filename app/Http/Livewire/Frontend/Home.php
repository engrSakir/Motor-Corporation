<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Car;

class Home extends Component
{
    public function render()
    {
        $dealcars = Car::orderBy('id','desc')->where('placement','deal_of_the_week')->get();
        $popularcars = Car::orderBy('id','desc')->where('placement','popular')->get();

        return view('livewire.frontend.home',compact('dealcars','popularcars'))
        ->layout('layouts.frontend.app');
    }
}
