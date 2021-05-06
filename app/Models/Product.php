<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'photo',
        'product_type_id'
    ];

    public function type()
    {
        return $this->hasOne(ProductType::class,'id', 'product_type_id');
    }
}
