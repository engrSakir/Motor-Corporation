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

    public function investor()
    {
        return $this->belongsTo(Investor::class, 'investor_id', 'id');
    }

    public function interestAmount()
    {
        // return round(($this->interest / 100) * $this->amount, 2) + $this->amount;
        return round(($this->interest / 100) * $this->amount, 2);
    }
}
