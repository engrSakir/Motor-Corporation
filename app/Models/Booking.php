<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Booking extends Model
{
    use HasFactory;
    use Userstamps;
    protected $fillable = [
        'name',
        'date',
        'email',
        'phone',
        'booking_purpose_id'
    ];

    public function bookingPurpose()
    {
        return $this->belongsTo(BookingPurpose::class, 'booking_purpose_id', 'id');
    }
   
}
