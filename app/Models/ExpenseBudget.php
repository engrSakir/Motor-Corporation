<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class ExpenseBudget extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'sourse_id',
        'source_type',
        'amount',
        'month',
        'note',
        'issue_date',
    ];
}
