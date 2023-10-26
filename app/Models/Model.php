<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Model extends EloquentModel
{
    use HasFactory;

    public function sensors(): HasMany
    {
        return $this->hasMany(Sensor::class);
    }
}
