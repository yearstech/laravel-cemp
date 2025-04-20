<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'event_type_id',
        'details',
        'start_datetime',
        'end_datetime',
        'venue',
        'banner',
        'host_user_id',
        'registration_fee',
        'is_public',
        'is_active',

    ];
    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }
}
