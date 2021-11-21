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
        'vendor_name',
        'amount',
        'job_finish_date',
        'work_description',
    ];
}
