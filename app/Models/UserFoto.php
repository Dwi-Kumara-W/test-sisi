<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'foto',
        'created_by',
        'delete_mark',
        'updated_by'
    ];
}
