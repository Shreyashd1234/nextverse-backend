<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'client_id',
        'type',
        'amount',
        'due_date',
        'total_amount',
        'paid_amount',
        'pending_amount',
        'payment_history',
        'status',
    ];

    protected $casts = [
        'payment_history' => 'array',
        'due_date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
