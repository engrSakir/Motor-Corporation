<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Car;
use App\Models\CarCategory;
use App\Models\Instagram;
use App\Models\Video;
use Illuminate\Support\Facades\DB;

class Home extends Component
{
   public $categories, $brands, $models, $category, $brand, $model, $videos;
   public $cars, $instagrams;

   public function search()
   {
      $cars = Car::latest()->where('status', 'Available');
      $cars->when($this->category, function ($query) {
         $query->where('car_category_id', $this->category);
      });

      $cars->when($this->brand, function ($query) {
         $query->where('brand', $this->brand);
      });

      $cars->when($this->model, function ($query) {
         $query->where('model', $this->model);
      });

      $this->cars = $cars->get();
   }


   public function mount()
   {
      $this->cars = Car::latest()->where('status', 'Available')->get();
      $this->instagrams = Instagram::latest()->where('status', 1)->get();
      $this->videos = Video::latest()->get();

      $this->categories = CarCategory::all();
      $brands = Car::where('status', 'Available')->get()->groupBy('brand');
      $this->brands = array();
      foreach ($brands as $brand => $brand_cars) {
         array_push($this->brands, $brand);
      }
      //models
      $models = Car::where('status', 'Available')->get()->groupBy('model');
      $this->models = array();
      foreach ($models as $model => $model_cars) {
         array_push($this->models, $model);
      }
   }

   public function render()
   {
      return view('livewire.frontend.home')
         ->layout('layouts.frontend.app');
   }
}
