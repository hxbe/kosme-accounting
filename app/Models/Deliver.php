<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'status',
        // 'created_at',
        // 'updated_at',

        'purchase_detail',
    ];

    protected $hidden = [
        'id',
    ];
}
