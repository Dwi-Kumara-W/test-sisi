<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'menu_id',
        // 'created_time',
        'deleted_mark',
        'updated_by',
    ];
}
