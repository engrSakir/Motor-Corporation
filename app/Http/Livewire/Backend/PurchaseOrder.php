<?php

namespace App\Http\Livewire\Backend;

use App\Models\PurchaseOrder as ModelsPurchaseOrder;
use App\Models\PurchaseOrderItem;
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

    public function submit(){
        $this->validate([
        'vendor_name' => 'required',
        'po_field.*.description' => 'required',
        'po_field.*.price' => 'required',
        'po_field.*.date' => 'nullable',
        ]);
        $po = ModelsPurchaseOrder::create([
            'vendor_name' => $this->vendor_name,
        ]);

        foreach($this->po_field as $po_field){
            PurchaseOrderItem::create([
                'po_id' => $po->id,
                'work_description' =>$po_field['description'] ?? null,
                'amount' =>$po_field['price'] ?? null,
                'job_finish_date' =>$po_field['date'] ?? null,
            ]);
        }
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Done!']);
        $this->po_items = []; $this->vendor_name = null; $this->po_field = null;
    }

    public function render()
    {
        $this->vendors = VendorInfo::where('type','service_seller')->orderBy('id','desc')->get();
        return view('livewire.backend.purchase-order')->layout('layouts.backend.app');
    }
}
