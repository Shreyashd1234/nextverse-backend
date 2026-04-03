<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'growth_user_id',
        'lead_id',
        'client_id',
        'title',
        'content',
        'visibility',
    ];
}
