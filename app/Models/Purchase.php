<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'no',
        'total',
        // 'status',
        // 'created_at',
        // 'updated_at',
        // 'category',
        // 'suplier',
        'unit_total',
    ];

    protected $hidden = [
        'no',
    ];
}
