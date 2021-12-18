<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class PurchaseOrderItem extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'po_id',
        'amount',
        'job_finish_date',
        'work_description',
    ];

    public function po(){
        return $this->belongsTo(PurchaseOrder::class, 'po_id', 'id');
    }

}
