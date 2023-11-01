<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use App\Models\Data;
use App\Models\Sensor;
use Illuminate\Support\Facades\Cache;

class DataController extends Controller
{
    public function index()
    {
        $data = Cache::remember('data', 60, function () {
            return Data::with(['sensor', 'sensor.location', 'sensor.dataType'])->get();
        });

        return response()->json(['Hello' => 'Hello']);
    }

    public function create(DataRequest $request)
    {
        return Data::query()->create($request->validated());
    }
}
