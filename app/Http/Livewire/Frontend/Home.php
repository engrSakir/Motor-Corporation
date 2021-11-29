<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Car;

class Home extends Component
{
    public $dealcars; 
    public $popularcars; 

    public function mount()
    {
        $this->dealcars = Car::orderBy('id','desc')->where('placement','deal_of_the_week')->get();
        $this->popularcars = Car::orderBy('id','desc')->where('placement','popular')->get();
    }

    public function render()
    {
        return view('livewire.frontend.home')
        ->layout('layouts.frontend.app');
    }
}
