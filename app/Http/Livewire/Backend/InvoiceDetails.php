<?php

namespace App\Http\Livewire\Backend;

use App\Models\Invoice;
use Livewire\Component;

class InvoiceDetails extends Component
{
    public $invoice;
    public function render()
    {
        return view('livewire.backend.invoice-details')->layout('layouts.backend.app');
    }
    public function mount(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }
}
