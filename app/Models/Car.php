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
        'papers_up_to_date',
        'name_transfer_documents',
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
        'chassis_number',
        'car_number',
        'placement',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(CarCategory::class, 'car_category_id', 'id');
    }

    public function purchasePayments()
    {
        return $this->hasMany(PurchasePayment::class, 'car_id', 'id');
    }

    //How many percentage are payed in purchase (to vendor)
    public function percentageOfPurchasePayment()
    {
        try {
            return ($this->purchasePayments()->sum('amount') / $this->purchase_price) * 100;
        } catch (\Exception $exception) {
            return 0;
        }
    }
}
