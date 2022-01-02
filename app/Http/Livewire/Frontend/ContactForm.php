<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Mail;

class ContactForm extends Component
{
    public  $name = '';
    public  $email = '';
    public  $phone = '';
    public  $shortmsg = '';

    public function submit()
    {
        $this->validate([
            'name' => 'required',
             'email' => 'required|email',
              'phone' => 'required|numeric',
              'shortmsg' => 'required'
              ]);
        $data = ['name' => $this->name , 'email' => $this->email ,'phone' => $this->phone , 'messageBody' => $this->shortmsg ];
        Mail::send('emails.email', $data, function ($message) use ($data)        {
            $message->from($data['email'], $data['name']);
            $message->to('moumitasub@gmail.com', 'Admin')
                ->subject('Contact Us Message');
        });

        $this->name=null;
        $this->email=null;
        $this->phone=null;
        $this->shortmsg=null;
        

    }

    public function render()
    {
        return view('livewire.frontend.contact-form')->layout('layouts.frontend.app');
    }
}
