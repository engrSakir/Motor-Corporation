<?php

namespace App\Http\Livewire\Backend;

use App\Models\Instagram as ModelsInstagram;
use Livewire\Component;
use Livewire\WithFileUploads;

class Instagram extends Component
{
    use WithFileUploads;
    public $image, $url, $selected_instagram, $instagrams;

    public function render()
    {
        $this->instagrams = ModelsInstagram::latest()->get();
        return view('livewire.backend.instagram')->layout('layouts.backend.app');
    }

    public function save()
    {
        $this->validate([
            'image' => 'required|image',
            'url' => 'required|url'
        ]);

        if ($this->selected_instagram) {
            $model = $this->selected_instagram;
        } else {
            $model = new ModelsInstagram();
        }
        if ($this->image) {
            $model->image = 'storage/' . $this->image->store('Instagram', 'public');
        }
        $model->url = $this->url;
        $model->save();
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message', 'Successfully Done!!']);
    }

    public function select_instagram(ModelsInstagram $instagram, $purpose)
    {
        if ($purpose == 'edit') {
            $this->selected_instagram = $instagram;
            $this->url = $instagram->url;
        } elseif ($purpose == 'delete') {
            $instagram->delete();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message', 'Successfully Deleted!!']);
        } elseif ($purpose == 'status') {
            $instagram->status = !$instagram->status;
            $instagram->save();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message', 'Successfully Change Status!!']);
        }
    }
}
