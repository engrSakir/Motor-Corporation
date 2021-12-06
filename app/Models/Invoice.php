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

    public function car(){
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function payments(){
        return $this->hasMany(SalePayment::class, 'invoice_id', 'id');
    }
    /**
     * Auto boot
     *
     * @return void
     */
    public static function boot(){
        parent::boot();

        self::creating(function($model){
            // ... code here
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




