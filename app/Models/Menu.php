<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, HasUuids;
    
    protected $keyType = 'string';
    protected $table = 'menu';

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id', 'id');
    }

    public function sub_menu()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }
}
