<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Blog extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'status',
        'title',
        'image',
        'description',
    ];
}
