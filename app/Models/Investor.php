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
        'name'
    ];


    public function contactpersons()
    {
        return $this->hasMany(InvestorContactPerson::class, 'investor_id', 'id');
    }

    public function investments()
    {
        return $this->hasMany(Investment::class, 'investor_id', 'id');
    }
}
