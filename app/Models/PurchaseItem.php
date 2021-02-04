<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'quantity',
        'subotal',
        'price',
        'tax',
        'item',
        'purchase',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    public function purchase(){
        return $this->belongsTo(Purchase::class, 'purchase', 'id');
    }

    public function item(){
        return $this->belongsTo(Item::class, 'item', 'id')->with(['suplier', 'category']);
    }
}
