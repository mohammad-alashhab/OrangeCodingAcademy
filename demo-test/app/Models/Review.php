<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'item_type',
        'review_type',
        'rating',
        'comment',
        'is_visible',
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function auditLogs()
    {
        return $this->morphMany(AuditLog::class, 'auditable');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Accessors
    public function getItemTypeAttribute($value)
    {
        return ucfirst($value); // Capitalize item type for display
    }
}
