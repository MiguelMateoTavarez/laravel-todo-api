<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "status_id",
        "title",
        "description",
        "start_date",
        "end_date",
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'status_id');  
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
