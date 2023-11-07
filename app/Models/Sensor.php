<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sensor extends Model
{
    use HasFactory;

    public function data(): BelongsTo
    {
        return $this->belongsTo(Data::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(Model::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }

    public function settings(): BelongsToMany
    {
        return $this->belongsToMany(Setting::class);
    }
}
