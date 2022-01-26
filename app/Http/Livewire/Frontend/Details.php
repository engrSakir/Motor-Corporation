<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;

class Details extends Component
{
    public $car, $slug, $carImages;
    public  $name, $email, $phone, $message;

    public function mount()
    {
        $this->car = Car::where('slug', $this->slug)->first();
    }

    public function render()
    {
        return view('livewire.frontend.details')
            ->layout('layouts.frontend.app');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required'
        ]);
        $model = new Contact();
        $model->car_id = $this->car->id;
        $model->name = $this->name;
        $model->email = $this->email;
        $model->phone = $this->phone;
        $model->message = $this->message;
        $model->save();

        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->message = null;

        Session::flash('message', 'Successfully Send!!');
    }
}
