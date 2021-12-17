<?php

namespace App\Http\Livewire\Backend;

use App\Models\VendorInfo;
use Livewire\Component;

class PurchaseOrder extends Component
{
    public $vendors;
    public function render()
    {
        $this->vendors = VendorInfo::where('type','service_seller')->orderBy('id','desc')->get();
        return view('livewire.backend.purchase-order')->layout('layouts.backend.app');
    }
}
