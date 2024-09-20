<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = "invoices";
    protected $fillable = [
        'customer_id',
        'code',
        'date',
        'due_date',
        'payment_date',
        'status',
        'notes'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id', 'id');
    }

    public static function getTotalPendingPayment()
    {
        return InvoiceItem::whereHas('invoice', function($query){
            return $query->where('status', 'PENDING');
        })
        ->get()
        ->sum(function($item){
            return $item->qty * $item->price;
        });
    }
}
