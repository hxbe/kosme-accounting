<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'value',
        'start',
        'end',
        'status',
        'keterangan',
        'invoice',
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
        return $this->belongsTo(Invoice::class, 'invoice', 'no');
    }
}
