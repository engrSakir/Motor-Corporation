<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Car;
use App\Models\CarImage;

class Details extends Component
{
    public $car, $slug, $carImages;

    public function mount()
    {
        $this->car = Car::where('slug', $this->slug)->first();
        $this->carImages = CarImage::latest()->get();
    }

    public function render()
    {
        return view('livewire.frontend.details')
            ->layout('layouts.frontend.app');
    }
}
