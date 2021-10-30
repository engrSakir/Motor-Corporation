<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Settlement extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'investment_id',
        'amount'
    ];

    public function investment(){
        return $this->belongsTo(Investment::class, 'investment_id', 'id');
    }
}
