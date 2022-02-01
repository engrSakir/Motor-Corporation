<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class SavingInvestment extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'investor_id',
        'amount',
        'type',
    ];

    public function investor()
    {
        return $this->belongsTo(SavingInvestor::class, 'investor_id', 'id');
    }

    public function expenseBudgets()
    {
        return $this->hasMany(ExpenseBudget::class, 'investment_id', 'id');
    }

    //Custom function

    public function totalUsedAmount()
    {
        return $this->expenseBudgets->sum('amount');
    }

    public function totalUsableAmount()
    {
        return $this->amount - $this->totalUsedAmount();
    }
}
