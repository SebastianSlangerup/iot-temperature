<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataType extends Model
{
    use HasFactory;

    public function sensors(): HasMany
    {
        return $this->hasMany(Sensor::class);
    }
}
