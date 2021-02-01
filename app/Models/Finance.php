<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'debit',
        'kredit',
        'saldo',
        'keterangan',
        'created_at',
        'updated_at',

        'unit',
    ];

    protected $hidden = [
        'id',
    ];
}
