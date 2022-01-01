<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Car;
use App\Models\CarCategory;


class Home extends Component
{
    public $dealcars; 
    public $popularcars; 
    public $cartypes; 
    public $carmodels; 



    public function mount()
    {
        $this->dealcars = Car::orderBy('id','desc')->where('placement','deal_of_the_week')->get();
        $this->popularcars = Car::orderBy('id','desc')->where('placement','popular')->get();
        $this->cartypes = CarCategory::orderBy('id','desc')->get();
        $this->carmodels = Car::select('model')->orderBy('id','desc')->get();


    }

    public function render()
    {
        return view('livewire.frontend.home')
        ->layout('layouts.frontend.app');
    }
}
