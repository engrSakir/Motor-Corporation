<?php

namespace App\Http\Livewire\Backend;

use App\Models\VendorInfo;
use Livewire\Component;

class PurchaseOrder extends Component
{
    public $po_items = [], $vendor_name, $po_field;

    public function add_item(){
        array_push($this->po_items, '');
    }

    public function remove_item($array_id){
        unset($this->po_items[$array_id]);
    }

    protected $rules = [
        'po_field.*.description' => 'required|min:10',
    ];

    public function submit(){
        // dd($this->work_description);
        $this->validate();
        dd('Pass');
        $this->validate([
            'work_description.*' => 'required',
        ]);
    }

    public function render()
    {
        $this->vendors = VendorInfo::where('type','service_seller')->orderBy('id','desc')->get();
        return view('livewire.backend.purchase-order')->layout('layouts.backend.app');
    }
}
