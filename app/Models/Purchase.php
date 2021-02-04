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
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'no',
    ];

    public function invoice(){
        return $this->hasMany(Invoice::class, 'purchase', 'no');
    }

    public function purchaseItem(){
        return $this->hasMany(PurchaseItem::class, 'purchase', 'no')->with(['item']);
    }
}
