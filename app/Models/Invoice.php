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
        'customer_id',
        'car_id',
        'price',
        'vat_percentage',
        'discount_percentage',
        'payment_method_id',
        'fixed_discount',
        'note',
    ];

    public function car(){
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function payments(){
        return $this->hasMany(SalePayment::class, 'invoice_id', 'id');
    }

    public function totalPrice(){
        return  round($this->price + (($this->price / 100) * $this->vat_percentage)
        - (($this->price / 100) * $this->discount_percentage), 2);
    }

    public function due(){
        return  round($this->price + (($this->price / 100) * $this->vat_percentage)
        - (($this->price / 100) * $this->discount_percentage) -
        $this->payments->sum('amount'), 2);
    }
    /**
     * Auto boot
     *
     * @return void
     */
    public static function boot(){
        parent::boot();

        self::creating(function($model){
            $model->delivery_challan_date = date('Y-m-d');
        });

        self::created(function($model){
            // ... code here
        });

        self::updating(function($model){
            // ... code here
        });

        self::updated(function($model){
            // ... code here
        });

        self::deleting(function($model){
            // ... code here
        });

        self::deleted(function($model){
            $model->payments()->delete();
            // $model->car->delete(); // car has many relation lie as investors and investment type, purchase payment
        });
    }
}




