<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountPayable extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'payment_status',
        'created_at',
        'updated_at',
        'visible',
        'invoice',
        'purchase',
        'deliver',
        'payment',
        'category',
        'suplier',
    ];

    protected $hidden = [
        'id',
    ];

    public function invoice(){
        return $this->hasMany(Invoice::class, 'no', 'invoice');
    }

    public function purchase(){
        return $this->hasMany(Purchase::class, 'no', 'purchase');
    }

    public function deliver(){
        return $this->hasMany(Deliver::class, 'id', 'deliver');
    }

    public function payment(){
        return $this->hasMany(Payment::class, 'id', 'payment');
    }

    public function category(){
        return $this->hasMany(Category::class, 'id', 'category');
    }

    public function suplier(){
        return $this->hasMany(Suplier::class, 'id', 'suplier');
    }

    public function termin(){
        // return $this->belongsToMany(Termin::class, 'payments', 'termin', 'termin');
        return $this->hasManyThrough(
            Termin::class,
            Invoice::class,
            'no', // Foreign key on the environments table...
            'invoice', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'no' // Local key on the environments table...
        );
    }

    public function purchase_detail(){
        // return $this->hasManyThrough(
        //     Purchase::class,
        //     PurchaseDetail::class,
        //     'purchase',
        //     'purchase',
        //     'id',
        //     'id'
        // );
        // return $this->hasMany(PurchaseDetail::class, 'no', 'purchase');
    }
}
