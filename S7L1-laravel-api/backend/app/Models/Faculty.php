<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function degrees(): HasMany
    {
        return $this->hasMany(Degree::class);
    }
}
