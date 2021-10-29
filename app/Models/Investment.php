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
        'amount'
    ];

    public function investor()
    {
        return $this->belongsTo(Investor::class, 'investor_id', 'id');
    }
}
