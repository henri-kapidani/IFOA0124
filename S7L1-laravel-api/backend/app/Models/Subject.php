<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function degree(): BelongsTo
    {
        return $this->belongsTo(Degree::class);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
