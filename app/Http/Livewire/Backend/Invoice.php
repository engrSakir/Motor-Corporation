<?php

namespace App\Http\Livewire\Backend;

use App\Models\Car;
use App\Models\CarCategory;
use App\Models\Customer;
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
    public $select_for_edit, $carCategories, $cars, $customers, $customer, $car, $price, $vat_percentage, $discount_percentage;

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

    public function delete(ModelsInvoice $inv){
        $inv->delete();
        session()->flash('message_type', 'success');
        session()->flash('message', 'Successfully deleted');
    }

    public function select_for_edit(ModelsInvoice $inv){
        $this->select_for_edit = $inv;
        $this->carCategories = CarCategory::all();
        $this->cars = Car::where('status', 'Available')->get();
        $this->customers = Customer::orderBy('created_at', 'desc')->get();
        $this->customer = $inv->customer_id;
        $this->car = $inv->car_id;
        $this->price = $inv->price;
        $this->vat_percentage = $inv->vat_percentage;
        $this->discount_percentage = $inv->discount_percentage;
    }

    public function update(){
        if($this->select_for_edit){
            $this->validate([
                'customer' => 'required',
                'car' => 'required',
                'price' => 'required|numeric',
                'vat_percentage' => 'required|numeric',
                'discount_percentage' => 'required|numeric',
            ]);

           try{
                if($this->select_for_edit->car_id != $this->car){
                    Car::find($this->car)->update(['status' => $this->select_for_edit->car->status]); //New car status update by old status
                    $this->select_for_edit->car()->update(['status' => 'Available']); //Old car make as available
                }

                $this->select_for_edit->update([
                    'customer_id' => $this->customer,
                    'car_id' => $this->car,
                    'price' => $this->price,
                    'vat_percentage' => $this->vat_percentage,
                    'discount_percentage' => $this->discount_percentage,
                ]);

                $this->customer = null;
                $this->car = null;
                $this->price = null;
                $this->vat_percentage = null;
                $this->discount_percentage = null;
                $this->select_for_edit = null;
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully updated!']);
           }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => $e->getMessage()]);
           }
        }else{
            $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Chose a car for edit!']);
        }
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
