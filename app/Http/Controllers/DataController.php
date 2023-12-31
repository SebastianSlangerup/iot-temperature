<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use App\Models\Data;
use App\Models\DataType;
use App\Models\Sensor;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class DataController extends Controller
{
    public function index()
    {
        $data = Cache::remember('data', 60, function () {
            return Data::with(['dataType', 'sensor.model', 'sensor.location'])
                ->latest('created_at')
                ->limit(100)
                ->get();
        });

        return response()->json(['data' => $data]);
    }

    public function create(DataRequest $request)
    {
        $validated = $request->validated();

        $sensor = Sensor::findOrFail($validated['sensor_id']);
        $setting = $sensor->settings()->where('data_type_id', $validated['data_type_id'])->first();

        $setting->evaluate($validated['value'], $sensor);

        return Data::query()->create($request->validated());
    }
}
