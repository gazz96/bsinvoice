<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'name',
        'link',
        'menu_parent',
        'icon',
        'is_show',
        'position'
    ];
    
    public function getNameWithParentAttribute()
    {
        $names = [];
        
        $names[] = $this->name;
        
        if($this->parent_menu)
        {
            $names[] = $this->parent_menu->name;
        }
        
        return implode(' -> ', $names);
    }

    public function parent()
    {
        $this->belongsTo(Menu::class);
    }

    public function items()
    {
        return $this->hasMany(Menu::class);
    }
    
    public function parent_menu()
    {
        return $this->belongsTo(Menu::class, 'menu_parent');
    }
    
}   