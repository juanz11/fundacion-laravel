<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_registration_id',
        'name',
        'id_number',
        'phone',
    ];

    public function eventRegistration()
    {
        return $this->belongsTo(EventRegistration::class);
    }
}
