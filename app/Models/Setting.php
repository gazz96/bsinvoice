<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'setting_value',
    ];

    public $timestamps = false;

    public function hasKey($key) {
        $option = $this->where('name', $key)->first();
        
        if($option) {
            return true;
        }

        return false;
    }

    public function getByKey($key, $default=null)
    {
        $option = $this->where('name', $key)->first();
        
        if($option) {
            return $option->setting_value;
        }

        return $default ?? '';
    }

    public function updateByKey($key, $value)
    {
        $find = $this->hasKey($key);
        if($find) {
            return $this->where('name', $key)
                ->update([
                    'setting_value' => $value
                ]);
        }
        return $this->addByKey($key, $value);
        
    }

    public function addByKey($key, $value)
    {
        return $this->create([
            'name' => $key,
            'setting_value' => $value
        ]);
    }
}