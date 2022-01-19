<?php

namespace App\Http\Livewire\Backend;

use App\Models\Invoice;
use Livewire\Component;

class InvoiceDetails extends Component
{
    public $invoice, $delivery_challan_date;
    public function render()
    {
        return view('livewire.backend.invoice-details')->layout('layouts.backend.app');
    }
    public function mount(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function edit()
    {
        $this->validate([
            'delivery_challan_date' => 'required',
        ]);
        $this->invoice->delivery_challan_date = $this->delivery_challan_date;
        $this->invoice->save();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Done!!']);
    }
}
