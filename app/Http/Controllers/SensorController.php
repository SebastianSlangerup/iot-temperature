<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index()
    {
        return Sensor::all();
    }

    public function create()
    {
        // TODO: Show Sensor creation view
    }

    public function store(Request $request)
    {
        return Sensor::create([
            // TODO: Use values from $request
        ]);
    }

    public function show(Sensor $sensor)
    {
        return $sensor;
    }

    public function edit(Sensor $sensor)
    {
        // TODO: Show Sensor edit view
    }

    public function update(Request $request, Sensor $sensor)
    {
        return $sensor->update([
            // TODO: Use values from $request
        ]);
    }

    public function destroy(Sensor $sensor)
    {
        return $sensor->delete();
    }
}
