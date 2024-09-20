<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = "bills";
    protected $fillable = [
        'vendor_id',
        'code',
        'date',
        'due_date',
        'payment_date',
        'status',
        'notes',
        'currency',
        'po_ref',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(BillItem::class, 'bill_id', 'id');
    }

    public static function getTotalPendingPayment()
    {
        return BillItem::whereHas('bill', function($query){
            return $query->where('status', 'PENDING');
        })
        ->get()
        ->sum(function($item){
            return $item->qty * $item->price;
        });
    }
}
