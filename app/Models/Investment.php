<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Investment extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'investor_id',
        'amount',
        'interest',
        'settlement_date',
    ];

    //Relational
    public function investor()
    {
        return $this->belongsTo(Investor::class, 'investor_id', 'id');
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class, 'investment_id', 'id');
    }

    public function purchasePayments()
    {
        return $this->hasMany(PurchasePayment::class, 'investment_id', 'id');
    }

    //Custom function
    public function interestAmount()
    {
        return round(($this->interest / 100) * $this->amount, 2);
    }

    public function investWithInterest()
    {
        return round(($this->interest / 100) * $this->amount, 2) + $this->amount;
    }

    public function totalUsedAmount()
    {
        return $this->purchasePayments->sum('amount');
    }

    public function totalUsableAmount()
    {
        return $this->amount - $this->totalUsedAmount();
    }

    //How many percentage are settle
    public function percentageOfSettlement()
    {
        try {
            return ($this->settlements->sum('amount') / $this->investWithInterest()) * 100;
        } catch (\Exception $exception) {
            return 0;
        }
    }

    //How many percentage are used
    public function percentageOfUsed()
    {
        try {
            return ($this->totalUsedAmount() / $this->amount) * 100;
        } catch (\Exception $exception) {
            return 0;
        }
    }
}
