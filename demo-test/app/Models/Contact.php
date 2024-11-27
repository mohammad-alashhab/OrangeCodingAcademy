<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'status_id',
        'created_at',
        'updated_at'
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with Status
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
