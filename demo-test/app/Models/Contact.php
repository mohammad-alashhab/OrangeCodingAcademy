<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'message',
        'status_id',
        'created_at',
        'updated_at',
    ];

    // Relationship with Status
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
