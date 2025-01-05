<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    
    protected $table = "packages";

    protected $fillable = [
        'customer_id',
        'from_hotel_id',
        'from_hotel_date',
        'from_hotel_price_quad',
        'from_hotel_price_triple',
        'from_hotel_price_double',
        'from_hotel_qty_food',
        
        'to_hotel_id',
        'to_hotel_date',
        'to_hotel_price_quad',
        'to_hotel_price_triple',
        'to_hotel_price_double',
        'to_hotel_qty_food',
        'pax_qty',
        'free_pax_qty',
        
        'from_night',
        'from_night_quad_qty',
        'from_night_quad_total_price',
        'from_night_triple_qty',
        'from_night_triple_total_price',
        'from_night_double_qty',
        'from_night_double_total_price',
        
        'to_night',
        'to_night_quad_qty',
        'to_night_quad_total_price',
        'to_night_triple_qty',
        'to_night_triple_total_price',
        'to_night_double_qty',
        'to_night_double_total_price',
    
    ];
    
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    public function services()
    {
        return $this->hasMany(PackageService::class);
    }
}