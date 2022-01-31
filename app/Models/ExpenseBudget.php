<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class ExpenseBudget extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'investment_id',
        'amount',
        'month',
        'note',
        'issue_date',
    ];

    public function investment()
    {
        return $this->belongsTo(SavingInvestment::class, 'investment_id', 'id');
    }
}
