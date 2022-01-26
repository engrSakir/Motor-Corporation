<?php

namespace App\Http\Livewire\Backend;

use App\Models\Contact as ModelsContact;
use Livewire\Component;

class Contact extends Component
{
    public $contacts;

    public function render()
    {
        $this->contacts = ModelsContact::latest()->get();
        return view('livewire.backend.contact')->layout('layouts.backend.app');
    }

    public function select_contact(ModelsContact $contact, $purpose)
    {
        if ($purpose == 'delete') {
            $contact->delete();
        } else if ($purpose == 'status') {
            $contact->status = !$contact->status;
            $contact->save();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Updated']);
        }
    }
}
