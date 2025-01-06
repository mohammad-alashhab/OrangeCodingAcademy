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
        'original_price', // Added to fillable
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

    public function orders()
    {
        return $this->hasMany(OrderItem::class);
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

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    // Add relationship to Wishlist
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'product_id', 'id');
    }

    /**
     * Get all cart items associated with the product.
     */
    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

}
