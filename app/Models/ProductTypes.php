<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTypes extends Model
{
    use HasFactory;

    protected $table = 'types';

    protected $fillable = ['id', 'category_id','name','photo'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brands()
    {
        return $this->hasMany(Brands::class, 'type_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Products::class, 'type_id', 'id');
    }
}
