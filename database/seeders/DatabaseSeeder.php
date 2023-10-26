<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DataType;
use App\Models\Location;
use App\Models\Log;
use App\Models\Model;
use App\Models\Sensor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dataTypes = DataType::factory()
            ->count(4)
            ->sequence(
                ['name' => 'Humidity'],
                ['name' => 'Temperature'],
                ['name' => 'Air Quality'],
                ['name' => 'Light Levels'],
            )
            ->create();

        $models = Model::factory()
            ->count(10)
            ->create();

        $locations = Location::factory()
            ->count(10)
            ->create();

        for ($i = 0; $i < 9; $i++) {
            Sensor::factory()
                ->for($models->random())
                ->for($locations->random())
                ->for($dataTypes->random())
                ->create();
        }

        Log::factory()
            ->count(10000)
            ->create();
    }
}
