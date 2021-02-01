<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'type',
        'value',
        'created_at',
        'updated_at',

        'unit_value',
        'termin',
    ];

    protected $hidden = [
        'id',
    ];
}
