<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

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

    public function scopeOwnedBy(Builder $query, Authenticatable $user)
    {
        return $query->where('user_id', $user->getAuthIdentifier());
    }
}
