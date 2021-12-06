<?php

namespace App\Http\Livewire\Backend;

use App\Models\Car;
use App\Models\Invoice as ModelsInvoice;
use App\Models\PaymentMethod;
use App\Models\SalePayment;
use Livewire\Component;

class Invoice extends Component
{
    public $invoices = null;
    public $payment_methods = null;
    public $payment_amount = null;
    public $payment_method = null;

    public function makeSold($car_id){
        Car::find($car_id)->update([
            'status' => 'Sold'
        ]);
    }

    public function addPayment($inv_id){
        $this->validate([
            'payment_method' => 'required',
            'payment_amount' => 'required',
        ]);

       try{
        $sale_payment = new SalePayment();
        $sale_payment->invoice_id = $inv_id;
        $sale_payment->payment_method_id = $this->payment_method[$inv_id];
        $sale_payment->amount = $this->payment_amount[$inv_id];
        $sale_payment->save();
        $this->payment_method[$inv_id] = null;
        $this->payment_amount[$inv_id] = null;
        session()->flash('message_type', 'success');
        session()->flash('message', 'Successfully payment added');
       }catch(\Exception $e){
        session()->flash('message_type', 'danger');
        session()->flash('message', $e->getMessage());
       } 
    }

    public function deleteInvoice(ModelsInvoice $inv){
        $inv->delete();
        session()->flash('message_type', 'success');
        session()->flash('message', 'Successfully deleted');
    }

    public function mount(){
        $this->invoices = ModelsInvoice::orderBy('created_at', 'desc')->get();
        $this->payment_methods = PaymentMethod::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $this->invoices = ModelsInvoice::orderBy('created_at', 'desc')->get();
        return view('livewire.backend.invoice')->layout('layouts.backend.app');
    }
}
