<?php

namespace App\Http\Livewire\Backend;

use App\Models\Customer as ModelsCustomer;
use Livewire\Component;

class Customer extends Component
{
    public $customers = null;

    public function delete(ModelsCustomer $customer){
        $customer->delete();
        session()->flash('message_type', 'success');
        session()->flash('message', 'Successfully deleted');
    }

    public function mount(){
        $this->customers = ModelsCustomer::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $this->customers = ModelsCustomer::orderBy('created_at', 'desc')->get();
        return view('livewire.backend.customer')->layout('layouts.backend.app');
    }
}
