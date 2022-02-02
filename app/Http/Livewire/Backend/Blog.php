<?php

namespace App\Http\Livewire\Backend;

use App\Models\Blog as ModelsBlog;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Blog extends Component
{
    use WithFileUploads;

    public $title, $image, $description, $selected_blog;

    public function create()
    {
        $this->title = $this->description = $this->image = null;
    }

    public function render()
    {
        $this->blogs = ModelsBlog::latest()->get();
        return view('livewire.backend.blog')->layout('layouts.backend.app');
    }

    public function save()
    {
        if ($this->selected_blog) {
            $this->validate([
                'title' => 'required|string',
                'description' => 'required|string',
            ]);
            $model = $this->selected_blog;
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Updated!']);
        } else {
            $this->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'required|file',
            ]);
            $model = new ModelsBlog();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Saved!']);
        }
        $model->title = $this->title;
        $model->description = $this->description;
        $model->slug = Str::slug($this->title);
        if ($this->image)
            $model->image = 'storage/' . $this->image->store('blogs', 'public');
        $model->save();
        $this->create();
    }

    public function select_blog(ModelsBlog $blog, $purpose)
    {
        if ($purpose == 'edit') {
            $this->selected_blog = $blog;
            $this->title = $this->selected_blog->title;
            $this->description = $this->selected_blog->description;
        } else if ($purpose == 'delete') {
            $blog->delete();
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Successfully Deleted!!']);
        } else if ($purpose == 'status') {
            $blog->status = !$blog->status;
            $blog->save();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Status Updated Successfully!']);
        }
    }
}
