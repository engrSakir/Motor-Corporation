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



}
