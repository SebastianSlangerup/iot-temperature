<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Data extends Model
{
    protected $fillable = [
        'data_type_id',
        'value',
        'sensor_id',
    ];

    public function dataType(): BelongsTo
    {
        return $this->belongsTo(DataType::class);
    }

    public function sensor(): BelongsTo
    {
        return $this->belongsTo(Sensor::class);
    }
}
