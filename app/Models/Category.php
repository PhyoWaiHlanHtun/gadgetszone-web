<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillible = ['id', 'name', 'photo'];

    public function types()
    {
        return $this->hasMany(ProductTypes::class, 'category_id', 'id');
    }

    public function brands()
    {
        return $this->hasMany(Brands::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Products::class, 'category_id', 'id');
    }
}
