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
        'amount',
        'job_finish_date',
        'work_description',
    ];
}
