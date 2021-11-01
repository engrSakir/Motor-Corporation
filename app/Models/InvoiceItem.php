<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class InvoiceItem extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'invoice_id',
        'car_id',
        'quantity',
        'price',
        'vat',
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }

    public function car(){
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}





