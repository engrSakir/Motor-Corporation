<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Instagram extends Model
{
    use Userstamps, HasFactory;

    protected $fillable = [
        'status',
        'url',
        'image',
    ];
}
