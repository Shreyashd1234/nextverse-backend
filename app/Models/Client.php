<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_code',
        'lead_id',
        'user_id',
        'assigned_growth_id',
        'service_type',
        'price',
        'timeline',
        'stage',
    ];
}
