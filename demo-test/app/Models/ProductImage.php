<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'front_img',
        'back_img',
        'side_img',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
