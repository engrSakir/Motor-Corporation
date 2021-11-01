<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Invoice extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'payment_method_id',
        'discount_percentage',
        'fixed_discount',
        'note',
    ];

    public function payments(){
        return $this->hasMany(SalePayment::class, 'invoice_id', 'id');
    }

    public function items(){
        return $this->hasMany(InvoiceItem::class, 'invoice_id', 'id');
    }

    public function price(){
        $total_price = 0;
        foreach($this->items as $item){
            $total_price += $item->price * $item->quantity;
        }
        return $total_price;
    }

    public function vat(){
        $vat_amount = 0;
        foreach($this->items as $item){
            $vat_amount += $item->vat * $item->quantity;
        }
        return $vat_amount;
    }

    public function priceIncludeVat(){
        return $this->price() + $this->vat();
    }

}




