<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'date',
        'due',
        'purchase',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'id',
    ];

    public function purchase(){
        return $this->belongsTo(Purchase::class, 'purchase', 'no');
    }

    public function termin(){
        return $this->hasMany(Termin::class, 'invoice', 'no');
    }
}
