<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class PurchasePayment extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'car_id',
        'investment_id',
        'amount',
    ];

    public function car(){
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    public function investment(){
        return $this->belongsTo(Investment::class, 'investment_id', 'id');
    }

}
