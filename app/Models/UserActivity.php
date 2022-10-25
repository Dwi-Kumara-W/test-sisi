<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'descripsi',
        'status',
        'menu_id',
        'deleted_mark',
        'created_by',
    ];
}
