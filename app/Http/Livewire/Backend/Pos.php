<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Car;
use App\Models\CarCategory;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\Customer;
use PDF;

class Pos extends Component
{
    public $carCategories = null;
    public $cars = null;
    public $paymentmethods = null;
    public $customers = null;

    public $searched_car = null;
    public $searched_car_category = null;
    public $selected_car = null;

    public $selected_customer = null;
    public $discount_fixed_amount = 0;
    public $discount_percentage = 0;
    public $paid_amount = 0;
    public $advance_for_booking = false;

    public $selling_price = null;
    public $have_to_pay = null;
    public $invoice_url  = null;

    // Customer
    public $full_name = null;
    public $email_address = null;
    public $phone_number = null;
    public $address = null;
    public $image = null;
    public $note = null;


    public function addToCard($car_id)
    {
        $this->selected_car = Car::find($car_id);
        $this->selling_price = $this->selected_car->selling_price;
    }

    public function save()
    {
        try{
           $invoice = Invoice::create([
                // 'custom_id' => '',
                'customer_phone' => $this->customer_phone,
                'discount_amount' => $this->discount_amount,
                'paid_amount' => $this->paid_amount,
                'parcel' => $this->parcel ?? false
           ]);

           foreach ($this->basket as $card_car) {
                Invoicecar::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $card_car['id'],
                    'quantity' => $card_car['qty'],
                    'price' => $card_car['price'],
                ]);
            }
        }catch(\Exception $e){
            session()->flash('message', $e->getMessage());
        }
        $this->basket = array();
        $this->searched_key = null;
        $this->customer_phone = null;
        $this->discount_amount = 0;
        $this->paid_amount = 0;
        $this->parcel = false;
        $this->invoice_url = route('invoice.show', [$invoice, 'kitchen=yes']);
        session()->flash('message', 'Successfully done');
    }



    public function saveCustomer()
    {
        $this->validate([
            'full_name' => 'required|string',
            'email_address' => 'nullable|email',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string',
            'image' => 'nullable|image',
            'note' => 'nullable|string',
        ]);

        Customer::create([
            'name' => $this->full_name,
            'phone' => $this->email_address,
            'email' => $this->phone_number,
            'address' => $this->address,
            'image' => $this->image,
            'note' => $this->note,
        ]);
        $this->full_name = $this->email_address = $this->phone_number =$this->address = $this->image = $this->note = null;
        session()->flash('customer_create_message', 'Customer saved.');
    }

    public function mount()
    {
        $this->carCategories = CarCategory::all();
        $this->cars = Car::where('status', 'Available')->get();
        $this->paymentmethods = PaymentMethod::all();
        $this->customers = Customer::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        //Searching
        if(strlen($this->searched_car) > 0){
            $this->cars = Car::where('status', 'Available')->where('name', 'like', '%'.$this->searched_car.'%')->get();
        }else if(strlen($this->searched_car_category) > 0 && $this->searched_car_category != 'all'){
            $this->cars = Car::where('status', 'Available')->where('car_category_id', $this->searched_car_category)->get();
        }else{
            $this->cars = Car::latest()->where('status', 'Available')->get();
        }

        if($this->selected_car != null){
            $vat_amount = (($this->selling_price / 100) * $this->selected_car->vat_percentage);
            $discount_amount = (($this->selling_price / 100) * $this->selected_car->discount_percentage);
            $this->have_to_pay = round($this->selling_price + $vat_amount -  $discount_amount, 2);
        }

        return view('livewire.backend.pos')
        ->layout('layouts.pos.app');
    }
}
