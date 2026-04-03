<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'growth_id',
        'lead_id',
        'admin_id',
        'growth_user_id',
        'name',
        'description',
        'progress',
        'status_label',
        'is_live',
        'downtime_reason',
        'last_updated_at',
        'status',
    ];

    protected $casts = [
        'is_live' => 'boolean',
        'last_updated_at' => 'datetime',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function growthUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'growth_id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(ProjectTask::class);
    }
}
