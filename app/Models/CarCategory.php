<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class CarCategory extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = [
        'name'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class, 'car_category_id', 'id');
    }

}
