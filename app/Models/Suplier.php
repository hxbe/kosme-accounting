<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'category',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function item(){
        return $this->hasMany(Item::class, 'suplier', 'id');
    }
}
