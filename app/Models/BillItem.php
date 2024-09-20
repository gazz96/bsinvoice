<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class BillItem extends Model
{
    use HasFactory;

    protected $table = "bill_items";
    protected $fillable = [
        'bill_id',
        'position',
        'product_id',
        'name',
        'description',
        'qty',
        'price'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
