<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountPayable extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'type',
        'payment_status',
        'visible',
        'creted_at',
        'updated_at',
        'invoice',
        'purchase',
        'deliver',
        'category',
        'suplier',
        'company',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    public function invoice(){
        return $this->hasOne(Invoice::class, 'no', 'invoice')->with('termin');
    }

    public function purchase(){
        return $this->hasOne(Purchase::class, 'no', 'purchase')->with('purchaseItem');
    }

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category');
    }

    public function suplier(){
        return $this->hasOne(Suplier::class, 'id', 'suplier');
    }

    public function company(){
        return $this->hasOne(Company::class, 'id', 'company');
    }
}
