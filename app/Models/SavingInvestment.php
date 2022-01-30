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
        'interest',
    ];

    public function investor()
    {
        return $this->belongsTo(Investor::class, 'investor_id', 'id');
    }
}
