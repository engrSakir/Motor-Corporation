<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Car;
use App\Models\CarCategory;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\PaymentMethod;
use PDF;

class Pos extends Component
{
    public $carCategories = null;
    public $cars = null;
    public $paymentmethods = null;
    public $basket = [];
    public $discount_amount = 0;
    public $paid_amount = 0;
    public $invoice_url  = null;

    public $searched_key = null;
    public $customer_phone = null;

    public $searched_item = null;
    public $searched_item_category = null;

    public $sales_receipt_id = null;

    public $selected_basket = null;
    public $new_price = [];

    public function addToCard($id)
    {
        $this->invoice_url = null;
        $this->searched_key = null;
        foreach ($this->basket as $array_key => $val) {
            if ($val['id'] === $id) {
                $this->searched_key =  $array_key;
            }
        }
        if($this->searched_key === null || count($this->basket) < 1){
            array_push($this->basket, [
                'id' => $id,
                // 'qty' => 1,
                'name' => Car::find($id)->name,
                'price' => Car::find($id)->selling_price,
                'vat_percentage' => Car::find($id)->vat_percentage,
            ]);
            /*
                "id" => 6
                "car_category_id" => 3
                "vendor_id" => 12
                "status" => "Available"
                "name" => "Thomas Lambert"
                "brand" => "Commodi perspiciatis"
                "model" => "Non hic molestias mi"
                "purchase_price" => 812.0
                "selling_price" => 16.0
                "vat_percentage" => 19.0
                "discount_percentage" => 25.0
                "image" => null
                "registration" => "Hic nihil tenetur pa"
                "mileages" => "Aut sed molestiae nu"
                "placement" => "deal_of_the_week"
                "description" => "Eligendi ex aliquid"
                "created_at" => "2021-11-29 10:48:22"
                "updated_at" => "2021-11-29 10:48:22"
                "created_by" => 1
                "updated_by" => 1
                "deleted_by" => null
            */
        }else{
            // $this->basket[$this->searched_key]['qty']++;
            // $this->basket[$this->searched_key]['vat_percentage'] += Car::find($id)->price;
        }
    }

    public function removeFromCard($id)
    {
        try{
            $this->searched_key = null;
            foreach ($this->basket as $array_key => $val) {
                if ($val['id'] === $id) {
                    $this->searched_key =  $array_key;
                }
            }
            unset($this->basket[$this->searched_key]);
        }catch(\Exception $e){

        }
    }

    public function allRemoveFromCard($id)
    {
        try{
            $this->searched_key = null;
            foreach ($this->basket as $array_key => $val) {
                if ($val['id'] === $id) {
                    $this->searched_key =  $array_key;
                }
            }
            unset($this->basket[$this->searched_key]);
        }catch(\Exception $e){

        }
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

           foreach ($this->basket as $card_item) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $card_item['id'],
                    'quantity' => $card_item['qty'],
                    'price' => $card_item['price'],
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

    public function selectForPriceEdit($id)
    {
        $this->selected_basket = $id;
    }

    public function changePrice($id, $price)
    {
       dd($id.' '.$price);
    }

    public function mount()
    {
        $this->carCategories = CarCategory::all();
        $this->cars = Car::where('status', 'Available')->get();
        $this->paymentmethods = PaymentMethod::all();
    }

    public function render()
    {
        //Searching
        if(strlen($this->searched_item) > 0){
            $this->cars = Car::where('status', 'Available')->where('name', 'like', '%'.$this->searched_item.'%')->get();
        }else if(strlen($this->searched_item_category) > 0 && $this->searched_item_category != 'all'){
            $this->cars = Car::where('status', 'Available')->where('car_category_id', $this->searched_item_category)->get();
        }else{
            $this->cars = Car::latest()->where('status', 'Available')->get();
        }

        return view('livewire.backend.pos')->layout('layouts.pos.app');
    }
}
