<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    // Relationships
    public function orders()
    {
        return $this->hasMany(Order::class, 'status_id');
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class, 'status_id');
    }
}
