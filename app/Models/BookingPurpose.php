<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class BookingPurpose extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'name',
        'description',
        'max_free_counter'
    ];
}
