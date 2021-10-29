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

    // public function totalInvestment()
    // {
    //     return $this->investments
    //     // return round(($this->interest / 100) * $this->amount, 2) + $this->amount;
    //     return round(($this->interest / 100) * $this->amount, 2);
    //     $total_investment = 0;
    //     foreach($this->investments as $investment){
    //         $total_investment += round(($this->vat_percentage / 100) * $item->price, 2) * $item->quantity;
    //     }
    //     return $total_investment;
    // }
}
