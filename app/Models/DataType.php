<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataType extends Model
{
    use HasFactory;

    const TEMPERATURE = 1;
    const HUMIDITY = 2;
    const AIR_QUALITY = 3;

    public function data(): HasMany
    {
        return $this->hasMany(Data::class);
    }
}
