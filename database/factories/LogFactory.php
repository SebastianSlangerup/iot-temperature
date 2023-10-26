<?php

namespace Database\Factories;

use App\Models\Log;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LogFactory extends Factory
{
    protected $model = Log::class;

    public function definition()
    {
        return [
            'sensor_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9]),
            'value' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
