<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'quantity',
        'subtotal',
        'tax',

        'purchase',
        'unit_tax',
    ];

    protected $hidden = [
        'id',
    ];
}
