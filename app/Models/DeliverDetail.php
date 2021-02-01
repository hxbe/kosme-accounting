<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'batch',
        'date',
        'quantity',
        'keterangan',
        // 'created_at',
        // 'updated_at',

        'deliver',
    ];

    protected $hidden = [
        'no',
    ];
}
