<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'pic',
        'currency_id'
    ];
    
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
