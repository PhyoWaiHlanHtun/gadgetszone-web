<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;

    protected $table = 'brands';
    protected $fillable = ['id', 'category_id', 'type_id', 'name', 'photo'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(ProductTypes::class, 'type_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Products::class, 'brand_id', 'id');
    }
}
