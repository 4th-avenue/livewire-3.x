<?php

namespace App\Models;

use App\Enums\StatusType;
use App\Enums\PriorityType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'priority',
        'deadline',
    ];

    protected $casts = [
        'deadline' => 'date',
        'priority' => PriorityType::class,
        'status' => StatusType::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
