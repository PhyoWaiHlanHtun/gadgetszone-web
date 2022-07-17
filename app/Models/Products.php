<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['id', 'category_id', 'type_id', 'brand_id', 'name', 'price', 'description', 'images'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(ProductTypes::class, 'type_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
