<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Blog;
use App\Models\BlogImage;
use Livewire\Component;

class BlogDetails extends Component
{
    public $slug;

    public function render()
    {
        $this->blog_images = BlogImage::where('status', 1)->latest()->get();
        return view('livewire.frontend.blog-details')->layout('layouts.frontend.app');
    }

    public function mount(Blog $blog)
    {
        $this->blog = Blog::where('slug', $this->slug)->first();
    }
}
