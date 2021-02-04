<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'type',
        'date',
        'value',
        'bank',
        'accountpayable',
        'termin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    public function termin(){
        return $this->belongsTo(Termin::class, 'termin', 'id');
    }

    public function bank(){
        return $this->belongsTo(Bank::class, 'bank', 'no');
    }
}
