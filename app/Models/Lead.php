<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'contact_name',
        'phone',
        'service_type',
        'status',
        'assigned_to',
        'created_by',
        'is_converted',
    ];
}
