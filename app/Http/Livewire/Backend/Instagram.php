<?php

namespace App\Http\Livewire\Backend;

use App\Models\Instagram as ModelsInstagram;
use Livewire\Component;
use Livewire\WithFileUploads;

class Instagram extends Component
{
    use WithFileUploads;
    public $image, $url, $selected_instagram, $instagrams;
    public $video_url;

    public function render()
    {
        $this->instagrams = ModelsInstagram::latest()->get();
        return view('livewire.backend.instagram')->layout('layouts.backend.app');
    }
    public function save()
    {
        if ($this->selected_instagram) {
            $this->validate([
                'url' => 'required|url'
            ]);
            $model = $this->selected_instagram;
        } else {
            $this->validate([
                'image' => 'required|image',
                'url' => 'required|url'
            ]);
            $model = new ModelsInstagram();
        }
        if ($this->image) {
            $model->image = 'storage/' . $this->image->store('Instagram', 'public');
        }
        $model->url = $this->url;
        $model->save();
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Done']);
    }

    public function select_instagram(ModelsInstagram $instagram, $purpose)
    {
        if ($purpose == 'edit') {
            $this->selected_instagram = $instagram;
            $this->url = $instagram->url;
        } else if ($purpose == 'delete') {
            $instagram->delete();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Deleted']);
        } else if ($purpose == 'status') {
            $instagram->status = !$instagram->status;
            $instagram->save();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Updated']);
        }
    }

    public function save_video()
    {
        try {
            update_static_option('single_youtube_video', $this->video_url);
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message', 'Successfully Updated!!']);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message', $e->getMessage()]);
        }
    }
}
