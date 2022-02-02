<?php

namespace App\Http\Livewire\Backend;

use App\Models\Blog;
use App\Models\BlogImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogDetails extends Component
{
    use WithFileUploads;
    public $blog, $image, $selected_image;
    public function render()
    {
        $this->blog_images = BlogImage::latest()->get();
        return view('livewire.backend.blog-details')->layout('layouts.backend.app');
    }

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function save()
    {
        if ($this->selected_image) {
            $model = $this->selected_image;
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Updated!']);
        } else {
            $this->validate([
                'image' => 'required|file',
            ]);
            $model = new  BlogImage();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Saved!']);
        }
        if ($this->image) {
            $model->image = 'storage/' . $this->image->store('blogs', 'public');
        }
        $model->save();
        $this->image = null;
    }

    public function select_image(BlogImage $blog_image, $purpose)
    {
        if ($purpose == 'edit') {
            $this->selected_image = $blog_image;
        } elseif ($purpose == 'delete') {
            $blog_image->delete();
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Successfully Deleted!']);
        } elseif ($purpose == 'status') {
            $blog_image->status = !$blog_image->status;
            $blog_image->save();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Status Updated Successfully!']);
        }
    }
}
