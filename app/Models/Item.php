<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'suplier',
        'category',
        'created_at',
        'updated_at',
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

    public function suplier(){
        return $this->belongsTo(Suplier::class, 'suplier', 'id');
    }
}
