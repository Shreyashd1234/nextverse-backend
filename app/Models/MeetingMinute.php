<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class MeetingMinute extends Model
{
    use HasFactory;

    protected $fillable = [
        'meeting_id',
        'growth_user_id',
        'title',
        'agenda',
        'discussion',
        'content',
        'decisions',
        'action_items',
        'confirmed_at',
        'pdf_url',
        'file_path',
    ];

    protected $casts = [
        'confirmed_at' => 'datetime',
    ];

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }
}
