<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_level',
        'menu_name',
        'menu_link',
        'menu_icon',
        'parent_id',
        'created_by',
        'updated_by'
    ];
}
