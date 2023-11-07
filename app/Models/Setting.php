<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Log;

class Setting extends Model
{
    use HasFactory;

    /**
     * Evaluate the incoming sensor reading, to determine what action to take based on a number of factors.
     *
     * @param  DataType  $dataType
     * @param  int  $value
     * @param  Sensor  $sensor
     * @return void
     */
    public function evaluate(DataType $dataType, int $value, Sensor $sensor): void
    {
        $remainingLog = "Reading: $value\r\n Sensor: [$sensor->id] {$sensor->model->name}, at location: {$sensor->location->name}";

        // Temperature logging
        if ($value < $this->min && $dataType->id == DataType::TEMPERATURE) {
            Log::alert("Temperature too low... $remainingLog");
        } elseif ($value > $this->max && $dataType->id == DataType::TEMPERATURE) {
            Log::alert("Temperature too high... $remainingLog");
        }

        // Humidity logging
        elseif ($value < $this->min && $dataType->id == DataType::HUMIDITY) {
            Log::alert("Humidity too low... $remainingLog");
        } elseif ($value > $this->max && $dataType->id == DataType::HUMIDITY) {
            Log::alert("Humidity too high... $remainingLog");
        }

        // Air quality logging
        elseif ($value < $this->min && $dataType->id == DataType::AIR_QUALITY) {
            Log::alert("Air quality too low... $remainingLog");
        } elseif ($value > $this->max && $dataType->id == DataType::AIR_QUALITY) {
            Log::alert("Air quality too high... $remainingLog");
        }
    }

    public function sensors(): BelongsToMany
    {
        return $this->belongsToMany(Sensor::class);
    }
}
