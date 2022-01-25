<?php

namespace App\Http\Livewire\Backend;

use App\Models\Car;
use App\Models\CarImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CarDetails extends Component
{
    use WithFileUploads;
    public $car, $image, $selected_image, $car_images;

    public function render()
    {
        $this->car_images = CarImage::where('car_id', $this->car->id)->latest()->get();
        return view('livewire.backend.car-details')->layout('layouts.backend.app');
    }

    public function mount(Car $car)
    {
        $this->car = $car;
    }

    public function save()
    {
        $this->validate([
            'image' => 'required|image',
        ]);

        if ($this->selected_image) {
            $model = $this->selected_image;
        } else {
            $model = new CarImage();
        }
        $model->car_id = $this->car->id;
        if ($this->image) {
            $model->image = 'storage/' . $this->image->store('carDetails', 'public');
        }
        $model->save();
        $this->image = $this->selected_image = null;
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message', 'Successfully Done!!']);
    }

    public function select_image(CarImage $carImage, $purpose)
    {
        if ($purpose == 'edit') {
            $this->selected_image = $carImage;
        } elseif ($purpose == 'delete') {
            $carImage->delete();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message', 'Successfully Deleted!!']);
        } elseif ($purpose == 'status') {
            $carImage->status = !$carImage->status;
            $carImage->save();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message', 'Successfully Change Status!!']);
        }
    }
}
