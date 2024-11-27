<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'brand_id',
        'price',
        'stock',
    ];

    public function images()
    {
        return $this->hasOne(ProductImage::class, 'product_id');
    }
    // Define the relationship to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    // Relationship to Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
}
