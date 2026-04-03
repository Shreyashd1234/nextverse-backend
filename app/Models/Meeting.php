<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'user_id',
        'title',
        'scheduled_at',
        'status',
        'remarks',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];
}
