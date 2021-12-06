<?php

namespace App\Http\Livewire\Backend;

use App\Models\Car;
use App\Models\Invoice as ModelsInvoice;
use Livewire\Component;

class Invoice extends Component
{
    public $invoices = null;

    public function makeSold($car_id){
        Car::find($car_id)->update([
            'status' => 'Sold'
        ]);
    }
    public function mount(){
        $this->invoices = ModelsInvoice::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $this->invoices = ModelsInvoice::orderBy('created_at', 'desc')->get();
        return view('livewire.backend.invoice')->layout('layouts.backend.app');
    }
}
