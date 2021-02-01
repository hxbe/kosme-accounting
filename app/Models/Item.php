<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'price',
        'created_at',
        'updated_at',

        'unit_price',
        'unit_item',
        'suplier',
        'category',
    ];

    protected $hidden = [
        'id',
    ];
}
