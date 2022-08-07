<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['barangay_id', 'name', 'description', 'location', 'organizer', 'contact', 'date_time_start', 'date_time_end', 'is_approved'];

    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
}
