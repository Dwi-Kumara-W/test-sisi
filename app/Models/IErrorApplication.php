<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IErrorApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'error_date',
        'modules',
        'controller',
        'function',
        'error_line',
        'error_message',
        'status',
        'param',
        'created_date',
        'deleted_mark',
        'updated_by',
    ];
}
