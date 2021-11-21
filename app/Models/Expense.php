<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Expense extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'description',
        'amount',
        'recurring',
        'category_id'
    ];


    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'category_id', 'id');
    }
}
