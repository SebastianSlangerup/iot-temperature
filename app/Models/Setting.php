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
     * @param  int  $value
     * @param  Sensor  $sensor
     * @return void
     */
    public function evaluate(int $value, Sensor $sensor): void
    {
        // Because values are multiplied by 100, before being sent to the database (to prevent floating number madness)
        // We have to divide the value by 100 again to get the actual reading.
        $value = $value / 100;
        $remainingLog = "Reading: $value\r\n Sensor: [$sensor->id] {$sensor->model->name}, at location: {$sensor->location->name}";

        // Temperature logging
        if ($value < $this->min && $this->data_type_id == DataType::TEMPERATURE) {
            Log::alert("Temperature too low... $remainingLog");
        } elseif ($value > $this->max && $this->data_type_id == DataType::TEMPERATURE) {
            Log::alert("Temperature too high... $remainingLog");
        }

        // Humidity logging
        if ($value < $this->min && $this->data_type_id == DataType::HUMIDITY) {
            Log::alert("Humidity too low... $remainingLog");
        } elseif ($value > $this->max && $this->data_type_id == DataType::HUMIDITY) {
            Log::alert("Humidity too high... $remainingLog");
        }

        // Air quality logging
        if ($value < $this->min && $this->data_type_id == DataType::AIR_QUALITY) {
            Log::alert("Air quality too low... $remainingLog");
        } elseif ($value > $this->max && $this->data_type_id == DataType::AIR_QUALITY) {
            Log::alert("Air quality too high... $remainingLog");
        }
    }

    public function sensors(): BelongsToMany
    {
        return $this->belongsToMany(Sensor::class);
    }
}
