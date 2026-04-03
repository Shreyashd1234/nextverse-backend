<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'status',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];
}
