<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'newprice',
        'startdate',
        'enddate',
        'is_active'
    ];

    // Relationship with Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Scopes for active and inactive discounts
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }
}
