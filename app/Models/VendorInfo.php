<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class VendorInfo extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'image',
        'type',
    ];
}
