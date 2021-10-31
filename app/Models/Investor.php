<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Investor extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'name',
        'opening_date',
        'initial_deposit',
        'current_amount',
    ];


    public function contactpersons()
    {
        return $this->hasMany(InvestorContactPerson::class, 'investor_id', 'id');
    }

    public function investments()
    {
        return $this->hasMany(Investment::class, 'investor_id', 'id');
    }

    // Custom function
    public function totalInvestmentWithInterest()
    {
        $total_investment = 0;
        foreach ($this->investments as $investment) {
            $total_investment += $investment->investWithInterest();
        }
        return $total_investment;
    }

    //Return total settle amount
    public function totalSettlement()
    {
        $total_settlement = 0;
        foreach ($this->investments as $investment) {
            $total_settlement += $investment->settlements()->sum('amount');
        }
        return $total_settlement;
    }


    //How many percentage are settle
    public function percentageOfSettlement()
    {
        try {
            return ($this->totalSettlement() / $this->totalInvestmentWithInterest()) * 100;
        } catch (\Exception $exception) {
            return 0;
        }
    }

    // return total used amount of investment
    public function totalUsedAmount()
    {
        $total_used_amount = 0;
        foreach ($this->investments as $investment) {
            $total_used_amount += $investment->totalUsedAmount();
        }
        return $total_used_amount;
    }

    //Return total usable/free investment amount
    public function totalUsableAmount()
    {
        $total_usable_amount = 0;
        foreach ($this->investments as $investment) {
            $total_usable_amount += $investment->totalUsableAmount();
        }
        return $total_usable_amount;
    }

    //How many percentage are used
    public function percentageOfUsed()
    {
        try {
            return ($this->totalUsedAmount() / $this->investments->sum('amount')) * 100;
        } catch (\Exception $exception) {
            return 0;
        }
    }
}
