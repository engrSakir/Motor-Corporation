<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class PurchaseOrder extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'vendor_name'
    ];

    public function vendor(){
        return $this->belongsTo(VendorInfo::class, 'vendor_name', 'id');
    }

    public function poItems(){
        return $this->hasMany(PurchaseOrderItem::class, 'po_id', 'id');
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
            $model->poItems()->delete();
        });
    }
}
