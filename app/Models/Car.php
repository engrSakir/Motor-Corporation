<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Car extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'car_category_id',
        'vendor_id',
        'status',
        'name',
        'brand',
        'model',
        'purchase_price',
        'selling_price',
        'vat_percentage',
        'discount_percentage',
        'image',
        'registration',
        'mileages',
        'description',
    ];

    public function category(){
        return $this->belongsTo(CarCategory::class, 'car_category_id', 'id');
    }
}
