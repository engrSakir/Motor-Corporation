<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Car;
use App\Models\CarCategory;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\Customer;
use App\Models\SalePayment;
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
    public $payment_method = null;
    public $paid_amount = 0;
    public $advance_for_booking = false;

    public $selling_price = null;
    public $have_to_pay = null;
    public $invoice_url  = null;

    // Customer create
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
        $this->invoice_url = null;
    }

    public function save()
    {
        // dd($this->selected_customer);
        $this->validate([
            'selected_customer' => 'required',
            'selected_car' => 'required',
            'payment_method' => 'required',
            'selling_price' => 'required',
            'paid_amount' => 'required',
        ]);
        try{
            $invoice = new Invoice();
            $invoice->customer_id = $this->selected_customer;
            $invoice->car_id = $this->selected_car->id;
            $invoice->price = $this->selling_price;
            $invoice->vat_percentage = $this->selected_car->vat_percentage;
            $invoice->discount_percentage = $this->selected_car->discount_percentage;
            $invoice->save();

            // dd($invoice->id);
            $sale_payment = new SalePayment();
            $sale_payment->invoice_id = $invoice->id;
            $sale_payment->payment_method_id = $this->payment_method;
            if($this->advance_for_booking == true){
                $sale_payment->is_advance = true;
                $this->selected_car->status = 'Booking';
            }else{
                $sale_payment->is_advance = false;
                $this->selected_car->status = 'Sold';
            }
            $sale_payment->amount = $this->paid_amount;
            $sale_payment->save();
            $this->selected_car->save();
            $this->selected_customer = $this->selected_car = $this->payment_method = $this->selling_price = $this->paid_amount = null;
            if($this->advance_for_booking == true){
                $this->invoice_url = route('backend.pdf', [$invoice, 'type=booking']);
            }else{
                $this->invoice_url = route('backend.pdf', [$invoice, 'type=invoice']);
            }
            session()->flash('message_type', 'success');
            session()->flash('message', 'Success');
        }catch(\Exception $e){
            session()->flash('message_type', 'danger');
            session()->flash('message', $e->getMessage());
        }   
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
        $this->customers = Customer::orderBy('created_at', 'desc')->get();

        return view('livewire.backend.pos')
        ->layout('layouts.pos.app');
    }
}
