<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        return Log::with(['sensor.model', 'sensor.dataType', 'sensor.location'])->limit(10)->get();
    }
}
