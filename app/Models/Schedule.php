<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    
    public $appends = [
        'departure_date'
    ];

    protected $fillable = [

        'schedule_type',
        'arrival_flight_info',
        'departure_flight_info',

        'customer_id',
        'arrival_date',
        'mekkah_night',
        'madinah_night',
        'pax',

        'mekkah_date',
        'mekkah_hotel',
        'mekkah_room_info',
        'mekkah_snack_contact_person',
        'mekkah_snack_description',
        'mekkah_note',
        
        'madinah_date',
        'madinah_hotel',
        'madinah_room_info',
        'madinah_snack_contact_person',
        'madinah_snack_description',
        'madinah_note',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    public function getDepartureDateAttribute()
    {
        $totalNight = $this->mekkah_night + $this->madinah_night;
        return date('Y-m-d', strtotime($this->arrival_date . " + {$totalNight} days"));
    }

}
