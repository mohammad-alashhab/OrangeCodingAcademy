<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_type',
        'street_address',
        'city',
        'state',
        'zip_code',
        'country',
        'default_address',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'shipping_address_id');
    }

    public function getFullAddressAttribute()
    {
        return $this->street_address . ', ' . $this->city . ', ' . $this->state . ', ' . $this->zip_code . ', ' . $this->country;
    }
}
