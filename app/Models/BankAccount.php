<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'no',
        'name',
        'bank',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'no',
    ];

    public function bank(){
        return $this->hasOne(Bank::class, 'id', 'bank');
    }
}
