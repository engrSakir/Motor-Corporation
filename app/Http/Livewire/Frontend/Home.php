<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Car;
use App\Models\CarCategory;
use Illuminate\Support\Facades\DB;

class Home extends Component
{
    public $dealcars, $popularcars, $categories, $brands, $models;

    public function mount()
    {
        $this->dealcars = Car::orderBy('id','desc')->where('placement','deal_of_the_week')->get();
        $this->popularcars = Car::orderBy('id','desc')->where('placement','popular')->get();
        //Category
        $this->categories = CarCategory::all();
        //Brands
        $brands = Car::where('status', 'Available')->get()->groupBy('brand');
        $this->brands = array();
        foreach($brands as $brand => $brand_cars){
            array_push($this->brands, $brand);
        }
        //models
        $models = Car::where('status', 'Available')->get()->groupBy('model');
        $this->models = array();
        foreach($models as $model => $model_cars){
            array_push($this->models, $model);
        }
    }

    public function render()
    {
        return view('livewire.frontend.home')
        ->layout('layouts.frontend.app');
    }
}
