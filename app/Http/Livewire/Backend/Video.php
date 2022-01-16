<?php

namespace App\Http\Livewire\Backend;

use App\Models\Video as ModelsVideo;
use Livewire\Component;

class Video extends Component
{
    public $videos, $status, $url, $title, $selected_video, $purpose, $video;

    public function render()
    {
        $this->videos = ModelsVideo::latest()->get();
        return view('livewire.backend.video')->layout('layouts.backend.app');
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required',
            'url' => 'required',
        ]);
        if ($this->selected_video) {
            $model = $this->selected_video;
        } else {
            $model = new ModelsVideo();
        }
        $model->title = $this->title;
        $model->url = $this->url;
        $model->save();

        $this->url = $this->title = null;
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Done']);
    }

    public function select_video(ModelsVideo $video, $purpose = null)
    {
        if ($purpose == 'edit') {
            $this->selected_video = $video;
            $this->title = $this->selected_video->title;
            $this->url = $this->selected_video->url;
        } else if ($purpose == 'delete') {
            $video->delete();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Done']);
        } else if ($purpose == 'status') {
            $video->status = !$video->status;
            $video->save();
        }
    }
}
