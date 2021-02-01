<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'value',
        'start',
        'end',
        'status',
        'keterangan',
        'create_at',
        'updated_at',

        'unit_value',
        'invoice',
    ];

    protected $hidden = [
        'id',
    ];
}
