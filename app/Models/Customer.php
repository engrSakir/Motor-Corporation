<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Customer extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'image',
        'note',
    ];
}
