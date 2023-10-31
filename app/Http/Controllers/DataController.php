<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use App\Models\Data;
use App\Models\Sensor;

class DataController extends Controller
{
    public function index()
    {
        return Data::with(['sensor', 'sensor.location', 'sensor.dataType'])->get();
    }

    public function create(DataRequest $request)
    {
        return Data::query()->create($request->validated());
    }
}
